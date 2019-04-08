<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
      $ren = parent::render($request, $exception);

      $status_code = $ren->getStatusCode();
      switch ($status_code) {
         case 400:
            return response()->json(['sucess' => false, 'error_code' => 400, 'error_msg' => 'Bad request' ], 200);
            break;
         case 401:
            return response()->json(['sucess' => false, 'error_code' => 401, 'error_msg' => 'Not authorized' ], 200);
            break;
         case 404:
            return response()->json(['sucess' => false, 'error_code' => 401, 'error_msg' => 'Record not Found' ], 200);
            break;
         default:
            return response()->json(['sucess' => false, 'error_code' => 500, 'error_msg' => 'Server Error' ], 200);
            break;
      }
        // return parent::render($request, $exception);
    }
}
