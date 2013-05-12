<?php
namespace MyService\Business;

use MyService\Business\MyBusiness;
use PHPUnit_Framework_TestCase;

class MyBusinessTest extends PHPUnit_Framework_TestCase
{
    
    /**
     * simple test of the class methods
     */
    public function testMethodReturnValues()
    {
        $object = new MyBusiness(Test);
        
        $this->assertSame(
                "Hello World!", 
                $object->greetingService(), 
                sprintf('"greetingService()" did not work as expected')
        );
        
        
        $this->assertSame(
                9, 
                $object->addTwoNumbersService(4,5), 
                sprintf('"addTwoNumbersService()" did not work as expected')
        );
        
       
    }        
        
}

?>
