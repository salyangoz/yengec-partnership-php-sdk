<?php


namespace Yengec\Model\Mapper;


use Yengec\Model\Partnership;
use Yengec\YengecResource;
use function PHPUnit\Framework\isJson;

class PartnershipMapper extends YengecResourceMapper
{
    public static function create($rawData = null): PartnershipMapper
    {
        return new PartnershipMapper($rawData);
    }

    public function mapPartnershipFrom(Partnership $partnership, $jsonObject): Partnership
    {
        parent::mapResourceFrom($partnership, $jsonObject);

        if(isset($jsonObject->data->user->id))
            $partnership->setUserId($jsonObject->data->user->id);
        if(isset($jsonObject->data->user->name))
            $partnership->setUserName($jsonObject->data->user->name);
        if(isset($jsonObject->data->user->email))
            $partnership->setUserEmail($jsonObject->data->user->email);
        if(isset($jsonObject->data->user->mobile))
            $partnership->setUserMobile($jsonObject->data->user->mobile);
        if(isset($jsonObject->data->user->provider))
            $partnership->setUserProvider($jsonObject->data->user->provider);
        if(isset($jsonObject->data->user->is_email_verified))
            $partnership->setUserIsEmailVerified($jsonObject->data->user->is_email_verified);
        if(isset($jsonObject->data->user->is_mobile_verified))
            $partnership->setUserIsEmailVerified($jsonObject->data->user->is_mobile_verified);
        if(isset($jsonObject->data->user->mobile_notification))
            $partnership->setUserMobileNotification($jsonObject->data->user->mobile_notification);
        if(isset($jsonObject->data->user->channel))
            $partnership->setUserChannel($jsonObject->data->user->channel);
        if(isset($jsonObject->data->user->has_password))
            $partnership->setUserHasPassword($jsonObject->data->user->has_password);
        if(isset($jsonObject->data->user->language))
            $partnership->setUserLanguage($jsonObject->data->user->language);
        if(isset($jsonObject->data->user->created_at))
            $partnership->setUserCreatedAt($jsonObject->data->user->created_at);


        if(isset($jsonObject->data->company->id))
            $partnership->setCompanyId($jsonObject->data->company->id);
        if(isset($jsonObject->data->company->parasut_id))
            $partnership->setCompanyParasutId($jsonObject->data->company->parasut_id);
        if(isset($jsonObject->data->company->accounting_id))
            $partnership->setCompanyAccountingId($jsonObject->data->company->accounting_id);
        if(isset($jsonObject->data->company->accounting_url))
            $partnership->setCompanyAccountingUrl($jsonObject->data->company->accounting_url);
        if(isset($jsonObject->data->company->name))
            $partnership->setCompanyName($jsonObject->data->company->name);
        if(isset($jsonObject->data->company->tax_number))
            $partnership->setCompanyTaxNumber($jsonObject->data->company->tax_number);
        if(isset($jsonObject->data->company->accounting_id))
            $partnership->setCompanyAccountingId($jsonObject->data->company->accounting_id);
        if(isset($jsonObject->data->company->tax_office))
            $partnership->setCompanyTaxOffice($jsonObject->data->company->tax_office);
        if(isset($jsonObject->data->company->email))
            $partnership->setCompanyEmail($jsonObject->data->company->email);
        if(isset($jsonObject->data->company->phone))
            $partnership->setCompanyPhone($jsonObject->data->company->phone);
        if(isset($jsonObject->data->company->logo_url))
            $partnership->setCompanyLogoUrl($jsonObject->data->company->logo_url);
        if(isset($jsonObject->data->company->address))
            $partnership->setCompanyAddress($jsonObject->data->company->address);
        if(isset($jsonObject->data->company->city))
            $partnership->setCompanyCity($jsonObject->data->company->city);
        if(isset($jsonObject->data->company->website_url))
            $partnership->setCompanyWebsiteUrl($jsonObject->data->company->website_url);
        if(isset($jsonObject->data->company->settings))
            $partnership->setCompanySettings($jsonObject->data->company->settings);
        if(isset($jsonObject->data->company->channel))
            $partnership->setCompanyChannel($jsonObject->data->company->channel);
        if(isset($jsonObject->data->company->accounting))
            $partnership->setCompanyAccounting($jsonObject->data->company->accounting);
        if(isset($jsonObject->data->company->role))
            $partnership->setCompanyRole($jsonObject->data->company->role);
        if(isset($jsonObject->data->company->e_invoicing_activated_at))
            $partnership->setCompanyEInvoicingActivatedAt($jsonObject->data->company->e_invoicing_activated_at);
        if(isset($jsonObject->data->company->abilities))
            $partnership->setCompanyAbilities($jsonObject->data->company->abilities);

        if(isset($jsonObject->data->token))
            $partnership->setToken($jsonObject->data->token);

        return $partnership;
    }

    public function mapPartnership(Partnership $partnership): Partnership
    {
        return $this->mapPartnershipFrom($partnership, $this->jsonObject);
    }

}