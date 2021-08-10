<?php


namespace Yengec\Endpoint\Integration;


use Http\Client\Exception;
use Yengec\Endpoint\AbstractEndpoint;
use Yengec\Endpoint\AcceptHeaderTrait;
use Yengec\Model\Lists\CompanyIntegrationList;
use Yengec\Model\Mapper\CompanyIntegrationListMapper;
use Yengec\Request\ListCompanyIntegrationsRequest;

class Integration extends AbstractEndpoint
{
    use AcceptHeaderTrait;

    protected const BASE_URI = '/integration';

    /**
     * Fetch specified company integrations
     *
     * @param ListCompanyIntegrationsRequest $request
     * @return CompanyIntegrationList
     * @throws Exception
     */
    public function fetch(ListCompanyIntegrationsRequest $request): CompanyIntegrationList
     {
         $path = $this->getApiVersion().self::BASE_URI;
         $this->acceptHeaderValue = 'application/json';

         $rawResult = $this->get($path, $request);
         return CompanyIntegrationListMapper::create($rawResult->getBody())->saveRawResponse($rawResult)->jsonDecode()->mapIntegrationList(new CompanyIntegrationList());
     }
}