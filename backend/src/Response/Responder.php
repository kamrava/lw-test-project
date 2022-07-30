<?php
namespace App\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

class Responder
{
    public static function success($data): JsonResponse
    {
        return new JsonResponse($data);
    }
}