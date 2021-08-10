<?php


namespace Yengec\Model;


use Yengec\YengecResource;

class Subscription extends YengecResource
{
    private $id;
    private $cardId ;
    private $price;
    private $channel;
    private $promotion;
    private $createdAt;
    private $renewalAt;
    private $deletedAt;
    private $isExpired;
    private $renewMonth;
    private $recoverable;
    private $priceReadable;
    private $paymentMethod;
    private $promotionCode;
    private $channelReadable;
    private $integrationCount;
    private $cancelable;
    private $cancelableReason;
    private $renewalAtReadable;
    private $notRecoverableReason;
    private $payableWithCreditCard;
    private Package $package;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCardId()
    {
        return $this->cardId;
    }

    /**
     * @param mixed $cardId
     */
    public function setCardId($cardId): void
    {
        $this->cardId = $cardId;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param mixed $channel
     */
    public function setChannel($channel): void
    {
        $this->channel = $channel;
    }

    /**
     * @return mixed
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * @param mixed $promotion
     */
    public function setPromotion($promotion): void
    {
        $this->promotion = $promotion;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getRenewalAt()
    {
        return $this->renewalAt;
    }

    /**
     * @param mixed $renewalAt
     */
    public function setRenewalAt($renewalAt): void
    {
        $this->renewalAt = $renewalAt;
    }

    /**
     * @return mixed
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param mixed $deletedAt
     */
    public function setDeletedAt($deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * @return mixed
     */
    public function getIsExpired()
    {
        return $this->isExpired;
    }

    /**
     * @param mixed $isExpired
     */
    public function setIsExpired($isExpired): void
    {
        $this->isExpired = $isExpired;
    }

    /**
     * @return mixed
     */
    public function getRenewMonth()
    {
        return $this->renewMonth;
    }

    /**
     * @param mixed $renewMonth
     */
    public function setRenewMonth($renewMonth): void
    {
        $this->renewMonth = $renewMonth;
    }

    /**
     * @return mixed
     */
    public function getRecoverable()
    {
        return $this->recoverable;
    }

    /**
     * @param mixed $recoverable
     */
    public function setRecoverable($recoverable): void
    {
        $this->recoverable = $recoverable;
    }

    /**
     * @return mixed
     */
    public function getPriceReadable()
    {
        return $this->priceReadable;
    }

    /**
     * @param mixed $priceReadable
     */
    public function setPriceReadable($priceReadable): void
    {
        $this->priceReadable = $priceReadable;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param mixed $paymentMethod
     */
    public function setPaymentMethod($paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return mixed
     */
    public function getPromotionCode()
    {
        return $this->promotionCode;
    }

    /**
     * @param mixed $promotionCode
     */
    public function setPromotionCode($promotionCode): void
    {
        $this->promotionCode = $promotionCode;
    }

    /**
     * @return mixed
     */
    public function getChannelReadable()
    {
        return $this->channelReadable;
    }

    /**
     * @param mixed $channelReadable
     */
    public function setChannelReadable($channelReadable): void
    {
        $this->channelReadable = $channelReadable;
    }

    /**
     * @return mixed
     */
    public function getIntegrationCount()
    {
        return $this->integrationCount;
    }

    /**
     * @param mixed $integrationCount
     */
    public function setIntegrationCount($integrationCount): void
    {
        $this->integrationCount = $integrationCount;
    }

    /**
     * @return mixed
     */
    public function getCancelable()
    {
        return $this->cancelable;
    }

    /**
     * @param mixed $cancelable
     */
    public function setCancelable($cancelable): void
    {
        $this->cancelable = $cancelable;
    }

    /**
     * @return mixed
     */
    public function getCancelableReason()
    {
        return $this->cancelableReason;
    }

    /**
     * @param mixed $cancelableReason
     */
    public function setCancelableReason($cancelableReason): void
    {
        $this->cancelableReason = $cancelableReason;
    }

    /**
     * @return mixed
     */
    public function getRenewalAtReadable()
    {
        return $this->renewalAtReadable;
    }

    /**
     * @param mixed $renewalAtReadable
     */
    public function setRenewalAtReadable($renewalAtReadable): void
    {
        $this->renewalAtReadable = $renewalAtReadable;
    }

    /**
     * @return mixed
     */
    public function getNotRecoverableReason()
    {
        return $this->notRecoverableReason;
    }

    /**
     * @param mixed $notRecoverableReason
     */
    public function setNotRecoverableReason($notRecoverableReason): void
    {
        $this->notRecoverableReason = $notRecoverableReason;
    }

    /**
     * @return mixed
     */
    public function getPayableWithCreditCard()
    {
        return $this->payableWithCreditCard;
    }

    /**
     * @param mixed $payableWithCreditCard
     */
    public function setPayableWithCreditCard($payableWithCreditCard): void
    {
        $this->payableWithCreditCard = $payableWithCreditCard;
    }

    /**
     * @return mixed
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * @param mixed $package
     */
    public function setPackage($package): void
    {
        $this->package = $package;
    }

}