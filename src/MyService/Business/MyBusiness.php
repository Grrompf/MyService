<?php
namespace MyService\Business;

/**
 * example of a business class doing logical stuff 
 */
class MyBusiness
{
    
    /**
     * just a greeting service
     * @return string
     */
    public function greetingService()
    {
        return "Hello World!";
    }        
    
    /**
     * adds two given numbers and returns the result
     * 
     * @param int $first
     * @param int $second
     * @return int
     */
    public function addTwoNumbersService($first, $second)
    {
        return $first + $second;
    }        
}

?>
