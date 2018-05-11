<?php

namespace App\Exceptions;

use Exception;

abstract class ApiException extends Exception
{

    protected $langFile = 'apiErrors';

    protected $message;

    protected $code;

    protected $error_name;

    protected $error_lang;

    public function __construct($error_name,array $params = [],$req_type = null)
    {
        $this->error_name = $error_name;

        $this->error_lang = $this->langFile.'.'.$error_name;

        $this->code = __($this->error_lang.'.code');

        if(!empty($params))
            $this->message = __($this->error_lang.'.message',$params);
        else
            $this->message = __($this->error_lang.'.message');

        parent::__construct($this->message);
    }

    public function render($request = null)
    {
        $resp = [
            'errorMessages' => [[
                'errorCode' => $this->code,
                'errorMessage' => $this->message
            ]]
        ];

        return response()->json($resp,200,[],JSON_UNESCAPED_UNICODE);

    }

}
