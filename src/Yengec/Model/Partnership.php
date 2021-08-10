<?php


namespace Yengec\Model;


use Yengec\YengecResource;

class Partnership extends YengecResource
{
    private $userId;
    private $userName;
    private $userEmail;
    private $userMobile;
    private $userProvider;
    private $userIsEmailVerified;
    private $userIsMobileVerified;
    private $userMobileNotification;
    private $userPermissionSmsPermittedAt;
    private $userPermissionCallPermittedAt;
    private $userPermissionEmailPermittedAt;
    private $userPermissionPolicyPermittedAt;
    private $userChannel;
    private $userHasPassword;
    private $userLanguage;
    private $userCreatedAt;

    private $companyId;
    private $companyParasutId;
    private $companyAccountingId;
    private $companyAccountingUrl;
    private $companyName;
    private $companyTaxNumber;
    private $companyTaxOffice;
    private $companyEmail;
    private $companyPhone;
    private $companyLogoUrl;
    private $companyCity;
    private $companyDistrict;
    private $companyAddress;
    private $companyWebsiteUrl;
    private $companySettings;
    private $companyChannel;
    private $companyAccounting;
    private $companyRole;
    private $companyRefId;
    private $companyEInvoicingActivatedAt;
    private $companyEInvoiceProvider;
    private $companyEInvoiceCredit;
    private $companyEInvoiceCreditSyncedAt;
    private $companyAbilities;

    private $token;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param mixed $userEmail
     */
    public function setUserEmail($userEmail): void
    {
        $this->userEmail = $userEmail;
    }

    /**
     * @return mixed
     */
    public function getUserMobile()
    {
        return $this->userMobile;
    }

    /**
     * @param mixed $userMobile
     */
    public function setUserMobile($userMobile): void
    {
        $this->userMobile = $userMobile;
    }

    /**
     * @return mixed
     */
    public function getUserProvider()
    {
        return $this->userProvider;
    }

    /**
     * @param mixed $userProvider
     */
    public function setUserProvider($userProvider): void
    {
        $this->userProvider = $userProvider;
    }

    /**
     * @return mixed
     */
    public function getUserIsEmailVerified()
    {
        return $this->userIsEmailVerified;
    }

    /**
     * @param mixed $userIsEmailVerified
     */
    public function setUserIsEmailVerified($userIsEmailVerified): void
    {
        $this->userIsEmailVerified = $userIsEmailVerified;
    }

    /**
     * @return mixed
     */
    public function getUserIsMobileVerified()
    {
        return $this->userIsMobileVerified;
    }

    /**
     * @param mixed $userIsMobileVerified
     */
    public function setUserIsMobileVerified($userIsMobileVerified): void
    {
        $this->userIsMobileVerified = $userIsMobileVerified;
    }

    /**
     * @return mixed
     */
    public function getUserMobileNotification()
    {
        return $this->userMobileNotification;
    }

    /**
     * @param mixed $userMobileNotification
     */
    public function setUserMobileNotification($userMobileNotification): void
    {
        $this->userMobileNotification = $userMobileNotification;
    }

    /**
     * @return mixed
     */
    public function getUserPermissionSmsPermittedAt()
    {
        return $this->userPermissionSmsPermittedAt;
    }

    /**
     * @param mixed $userPermissionSmsPermittedAt
     */
    public function setUserPermissionSmsPermittedAt($userPermissionSmsPermittedAt): void
    {
        $this->userPermissionSmsPermittedAt = $userPermissionSmsPermittedAt;
    }

    /**
     * @return mixed
     */
    public function getUserPermissionCallPermittedAt()
    {
        return $this->userPermissionCallPermittedAt;
    }

    /**
     * @param mixed $userPermissionCallPermittedAt
     */
    public function setUserPermissionCallPermittedAt($userPermissionCallPermittedAt): void
    {
        $this->userPermissionCallPermittedAt = $userPermissionCallPermittedAt;
    }

    /**
     * @return mixed
     */
    public function getUserPermissionEmailPermittedAt()
    {
        return $this->userPermissionEmailPermittedAt;
    }

    /**
     * @param mixed $userPermissionEmailPermittedAt
     */
    public function setUserPermissionEmailPermittedAt($userPermissionEmailPermittedAt): void
    {
        $this->userPermissionEmailPermittedAt = $userPermissionEmailPermittedAt;
    }

    /**
     * @return mixed
     */
    public function getUserPermissionPolicyPermittedAt()
    {
        return $this->userPermissionPolicyPermittedAt;
    }

    /**
     * @param mixed $userPermissionPolicyPermittedAt
     */
    public function setUserPermissionPolicyPermittedAt($userPermissionPolicyPermittedAt): void
    {
        $this->userPermissionPolicyPermittedAt = $userPermissionPolicyPermittedAt;
    }

    /**
     * @return mixed
     */
    public function getUserChannel()
    {
        return $this->userChannel;
    }

    /**
     * @param mixed $userChannel
     */
    public function setUserChannel($userChannel): void
    {
        $this->userChannel = $userChannel;
    }

    /**
     * @return mixed
     */
    public function getUserHasPassword()
    {
        return $this->userHasPassword;
    }

    /**
     * @param mixed $userHasPassword
     */
    public function setUserHasPassword($userHasPassword): void
    {
        $this->userHasPassword = $userHasPassword;
    }

    /**
     * @return mixed
     */
    public function getUserLanguage()
    {
        return $this->userLanguage;
    }

    /**
     * @param mixed $userLanguage
     */
    public function setUserLanguage($userLanguage): void
    {
        $this->userLanguage = $userLanguage;
    }

    /**
     * @return mixed
     */
    public function getUserCreatedAt()
    {
        return $this->userCreatedAt;
    }

    /**
     * @param mixed $userCreatedAt
     */
    public function setUserCreatedAt($userCreatedAt): void
    {
        $this->userCreatedAt = $userCreatedAt;
    }

    /**
     * @return mixed
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param mixed $companyId
     */
    public function setCompanyId($companyId): void
    {
        $this->companyId = $companyId;
    }

    /**
     * @return mixed
     */
    public function getCompanyParasutId()
    {
        return $this->companyParasutId;
    }

    /**
     * @param mixed $companyParasutId
     */
    public function setCompanyParasutId($companyParasutId): void
    {
        $this->companyParasutId = $companyParasutId;
    }

    /**
     * @return mixed
     */
    public function getCompanyAccountingId()
    {
        return $this->companyAccountingId;
    }

    /**
     * @param mixed $companyAccountingId
     */
    public function setCompanyAccountingId($companyAccountingId): void
    {
        $this->companyAccountingId = $companyAccountingId;
    }

    /**
     * @return mixed
     */
    public function getCompanyAccountingUrl()
    {
        return $this->companyAccountingUrl;
    }

    /**
     * @param mixed $companyAccountingUrl
     */
    public function setCompanyAccountingUrl($companyAccountingUrl): void
    {
        $this->companyAccountingUrl = $companyAccountingUrl;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $companyName
     */
    public function setCompanyName($companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return mixed
     */
    public function getCompanyTaxNumber()
    {
        return $this->companyTaxNumber;
    }

    /**
     * @param mixed $companyTaxNumber
     */
    public function setCompanyTaxNumber($companyTaxNumber): void
    {
        $this->companyTaxNumber = $companyTaxNumber;
    }

    /**
     * @return mixed
     */
    public function getCompanyTaxOffice()
    {
        return $this->companyTaxOffice;
    }

    /**
     * @param mixed $companyTaxOffice
     */
    public function setCompanyTaxOffice($companyTaxOffice): void
    {
        $this->companyTaxOffice = $companyTaxOffice;
    }

    /**
     * @return mixed
     */
    public function getCompanyEmail()
    {
        return $this->companyEmail;
    }

    /**
     * @param mixed $companyEmail
     */
    public function setCompanyEmail($companyEmail): void
    {
        $this->companyEmail = $companyEmail;
    }

    /**
     * @return mixed
     */
    public function getCompanyPhone()
    {
        return $this->companyPhone;
    }

    /**
     * @param mixed $companyPhone
     */
    public function setCompanyPhone($companyPhone): void
    {
        $this->companyPhone = $companyPhone;
    }

    /**
     * @return mixed
     */
    public function getCompanyLogoUrl()
    {
        return $this->companyLogoUrl;
    }

    /**
     * @param mixed $companyLogoUrl
     */
    public function setCompanyLogoUrl($companyLogoUrl): void
    {
        $this->companyLogoUrl = $companyLogoUrl;
    }

    /**
     * @return mixed
     */
    public function getCompanyCity()
    {
        return $this->companyCity;
    }

    /**
     * @param mixed $companyCity
     */
    public function setCompanyCity($companyCity): void
    {
        $this->companyCity = $companyCity;
    }

    /**
     * @return mixed
     */
    public function getCompanyDistrict()
    {
        return $this->companyDistrict;
    }

    /**
     * @param mixed $companyDistrict
     */
    public function setCompanyDistrict($companyDistrict): void
    {
        $this->companyDistrict = $companyDistrict;
    }

    /**
     * @return mixed
     */
    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }

    /**
     * @param mixed $companyAddress
     */
    public function setCompanyAddress($companyAddress): void
    {
        $this->companyAddress = $companyAddress;
    }

    /**
     * @return mixed
     */
    public function getCompanyWebsiteUrl()
    {
        return $this->companyWebsiteUrl;
    }

    /**
     * @param mixed $companyWebsiteUrl
     */
    public function setCompanyWebsiteUrl($companyWebsiteUrl): void
    {
        $this->companyWebsiteUrl = $companyWebsiteUrl;
    }

    /**
     * @return mixed
     */
    public function getCompanySettings()
    {
        return $this->companySettings;
    }

    /**
     * @param mixed $companySettings
     */
    public function setCompanySettings($companySettings): void
    {
        $this->companySettings = $companySettings;
    }

    /**
     * @return mixed
     */
    public function getCompanyChannel()
    {
        return $this->companyChannel;
    }

    /**
     * @param mixed $companyChannel
     */
    public function setCompanyChannel($companyChannel): void
    {
        $this->companyChannel = $companyChannel;
    }

    /**
     * @return mixed
     */
    public function getCompanyAccounting()
    {
        return $this->companyAccounting;
    }

    /**
     * @param mixed $companyAccounting
     */
    public function setCompanyAccounting($companyAccounting): void
    {
        $this->companyAccounting = $companyAccounting;
    }

    /**
     * @return mixed
     */
    public function getCompanyRole()
    {
        return $this->companyRole;
    }

    /**
     * @param mixed $companyRole
     */
    public function setCompanyRole($companyRole): void
    {
        $this->companyRole = $companyRole;
    }

    /**
     * @return mixed
     */
    public function getCompanyRefId()
    {
        return $this->companyRefId;
    }

    /**
     * @param mixed $companyRefId
     */
    public function setCompanyRefId($companyRefId): void
    {
        $this->companyRefId = $companyRefId;
    }

    /**
     * @return mixed
     */
    public function getCompanyEInvoicingActivatedAt()
    {
        return $this->companyEInvoicingActivatedAt;
    }

    /**
     * @param mixed $companyEInvoicingActivatedAt
     */
    public function setCompanyEInvoicingActivatedAt($companyEInvoicingActivatedAt): void
    {
        $this->companyEInvoicingActivatedAt = $companyEInvoicingActivatedAt;
    }

    /**
     * @return mixed
     */
    public function getCompanyEInvoiceProvider()
    {
        return $this->companyEInvoiceProvider;
    }

    /**
     * @param mixed $companyEInvoiceProvider
     */
    public function setCompanyEInvoiceProvider($companyEInvoiceProvider): void
    {
        $this->companyEInvoiceProvider = $companyEInvoiceProvider;
    }

    /**
     * @return mixed
     */
    public function getCompanyEInvoiceCredit()
    {
        return $this->companyEInvoiceCredit;
    }

    /**
     * @param mixed $companyEInvoiceCredit
     */
    public function setCompanyEInvoiceCredit($companyEInvoiceCredit): void
    {
        $this->companyEInvoiceCredit = $companyEInvoiceCredit;
    }

    /**
     * @return mixed
     */
    public function getCompanyEInvoiceCreditSyncedAt()
    {
        return $this->companyEInvoiceCreditSyncedAt;
    }

    /**
     * @param mixed $companyEInvoiceCreditSyncedAt
     */
    public function setCompanyEInvoiceCreditSyncedAt($companyEInvoiceCreditSyncedAt): void
    {
        $this->companyEInvoiceCreditSyncedAt = $companyEInvoiceCreditSyncedAt;
    }

    /**
     * @return mixed
     */
    public function getCompanyAbilities()
    {
        return $this->companyAbilities;
    }

    /**
     * @param mixed $companyAbilities
     */
    public function setCompanyAbilities($companyAbilities): void
    {
        $this->companyAbilities = $companyAbilities;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }


}