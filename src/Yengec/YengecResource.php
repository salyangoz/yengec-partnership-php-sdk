<?php

namespace Yengec;

class YengecResource
{
    private mixed $error;
    private mixed $errorMessage;
    private mixed $rawData;
    private Response $rawResponse;

    /**
     * @return mixed
     */
    public function getError(): mixed
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     */
    public function setError(mixed $error): void
    {
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage(): mixed
    {
        return $this->errorMessage;
    }

    /**
     * @param mixed $errorMessage
     */
    public function setErrorMessage(mixed $errorMessage): void
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return mixed
     */
    public function getRawData(): mixed
    {
        return $this->rawData;
    }

    /**
     * @param mixed $rawData
     */
    public function setRawData(mixed $rawData): void
    {
        $this->rawData = $rawData;
    }

    /**
     * @return Response
     */
    public function getRawResponse(): Response
    {
        return $this->rawResponse;
    }

    /**
     * @param Response $rawResponse
     */
    public function setRawResponse(Response $rawResponse): void
    {
        $this->rawResponse = $rawResponse;
    }



}