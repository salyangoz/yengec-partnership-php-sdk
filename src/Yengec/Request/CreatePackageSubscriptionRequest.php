<?php


namespace Yengec\Request;


use Yengec\Request;
use Yengec\RequestStringBuilder;

class CreatePackageSubscriptionRequest extends Request
{

    private string $cardName;
    private string $cardNumber;
    private int $cardYear;
    private int $cardMonth;
    private int $cardCvc;
    private string $billingType;
    private string $billingName;
    private string $billingTaxNumber;
    private string $billingAddress;
    private string $billingDistrict;
    private string $billingCity;
    private int $billingPostalCode;
    private string $promotionCode;
    private string $billingTaxOffice;
    private bool $trial;
    private string $channel;
    private int $packageId;
    private int $renewMonth;
    private string $paymentMethod;

    /**
     * @return string
     */
    public function getCardName(): string
    {
        return $this->cardName;
    }

    /**
     * @param string $cardName
     */
    public function setCardName(string $cardName): void
    {
        $this->cardName = $cardName;
    }

    /**
     * @return string
     */
    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     */
    public function setCardNumber(string $cardNumber): void
    {
        $this->cardNumber = $cardNumber;
    }

    /**
     * @return int
     */
    public function getCardYear(): int
    {
        return $this->cardYear;
    }

    /**
     * @param int $cardYear
     */
    public function setCardYear(int $cardYear): void
    {
        $this->cardYear = $cardYear;
    }

    /**
     * @return int
     */
    public function getCardMonth(): int
    {
        return $this->cardMonth;
    }

    /**
     * @param int $cardMonth
     */
    public function setCardMonth(int $cardMonth): void
    {
        $this->cardMonth = $cardMonth;
    }

    /**
     * @return int
     */
    public function getCardCvc(): int
    {
        return $this->cardCvc;
    }

    /**
     * @param int $cardCvc
     */
    public function setCardCvc(int $cardCvc): void
    {
        $this->cardCvc = $cardCvc;
    }

    /**
     * @return string
     */
    public function getBillingType(): string
    {
        return $this->billingType;
    }

    /**
     * @param string $billingType
     */
    public function setBillingType(string $billingType): void
    {
        $this->billingType = $billingType;
    }

    /**
     * @return string
     */
    public function getBillingName(): string
    {
        return $this->billingName;
    }

    /**
     * @param string $billingName
     */
    public function setBillingName(string $billingName): void
    {
        $this->billingName = $billingName;
    }

    /**
     * @return string
     */
    public function getBillingTaxNumber(): string
    {
        return $this->billingTaxNumber;
    }

    /**
     * @param string $billingTaxNumber
     */
    public function setBillingTaxNumber(string $billingTaxNumber): void
    {
        $this->billingTaxNumber = $billingTaxNumber;
    }

    /**
     * @return string
     */
    public function getBillingAddress(): string
    {
        return $this->billingAddress;
    }

    /**
     * @param string $billingAddress
     */
    public function setBillingAddress(string $billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return string
     */
    public function getBillingDistrict(): string
    {
        return $this->billingDistrict;
    }

    /**
     * @param string $billingDistrict
     */
    public function setBillingDistrict(string $billingDistrict): void
    {
        $this->billingDistrict = $billingDistrict;
    }

    /**
     * @return string
     */
    public function getBillingCity(): string
    {
        return $this->billingCity;
    }

    /**
     * @param string $billingCity
     */
    public function setBillingCity(string $billingCity): void
    {
        $this->billingCity = $billingCity;
    }

    /**
     * @return int
     */
    public function getBillingPostalCode(): int
    {
        return $this->billingPostalCode;
    }

    /**
     * @param int $billingPostalCode
     */
    public function setBillingPostalCode(int $billingPostalCode): void
    {
        $this->billingPostalCode = $billingPostalCode;
    }


    /**
     * @return string
     */
    public function getPromotionCode(): string
    {
        return $this->promotionCode;
    }

    /**
     * @param string $promotionCode
     */
    public function setPromotionCode(string $promotionCode): void
    {
        $this->promotionCode = $promotionCode;
    }

    /**
     * @return string
     */
    public function getBillingTaxOffice(): string
    {
        return $this->billingTaxOffice;
    }

    /**
     * @param string $billingTaxOffice
     */
    public function setBillingTaxOffice(string $billingTaxOffice): void
    {
        $this->billingTaxOffice = $billingTaxOffice;
    }

    /**
     * @return bool
     */
    public function getTrial(): bool
    {
        return $this->trial;
    }

    /**
     * @param bool $trial
     */
    public function setTrial(bool $trial): void
    {
        $this->trial = $trial;
    }

    /**
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * @param string $channel
     */
    public function setChannel(string $channel): void
    {
        $this->channel = $channel;
    }

    /**
     * @return int
     */
    public function getPackageId(): int
    {
        return $this->packageId;
    }

    /**
     * @param int $packageId
     */
    public function setPackageId(int $packageId): void
    {
        $this->packageId = $packageId;
    }

    /**
     * @return int
     */
    public function getRenewMonth(): int
    {
        return $this->renewMonth;
    }

    /**
     * @param int $renewMonth
     */
    public function setRenewMonth(int $renewMonth): void
    {
        $this->renewMonth = $renewMonth;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     */
    public function setPaymentMethod(string $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function getRequestString(): string
    {
        $requestString = RequestStringBuilder::make();

        # Check for uninitialized typed property before call getter (=> php 7.4)
        if(isset($this->cardName))
            $requestString->append("card[name]", $this->getCardName());
        if(isset($this->cardNumber))
            $requestString->append("card[number]", $this->getCardNumber());
        if(isset($this->cardYear))
            $requestString->append("card[year]", $this->getCardYear());
        if(isset($this->cardMonth))
            $requestString->append("card[month]", $this->getCardMonth());
        if(isset($this->cardCvc))
            $requestString->append("card[cvc]", $this->getCardCvc());
        if(isset($this->billingType))
            $requestString->append("billing[type]", $this->getBillingType());
        if(isset($this->billingName))
            $requestString->append("billing[name]", $this->getBillingName());
        if(isset($this->billingTaxNumber))
            $requestString->append("billing[tax_number]", $this->getBillingTaxNumber());
        if(isset($this->billingAddress))
            $requestString->append("billing[address]", $this->getBillingAddress());
        if(isset($this->billingDistrict))
            $requestString->append("billing[district]", $this->getBillingDistrict());
        if(isset($this->billingCity))
            $requestString->append("billing[city]", $this->getBillingCity());
        if(isset($this->billingPostalCode))
            $requestString->append("billing[postal_code]", $this->getBillingPostalCode());
        if(isset($this->promotionCode))
            $requestString->append("promotion_code", $this->getPromotionCode());
        if(isset($this->billingTaxOffice))
            $requestString->append("billing[tax_office]", $this->getBillingTaxOffice());
        if(isset($this->trial))
            $requestString->append("trial", $this->getTrial());
        if(isset($this->renewMonth))
            $requestString->append("renew_month", $this->getRenewMonth());
        if(isset($this->channel))
            $requestString->append("channel", $this->getChannel());
        if(isset($this->packageId))
            $requestString->append("package_id", $this->getPackageId());

        return $requestString->getRequestString();
    }

}