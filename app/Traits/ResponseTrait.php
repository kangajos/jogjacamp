<?php

namespace App\Traits;

trait ResponseTrait
{
    private int $code = 200;

    private string $message = 'Great!';

    private bool $success = true;

    private $data = null;

    public function setCode(int $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function setMessage(int $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function setSuccess(bool $success): self
    {
        $this->success = $success;
        return $this;
    }

    public function setData($data = null): self
    {
        $this->data = $data;
        return $this;
    }

    public function formattedJson($data = null): \Illuminate\Http\JsonResponse
    {
        $data = [
            'status' => [
                'code' => $this->code,
                'success' => $this->success,
                'message' => $this->message,
            ],
            'data' => $data ? $data : $this->data
        ];

        return response()->json($data, $this->code);
    }
}
