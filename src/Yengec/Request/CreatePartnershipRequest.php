<?php


namespace Yengec\Request;


use Yengec\Request;
use Yengec\RequestStringBuilder;

class CreatePartnershipRequest extends Request
{
    private string $channel;
    private string $userName;
    private string $userEmail;
    private string $companyName;
    private string $companyRefId;
    private string $companyAddressCity;
    private string $companyAddressDistrict;
    private string $companyAddress;

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
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    /**
     * @param string $userEmail
     */
    public function setUserEmail(string $userEmail): void
    {
        $this->userEmail = $userEmail;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return string
     */
    public function getCompanyRefId(): string
    {
        return $this->companyRefId;
    }

    /**
     * @param string $companyRefId
     */
    public function setCompanyRefId(string $companyRefId): void
    {
        $this->companyRefId = $companyRefId;
    }

    /**
     * @return string
     */
    public function getCompanyAddressCity(): string
    {
        return $this->companyAddressCity;
    }

    /**
     * @param string $companyAddressCity
     */
    public function setCompanyAddressCity(string $companyAddressCity): void
    {
        $this->companyAddressCity = $companyAddressCity;
    }

    /**
     * @return string
     */
    public function getCompanyAddressDistrict(): string
    {
        return $this->companyAddressDistrict;
    }

    /**
     * @param string $companyAddressDistrict
     */
    public function setCompanyAddressDistrict(string $companyAddressDistrict): void
    {
        $this->companyAddressDistrict = $companyAddressDistrict;
    }

    /**
     * @return string
     */
    public function getCompanyAddress(): string
    {
        return $this->companyAddress;
    }

    /**
     * @param string $companyAddress
     */
    public function setCompanyAddress(string $companyAddress): void
    {
        $this->companyAddress = $companyAddress;
    }



    public function getRequestString(): string
    {
        return RequestStringBuilder::make()
            ->append("channel", $this->getChannel())
            ->append("user[name]", $this->getUserName())
            ->append("user[email]", $this->getUserEmail())
            ->append("company[name]", $this->getCompanyName())
            ->append("company[ref_id]", $this->getCompanyRefId())
            ->append("company[address][city]", $this->getCompanyAddressCity())
            ->append("company[address][district]", $this->getCompanyAddressDistrict())
            ->append("company[address][address]", $this->getCompanyAddress())
            ->getRequestString();
    }


}