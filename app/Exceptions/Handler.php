<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof QueryException) {
            $errorCode = $exception->errorInfo[1];
            $errorMessage = $exception->getMessage();
            return response()->json([
                'error' => [
                    'status' => 500,
                    'title' => 'Database Error',
                    'detail' => 'Error in database query: '.$errorMessage,
                    'source' => ['pointer' => 'request'],
                    'code' => $errorCode 
                ]], 500);
        }
        return parent::render($request, $exception);
    }
}
