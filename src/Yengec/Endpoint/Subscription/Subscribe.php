<?php


namespace Yengec\Endpoint\Subscription;


use Http\Client\Exception;
use Yengec\Endpoint\AbstractEndpoint;
use Yengec\Endpoint\AcceptHeaderTrait;
use Yengec\Model\Mapper\SubsrciptionMapper;
use Yengec\Model\Subscription;
use Yengec\Request\CancelSubscriptionRequest;
use Yengec\Request\CreatePackageSubscriptionRequest;

class Subscribe extends AbstractEndpoint
{
    use AcceptHeaderTrait;

    protected const BASE_URI = '/subscription';

    /**
     * Subscribe to package
     *
     * @param CreatePackageSubscriptionRequest $request
     * @return Subscription
     * @throws Exception
     */
    public function create(CreatePackageSubscriptionRequest $request) : Subscription
    {
        $path = $this->getApiVersion().self::BASE_URI;
        $this->acceptHeaderValue = 'application/json';

        $rawResult = $this->post($path, $request);
        return SubsrciptionMapper::create($rawResult->getBody())->saveRawResponse($rawResult)->jsonDecode()->mapSubscription(new Subscription());
    }

    public function cancel(CancelSubscriptionRequest $request): Subscription
    {
        $path = $this->getApiVersion().self::BASE_URI.'/'.$request->getSubscriptionId();

        $this->acceptHeaderValue = 'application/json';

        $rawResult = $this->delete($path, $request);
        return SubsrciptionMapper::create($rawResult->getBody())->saveRawResponse($rawResult)->jsonDecode()->mapSubscription(new Subscription());
    }

}