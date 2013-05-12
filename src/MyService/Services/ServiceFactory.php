<?php

namespace MyService\Services;

use MyService\Business\MyBusiness;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * simple example. while creating the service a composite object is set.
 * The methods of the service directly access the methods of the set object.
 * This is how you can handle database requests without writing code in 
 * the controller
 */
class ServiceFactory implements FactoryInterface 
{
   
    protected $_business;
    
    /**
     * getter
     * @return object
     */
    public function getBusiness() 
    {
        return $this->_business;
    }
    
    /**
     * setter
     * @param object $business
     * @return \MyService\Services\ServiceFactory
     */
    public function setBusiness($business) 
    {
        $this->_business=$business;
        return $this;
    }
    
    /**
     * this is only to show how to handle the servicelocator. usually you
     * access here the configuration file and other services.
     * 
     * @param \Zend\ServiceManager\ServiceLocatorInterface $services
     * @return \MyService\Services\ServiceFactory
     */
    public function createService(ServiceLocatorInterface $services)
    {
        
      $this->setBusiness(new MyBusiness());
      return $this;
        
    }
    
    /**
     * a dummy method
     * @return string
     */
    public function getInfo()
    {
       return $this->getBusiness()->greetingService();
    }        
    
    /**
     * another dummy
     * @return int
     */
    public function getAddition()
    {
        return $this->getBusiness()->addTwoNumbersService(17, 4);
    }
    
    
}


