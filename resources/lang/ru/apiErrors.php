<?php

/*
|—————————————————————————————————————————————————————————|
| Тут храним описание всех ошибок для вывода пользователю |
|—————————————————————————————————————————————————————————|
*/

return [

    'validation_error' => [
        'code' => '110',
        'message' => ':message',
    ],
    'no_auth_header' => [
        'code' => '111',
        'message' => 'Нет заголовка для авторизации',
    ],
    'auth_failed' => [
        'code' => '112',
        'message' => 'Передан неверный токен для партнёра',
    ],
    'blockchain_request_failed' => [
        'code' => '113',
        'message' => 'Сервис временно недоступен ,попробуйте позже',
        'log_message' => 'Ошибка curl: [:errorCode] :errorMessage'. "\n",
    ],
    'blockchain_add_wallet_failed' => [
        'code' => '114',
        'message' => 'Не удалось создать кошелёк ,попробуйте ещё раз',
        'log_message' => 'Не удалось создать кошелёк publicKey - :publicKey '.
            "\n".'ответ api - [:blockChainResp]['.date("Y-m-d H:i:s").']'."\n"
    ],
    'blockchain_set_address_failed' => [
        'code' => '115',
        'message' => 'Ошибка формирования адреса кошелька',
        'log_message' => 'Транзакция и Адрес не найдены в блоке, id транзакции - :transId'."\n"
    ],
    'blockchain_wallet_info_failed' => [
        'code' => '116',
        'message' => 'Ошибка получения информации о кошельке :address',
        'log_message' => 'Ошибка получения информации о кошельке :address'."\n"
    ],
    'no_partner_code' => [
        'code' => '117',
        'message' => 'Не указан partnerInfo.partnerCode',
    ],
    'less_or_equal_null' => [
        'code' => '118',
        'message' => 'Указанная сумма списания меньше или равна нулю',
    ],
    'not_enough_coins' => [
        'code' => '119',
        'message' => 'Недостаточно средств для списания',
    ],
    'operation_not_found' => [
        'code' => '120',
        'message' => 'Операция не найдена для данного кошелька и партнёра или уже была отменена',
    ],
    'server_error' => [
        'code' => '121',
        'message' => 'Ошибка сервера ,обратитесь к разработчику',
    ],
    'wallet_type_error' => [
        'code' => '122',
        'message' => 'Возникла ошибка ,попробуйте ещё раз',
        'log_message' => 'Указан неправильный тип кошелька - :type'."\n"
    ],



];