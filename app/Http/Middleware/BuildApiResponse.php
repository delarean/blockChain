<?php

namespace App\Http\Middleware;

use App\Exceptions\UserApiException;
use App\Http\Requests\CardIssueApiRequest;
use Closure;

class BuildApiResponse
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
        $response = $next($request);

        $original = $response->getOriginalContent();

        $path = $request->path();
        $api_path = "api/";

        switch ($path) {

            case $api_path."card/issue":
                $type = "IssueCardResponse";
                break;
            case $api_path."card/activate":
                $type = "BaseResponse";
                break;
            case $api_path."card/info":
                $type = "CardInfoResponse";
                break;
            case $api_path."card/write_off":
                $type = "WriteOffResponse";
                break;
            case $api_path."card/calculate/discount":
                $type = "DiscountResponse";
                break;
            case $api_path."card/purchase":
                $type = "PurchaseResponse";
                break;
            case $api_path."card/search":
                $type = "UserCardResponse";
                break;
            case $api_path."operation/info":
                $type = "OperationsResponse";
                break;
            case $api_path."operation/refund":
                $type = "RefundResponse";
                break;
            default:
                $type = "not_found_type";

        }

        if(gettype($original) !== "array") {
            $e = new UserApiException("server_error");
            $original = $e->render()->getOriginalContent();
        }

        $resp = array_merge($original,['type' => $type]);

        return response()->json($resp,200,[],JSON_UNESCAPED_UNICODE);
    }
}
