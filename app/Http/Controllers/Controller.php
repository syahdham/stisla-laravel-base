<?php

namespace App\Http\Controllers;

use App\Models\ErrorLog;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function errorLog($function, $controller, $message)
    {
        ErrorLog::create([
            'user_id' => auth()->user()->id,
            'function' => $function,
            'controller' => $controller,
            'error_message' => $message
        ]);
    }
}
