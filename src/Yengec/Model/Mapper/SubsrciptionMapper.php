<?php


namespace Yengec\Model\Mapper;


use Yengec\Model\Package;
use Yengec\Model\Subscription;
use Yengec\YengecResource;

class SubsrciptionMapper extends YengecResourceMapper
{
    public static function create($rawData = null): SubsrciptionMapper
    {
        return new SubsrciptionMapper($rawData);
    }

    public function mapSubscriptionFrom(Subscription $subscription, $jsonObject): Subscription
    {
        parent::mapResourceFrom($subscription, $jsonObject);

        if(isset($jsonObject->data->id))
            $subscription->setId($jsonObject->data->id);

        if(isset($jsonObject->data->card_id))
            $subscription->setCardId($jsonObject->data->card_id);

        if(isset($jsonObject->data->price))
            $subscription->setPrice($jsonObject->data->price);

        if(isset($jsonObject->data->channel))
            $subscription->setChannel($jsonObject->data->channel);

        if(isset($jsonObject->data->promotion))
            $subscription->setPromotion($jsonObject->data->promotion);

        if(isset($jsonObject->data->created_at))
            $subscription->setCreatedAt($jsonObject->data->created_at);

        if(isset($jsonObject->data->renewal_at))
            $subscription->setRenewalAt($jsonObject->data->renewal_at);

        if(isset($jsonObject->data->deleted_at))
            $subscription->setDeletedAt($jsonObject->data->deleted_at);

        if(isset($jsonObject->data->is_expired))
            $subscription->setIsExpired($jsonObject->data->is_expired);

        if(isset($jsonObject->data->renew_month))
            $subscription->setRenewMonth($jsonObject->data->renew_month);

        if(isset($jsonObject->data->recoverable))
            $subscription->setRecoverable($jsonObject->data->recoverable);

        if(isset($jsonObject->data->price_readable))
            $subscription->setPriceReadable($jsonObject->data->price_readable);

        if(isset($jsonObject->data->payment_method))
            $subscription->setPaymentMethod($jsonObject->data->payment_method);

        if(isset($jsonObject->data->promotion_code))
            $subscription->setPromotionCode($jsonObject->data->promotion_code);

        if(isset($jsonObject->data->channel_readable))
            $subscription->setChannelReadable($jsonObject->data->channel_readable);

        if(isset($jsonObject->data->integration_count))
            $subscription->setIntegrationCount($jsonObject->data->integration_count);

        if(isset($jsonObject->data->cancelable))
            $subscription->setCancelable($jsonObject->data->cancelable);

        if(isset($jsonObject->data->cancelable_reason))
            $subscription->setCancelableReason($jsonObject->data->cancelable_reason);

        if(isset($jsonObject->data->renewal_at_readable))
            $subscription->setRenewalAtReadable($jsonObject->data->renewal_at_readable);

        if(isset($jsonObject->data->not_recoverable_reason))
            $subscription->setNotRecoverableReason($jsonObject->data->not_recoverable_reason);

        if(isset($jsonObject->data->payable_with_credit_card))
            $subscription->setPayableWithCreditCard($jsonObject->data->payable_with_credit_card);

        if(isset($jsonObject->data->package)){
            $package = new Package();
            $package->setId($jsonObject->data->package->data->id);
            $package->setName($jsonObject->data->package->data->name);
            $package->setCode($jsonObject->data->package->data->code);
            $package->setSort($jsonObject->data->package->data->sort);
            $package->setMarketplaces($jsonObject->data->package->data->marketplaces);
            $package->setPrices($jsonObject->data->package->data->prices);
            $package->setUnlimited($jsonObject->data->package->data->unlimited);
            $package->setSellableByPartner($jsonObject->data->package->data->sellable_by_partner);
            $package->setPaymentPartner($jsonObject->data->package->data->payment_partner);

            $subscription->setPackage($package);
        }

        return $subscription;
    }

    public function mapSubscription(Subscription $subscription): Subscription
    {
        return $this->mapSubscriptionFrom($subscription, $this->jsonObject);
    }
}