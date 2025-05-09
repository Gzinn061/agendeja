<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
        //
    }

    /**
     * Customize how exceptions are rendered for the API.
     */
    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {

            if ($exception instanceof ModelNotFoundException) {
                return response()->json([
                    'message' => 'Recurso não encontrado.',
                ], 404);
            }

            if ($exception instanceof NotFoundHttpException) {
                return response()->json([
                    'message' => 'Rota não encontrada.',
                ], 404);
            }

            if ($exception instanceof AuthenticationException) {
                return response()->json([
                    'message' => 'Não autenticado.',
                ], 401);
            }

            // Retorno genérico para outras exceções
            return response()->json([
                'message' => $exception->getMessage(),
                'tipo' => class_basename($exception)
            ], 500);
        }

        return parent::render($request, $exception);
    }
}
