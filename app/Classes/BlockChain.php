<?php

namespace App\Classes;
use App\Exceptions\ReportableApiException;
use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Crypto\Random\Random;
use BitWasp\Bitcoin\Key\Factory\PrivateKeyFactory;
use \Curl\Curl;
use MessagePack\Packer;

/**
 * Класс для работы с api блокчейна
 * Class BlockChain
 * @package App\Classes
 */
class BlockChain
{

    const REGISTER_ENDPOINT = 'api/register';
    const GET_BLOCK_ENDPOINT = 'api/block';
    const WALLET_INFO_ENDPOINT = 'api/address';

    public function __construct()
    {

        $this->apiUrl = env('BLOCKCHAIN_API_URL',false);

    }

    /**
     * Генерирует публичный ключ биткойна(компактный, в base64)
     * И приватный ключ в формате WIF
     * @return array
     */
    public function generateCoinKeys()
    {

        $network = Bitcoin::getNetwork();
        $random = new Random();
        $compressedKeyFactory = PrivateKeyFactory::compressed();
        $privateKey = $compressedKeyFactory->generate($random);

        $publicKeyHex = $privateKey->getPublicKey()->getHex();
        $publicKey = base64_encode(hex2bin($publicKeyHex));

        return [
            'privateKey' => $privateKey->toWif($network),
            'publicKey' => $publicKey,
        ];

    }

    /**
     * Создание нового кошелька в api блокчейн
     * @return array
     * @throws ReportableApiException
     */
    public function generateNewWallet()
    {

        $curl = new Curl();
        $curl->setHeader('Content-Type', 'application/json');

        $keys = $this->generateCoinKeys();

        $privateKey = $keys['privateKey'];
        $publicKey = $keys['publicKey'];

        $data = [
            'public_key' => $publicKey,
        ];

        $curl->post($this->apiUrl.self::REGISTER_ENDPOINT,json_encode($data));

        if ($curl->error){
            $log_params = ['errorCode' => $curl->errorCode ,'errorMessage' => $curl->errorMessage];
            throw new ReportableApiException('blockchain_request_failed',[],$log_params);
        }

        $genWalResponse = (array) $curl->response;

        if(!isset($genWalResponse['result']) && $genWalResponse['result'] !== "ok"){
            $log_params = [
                'publicKey' => $publicKey,
                'blockChainResp' => $genWalResponse
            ];
            throw new ReportableApiException('blockchain_add_wallet_failed',[],$log_params);
        }

        $transactionId = $genWalResponse['txid'];

        $addr_arr = $this->getWalletAddress($transactionId);

        $resp =  [
            'privateKey' => $privateKey,
            'publicKey' => $publicKey,
        ];

        $response = array_merge($resp, $addr_arr);

        return $response;

    }

    /**
     * Возвращает блок
     * @param string $hash
     * @return mixed
     * @throws ReportableApiException
     */
    public function getBlock($hash = 'last')
    {

        $curl = new Curl();
        $curl->setHeader('Content-Type', 'application/json');
        $curl->setDefaultJsonDecoder($assoc = true);


        $curl->get($this->apiUrl.self::GET_BLOCK_ENDPOINT.'/'.$hash);

        if ($curl->error){
            $log_params = ['errorCode' => $curl->errorCode ,'errorMessage' => $curl->errorMessage];
            throw new ReportableApiException('blockchain_request_failed',[],$log_params);
        }

        return $curl->response['block'];
    }

    /**
     * Возвращает тектовый и шестнадцатиричный адреса
     * @param $transactionId
     * @return array
     * @throws ReportableApiException
     */
    public function getWalletAddress($transactionId)
    {
        $attempts = 40;

        $block = $this->getBlock();

        while (!isset($block["txs"][$transactionId]["address"])){

            $block = $this->getBlock();
            $attempts--;

            if($attempts === 0) {
                $log_params = ['transId' => $transactionId];
                throw new ReportableApiException('blockchain_set_address_failed',[],$log_params);
            }
        }

            $hexAddress = '0x'.$block["txs"][$transactionId]["address"];

        return [
            'hexAddress' => $hexAddress,
            'textAddress' => $this->getTextAddress($hexAddress),
        ];
    }

    /**
     * Текстовый адрес из шестнадцатиричного
     * @param $hexAddress
     * @return mixed
     */
    public function getTextAddress($hexAddress)
    {

        $wal_inf = $this->getWalletInfo($hexAddress);

        return $wal_inf["txtaddress"];

    }

    /**
     * Информация о кошельке
     * @param $address
     * @return mixed
     * @throws ReportableApiException
     */
    public function getWalletInfo($address)
    {

        $curl = new Curl();
        $curl->setHeader('Content-Type', 'application/json');
        $curl->setDefaultJsonDecoder($assoc = true);

        $curl->get($this->apiUrl.self::WALLET_INFO_ENDPOINT.'/'.$address);

        if ($curl->error){
            $log_params = ['errorCode' => $curl->errorCode ,'errorMessage' => $curl->errorMessage];
            throw new ReportableApiException('blockchain_request_failed',[],$log_params);
        }

        $resp = $curl->response;

        if(!isset($resp["result"]) || $resp["result"] !== "ok") {

            $params = ['address' => $address];
            $log_params = &$params;

            throw new ReportableApiException('blockchain_wallet_info_failed',$params,$log_params);
        }

        return $resp;

    }

    /**
     * @param $hexAddress
     * @return string
     */
    public function addressToBin($hexAddress)
    {

        return base_convert($hexAddress,16,2);

    }

    /**
     * @param $value
     * @return mixed
     */
    public function messagePackFormat($value)
    {

        $packer = new Packer();

        return $packer->pack($value);

    }



}