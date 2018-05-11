<?php

namespace App\Http\Middleware;

use App\Exceptions\ApiException;
use App\Exceptions\UserApiException;
use App\Http\Requests\CardIssueApiRequest;
use App\Models\Partner;
use Closure;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->hasHeader('Authorization'))
            throw new UserApiException('no_auth_header');

        $partner = new Partner();
        $token = $request->header('Authorization');

        if(!$request->has('partnerInfo.partnerCode'))
            throw new UserApiException('no_partner_code');

        $partner_id = $request->input('partnerInfo.partnerCode');

        if(!$partner->checkAuthToken($token,$partner_id))
            throw new UserApiException('auth_failed');

        return $next($request);
    }
}
