<?php

namespace Yengec;

use Yengec\Interface\RequestStringInterface;

class RequestStringBuilder {

    private string $reqString;

    public function __construct(string $reqString)
    {
        $this->reqString = $reqString;
    }

    /**
     * @return RequestStringBuilder
     */
    public static function make() : RequestStringBuilder
    {
        return new RequestStringBuilder('');
    }


    /**
     * @return string
     */
    public function getRequestString(): string
    {
        return $this->reqString;
    }

    /**
     * @return string
     */
    public function getRequestQueryString(): string
    {
        return '?'.$this->reqString;
    }

    /**
     * @param string $reqString
     */
    public function setReqString(string $reqString): void
    {
        $this->reqString = $reqString;
    }


    /**
     * @param string $key
     * @param mixed|null $value
     * @return RequestStringBuilder
     */
    public function append(string $key, mixed $value = null) : RequestStringBuilder
    {
        if($value instanceof RequestStringInterface)
            $this->appendKeyValue($key, $value->toRequestString());
        else
            $this->appendKeyValue($key, $value);

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     * @return RequestStringBuilder
     */
    private function appendKeyValue(string $key, string $value) : RequestStringBuilder
    {
        if(isset($value)){
            $tmp_array[$key] = $value;
            $tmp_query = $this->getRequestString() . ($this->getRequestString() !== '' ? '&' : '') . http_build_query($tmp_array, '', '&', PHP_QUERY_RFC3986);
            $this->setReqString($tmp_query);
        }

        return $this;
    }

    /**
     * @param Request $request
     * @return String|bool
     */
    public static function requestToQueryString(Request $request): String|bool
    {
        $queryString = false;

        if($request->getRequestId())
            $queryString .= "?requestId=".$request->getRequestId();
        if($request->getRequestTimeStamp())
            $queryString .= ($queryString ? "&" : "?") . "requestTimestamp=".$request->getRequestTimeStamp();

        return $queryString;
    }
}