<?php
namespace MyService\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Thin controller rulez. All the business logic is made by a service.
 * Depending on a getter/setter makes a controllerFactory neccessary.    
 */
class MyServiceController extends AbstractActionController
{
    protected $_service;
    
    /**
     * getter
     * @return object
     */
    public function getService()
    {
       return $this->_service;    
    }
    
    /**
     * setter
     * @param object $service
     * @return \MyService\Controller\MyServiceController
     */
    public function setService($service)
    {
        $this->_service = $service;
        return $this;
    }        
    /**
    * action method
    */
    public function indexAction()
    {
       
       return new ViewModel(
           array(
              'info' => $this->getService()->getInfo(),
              'calc' => $this->getService()->getAddition(), 
           )
       );
    }
   
}
