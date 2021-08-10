<?php

declare(strict_types=1);

namespace Yengec;

class Request
{

    private string $requestId;
    private string $requestTimeStamp;

    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->requestId;
    }

    /**
     * @param string $requestId
     */
    public function setRequestId(string $requestId): void
    {
        $this->requestId = $requestId;
    }

    /**
     * @return string
     */
    public function getRequestTimeStamp(): string
    {
        return $this->requestTimeStamp;
    }

    /**
     * @param string $requestTimeStamp
     */
    public function setRequestTimeStamp(string $requestTimeStamp): void
    {
        $this->requestTimeStamp = $requestTimeStamp;
    }



    public function getJsonObject(): mixed {
        return JsonBuilder::make()
            ->add("requestId", $this->getRequestTimeStamp())
            ->add("requestTimestamp", $this->getRequestTimeStamp())
            ->getObject();
    }

    public function getRequestString(): string {
        return RequestStringBuilder::make()
            ->append("requestId", $this->getRequestTimeStamp())
            ->append("requestTimestamp", $this->getRequestTimeStamp())
            ->getRequestString();
    }

    public function getRequestQueryString(): string {
        return RequestStringBuilder::make()
            ->append("requestId", $this->getRequestTimeStamp())
            ->append("requestTimestamp", $this->getRequestTimeStamp())
            ->getRequestQueryString();
    }

}