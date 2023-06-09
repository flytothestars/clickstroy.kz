<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Arr;

/**
 * @OA\Info(title="My First API", version="0.1")
 * 
 * @OA\Tag(name="General", description="General API")
 * 
 * @OA\Tag(name="Auth", description="General API")
 * 
 * @OA\Tag(name="Auth API", description="API work with auth user")
 * 
 * @OA\Server(
 *      url="http://127.0.0.1:8000/api"
 * )
 * 
 * 
 *
 */
 
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $perPage = 10;

    public function readalbeError( $validator ){
        return Arr::first(Arr::flatten($validator->messages()->get('*')));
    }


    //
    public function isDemo()
    {
        if (!\App::environment('production')) {
            throw new \Exception(__("App is in demo version. Some changes can't be made"));
        };
    }

    public function isInDemo()
    {
        return !\App::environment('production');
    }


}