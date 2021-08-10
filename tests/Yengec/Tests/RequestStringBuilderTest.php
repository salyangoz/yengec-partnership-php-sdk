<?php


namespace Yengec\Tests;


use Yengec\Request;
use Yengec\RequestStringBuilder;

class RequestStringBuilderTest extends TestCase
{
    /**
     * Tests RequestStringBuilder return correct query string given a request
     */
    public function testShouldRequestStringQuery()
   {
       $request = new Request();
       $request->setRequestId("1234");
       $request->setRequestTimeStamp("1234567");

       $result = RequestStringBuilder::requestToQueryString($request);

       $this->assertEquals("?requestId=1234&requestTimestamp=1234567", $result);
   }

}