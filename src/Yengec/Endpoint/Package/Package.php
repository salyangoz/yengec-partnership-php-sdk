<?php


namespace Yengec\Endpoint\Package;


use Http\Client\Exception;
use Yengec\Endpoint\AbstractEndpoint;
use Yengec\Endpoint\AcceptHeaderTrait;
use Yengec\Model\Lists\PackageList;
use Yengec\Model\Mapper\PackageListMapper;
use Yengec\Request\ListPackagesRequest;

class Package extends AbstractEndpoint
{
    use AcceptHeaderTrait;

    protected const BASE_URI = '/package';

    /**
     * Fetch Yengeç packages list
     *
     * @param ListPackagesRequest $request
     * @return PackageList
     * @throws Exception
     */
    public function fetch(ListPackagesRequest $request) : PackageList
    {
        $path = $this->getApiVersion().self::BASE_URI;
        $this->acceptHeaderValue = 'application/json';

        $rawResult = $this->get($path, $request);
        return PackageListMapper::create($rawResult->getBody())->saveRawResponse($rawResult)->jsonDecode()->mapPackageList(new PackageList());
    }
}