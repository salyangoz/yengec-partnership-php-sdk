<?php


namespace Yengec\Model\Mapper;


use Yengec\JsonBuilder;
use Yengec\Response;
use Yengec\YengecResource;

class YengecResourceMapper
{
    protected Response $rawResponse;
    protected mixed $rawData;
    protected mixed $jsonObject;


    public function __construct(mixed $rawData)
    {
        $this->rawData = $rawData;
    }

    /**
     * @param null $rawData
     * @return YengecResourceMapper
     */
    public static function create($rawData = null): YengecResourceMapper
    {
        return new YengecResourceMapper($rawData);
    }

    public function jsonDecode(): YengecResourceMapper
    {
        $this->jsonObject = JsonBuilder::jsonDecode($this->rawData);
        return $this;
    }

    public function mapResourceFrom(YengecResource $resource, $jsonObject): YengecResource
    {
        if (isset($this->rawResponse)) {
            $resource->setRawResponse($this->rawResponse);
        }
        if (isset($jsonObject->error)) {
            $resource->setError($jsonObject->error);
        }
        if (isset($jsonObject->message)) {
            $resource->setErrorMessage($jsonObject->message);
        }
        if (isset($this->rawResult)) {
            $resource->setRawData($this->rawData);
        }

        return $resource;
    }

    public function mapResource(YengecResource $resource): YengecResource
    {
        return $this->mapResourceFrom($resource, $this->jsonObject);
    }

    public function saveRawResponse(Response $rawResponse): YengecResourceMapper
    {
        $this->rawResponse = $rawResponse;
        return $this;
    }


}