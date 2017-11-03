<?php

namespace ASCII\Test\Http;

use ASCII\Http\Response;

class ResponseTest extends \PHPUnit\Framework\TestCase
{
    public function getResponse()
    {
        return $this->getMockBuilder(Response::class)->getMock();
    }
    /**
     * @dataProvider constructProvider
     */
    public function testConstruct ($propertyName, $value)
    {
        $class = new \ReflectionClass(Response::class);
        $property = $class->getProperty($propertyName);
        $property->setAccessible(true);
        $response = $class->newInstanceArgs([]);
        $this->assertTrue(
            $value === $property->getValue($response)
        );
        
    }
    public function constructProvider()
    {
        return [
            ["status", 200],
            ["reason", "OK"],
            ["header", []],
            ["body", ""]
            
        ];
    }
    public function statusProvider()
    {
        return [
            ["status", 200],
            ["reason", "OK"],
            ["header", []],
            ["body", ""]
            
        ];
    }
    /**
     * @dataProvider statusProvider
     * @expectedException \TypeError
     */
    
     public function testSetStatus ($status, $reason)
    {
        $this->getResponse()->setStatus($status, $reason);    
    }


}