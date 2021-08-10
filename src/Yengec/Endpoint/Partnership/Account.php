<?php

declare(strict_types=1);

namespace Yengec\Endpoint\Partnership;

use Http\Client\Exception;
use Yengec\Endpoint\AbstractEndpoint;
use Yengec\Endpoint\AcceptHeaderTrait;
use Yengec\Model\Mapper\PartnershipMapper;
use Yengec\Model\Partnership;
use Yengec\Request\CreatePartnershipRequest;

class Account extends AbstractEndpoint
{
    use AcceptHeaderTrait;

    protected const BASE_URI = '/partnership/account';

    /**
     * Create yengeç partnership account
     *
     * @param CreatePartnershipRequest $request
     * @return Partnership
     * @throws Exception
     */
    public function create(CreatePartnershipRequest $request) : Partnership
    {
        $path = $this->getApiVersion().self::BASE_URI;
        $this->acceptHeaderValue = 'application/json';

        $rawResult = $this->post($path, $request);
        return PartnershipMapper::create($rawResult->getBody())->saveRawResponse($rawResult)->jsonDecode()->mapPartnership(new Partnership());
    }

}