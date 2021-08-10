<?php


namespace Yengec\Request;


use Yengec\RequestStringBuilder;

class CancelSubscriptionRequest extends \Yengec\Request
{
    private int $subscriptionId;
    private string $reason;
    private string $reasonDescription;

    /**
     * @return int
     */
    public function getSubscriptionId(): int
    {
        return $this->subscriptionId;
    }

    /**
     * @param int $subscriptionId
     */
    public function setSubscriptionId(int $subscriptionId): void
    {
        $this->subscriptionId = $subscriptionId;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public function getReasonDescription(): string
    {
        return $this->reasonDescription;
    }

    /**
     * @param string $reasonDescription
     */
    public function setReasonDescription(string $reasonDescription): void
    {
        $this->reasonDescription = $reasonDescription;
    }

    public function getRequestString(): string
    {
        $requestString = RequestStringBuilder::make();

        # Check for uninitialized typed property before call getter (=> php 7.4)
        if(isset($this->reason))
            $requestString->append("reason", $this->getReason());
        if(isset($this->reasonDescription))
            $requestString->append("reason_description", $this->getReasonDescription());

        return $requestString->getRequestQueryString();
    }
}