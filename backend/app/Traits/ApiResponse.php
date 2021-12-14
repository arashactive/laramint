<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    /**
     * Prepare response.
     *
     * @param  string  $message
     * @param  int  $statusCode
     * @return array
     */
    public function prepareApiResponse(string $message = '', int $statusCode = Response::HTTP_OK): array
    {
        if (empty($message)) {
            $message = Response::$statusTexts[$statusCode];
        }

        return [
            'message' => $message,
            'statusCode' => $statusCode,
        ];
    }

    /**
     * Success Response
     *
     * @param  array  $data
     * @param  int  $statusCode
     * @param  string  $message
     * @return JsonResponse
     */
    public function successApiResponse(array $data, int $statusCode = Response::HTTP_OK, string $message = ''): JsonResponse
    {
        $response = $this->prepareApiResponse($message, $statusCode);
        $response['data'] = $data;

        return response()->json($response, $statusCode);
    }

    /**
     * Error Response
     *
     * @param  array  $errors
     * @param  int  $statusCode
     * @param  string  $message
     * @return JsonResponse
     */
    public function errorApiResponse(array $errors, int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR, string $message = ''): JsonResponse
    {
        $response = $this->prepareApiResponse($message, $statusCode);
        $response['errors'] = $errors;

        return response()->json($response, $statusCode);
    }

    /**
     * Response with status code 200.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function okApiResponse(array $data, string $message = ''): JsonResponse
    {
        return $this->successApiResponse($data, Response::HTTP_OK, $message);
    }

    /**
     * Response with status code 201.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function createdApiResponse(array $data, string $message = ''): JsonResponse
    {
        return $this->successApiResponse($data, Response::HTTP_CREATED, $message);
    }

    /**
     * Response with status code 400.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function badRequestApiResponse(array $data, string $message = ''): JsonResponse
    {
        return $this->errorApiResponse($data, Response::HTTP_BAD_REQUEST, $message);
    }

    /**
     * Response with status code 401.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function unauthorizedApiResponse(array $data, string $message = ''): JsonResponse
    {
        return $this->errorApiResponse($data, Response::HTTP_UNAUTHORIZED, $message);
    }

    /**
     * Response with status code 403.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function forbiddenApiResponse(array $data, string $message = ''): JsonResponse
    {
        return $this->errorApiResponse($data, Response::HTTP_FORBIDDEN, $message);
    }

    /**
     * Response with status code 404.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function notFoundApiResponse(array $data, string $message = ''): JsonResponse
    {
        return $this->errorApiResponse($data, Response::HTTP_NOT_FOUND, $message);
    }

    /**
     * Response with status code 409.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function conflictApiResponse(array $data, string $message = ''): JsonResponse
    {
        return $this->errorApiResponse($data, Response::HTTP_CONFLICT, $message);
    }

    /**
     * Response with status code 422.
     *
     * @param  array  $data
     * @param  string  $message
     * @return JsonResponse
     */
    public function unprocessableApiResponse(array $data, string $message = ''): JsonResponse
    {
        return $this->errorApiResponse($data, Response::HTTP_UNPROCESSABLE_ENTITY, $message);
    }
}