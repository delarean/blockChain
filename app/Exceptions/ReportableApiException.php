<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;

class ReportableApiException extends ApiException
{

    protected $report_msg;

    public function __construct($error_name, array $params = [],array $log_params = [])
    {
        parent::__construct($error_name, $params);

        if(!empty($log_params))
            $this->report_msg = __($this->error_lang.'.log_message',$log_params);
        else
            $this->report_msg = __($this->error_lang.'.log_message');
    }

    public function report()
    {
        Log::error($this->report_msg);
    }

}
