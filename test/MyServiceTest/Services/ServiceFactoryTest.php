<?php
namespace MyService\Services;

use MyService\Services\ServiceFactory;
use PHPUnit_Framework_TestCase;

/**
 * another example for using mocking objects. 
 * this is neccessary for TDD
 */
class ServiceFactoryTest extends PHPUnit_Framework_TestCase 
{
   
    protected function getMyBusinessMock($greeting=null, $calc=null)
    {
        $mock = $this->getMock(
               'MyBusiness',
               array('greetingService', 'addTwoNumbersService')
               );
        
        $mock->expects($this->any())
                ->method('greetingService')
                ->will($this->returnValue($greeting));
        
        $mock->expects($this->any())
                ->method('addTwoNumbersService')
                ->will($this->returnValue($calc));
        
        return $mock;
        
    }    
            
    public function testInitialState()
    {
        $object = new ServiceFactory();

        $this->assertNull(
            $object->getBusiness(), 
            sprintf('"getBusiness()" should initially be null')
        );    
        
    }
    
    public function testSetsPropertiesCorrectly()
    {
        $object  = new ServiceFactory();
        $service = $this->getMyBusinessMock();
        $object->setBusiness($service);
        
        $this->assertSame(
                $service, 
                $object->getBusiness(), 
                sprintf('"getBusiness()" was not set correctly')
        );
    }
    
    public function testMethodReturnValues()
    {
        $object   = new ServiceFactory();
        $greeting = "Good Morning"; 
        $calc= 17;
        $service = $this->getMyBusinessMock($greeting, $calc);
        $object->setBusiness($service);
        
        $this->assertSame(
                $greeting, 
                $object->getInfo(), 
                sprintf('"getInfo()" do not work correctly')
        );
        
        $this->assertSame(
                $calc, 
                $object->getAddition(), 
                sprintf('"getAddition()" do not work correctly')
        );
    }
    
    
}


