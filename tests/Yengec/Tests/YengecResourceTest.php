<?php


namespace Yengec\Tests;


use Yengec\YengecResource;

class YengecResourceTest extends TestCase
{
    /**
     * Tests YengecResource setter and getter methods works as expected
     */
    public function testShouldSetRetrieveFields()
    {
        $resource = new YengecResource();
        $resource->setError("error");
        $resource->setErrorMessage(array("message" => "error message"));
        $resource->setRawData(array("raw" => "data"));
        $this->assertEquals("error", $resource->getError());
        $this->assertEquals(array("message" => "error message"), $resource->getErrorMessage());
        $this->assertEquals(array("raw" => "data"), $resource->getRawData());
    }

}