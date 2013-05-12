<?php
namespace MyService\Controller;


use MyServiceTest\Bootstrap;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use MyService\Controller\MyServiceController as Controller;
use Zend\Http\Request;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use PHPUnit_Framework_TestCase;

/**
 *  Due to the dependency of the service, we have to introduce mocking objects
 */
class MyServiceControllerTest extends PHPUnit_Framework_TestCase
{
    protected $_controller;
    protected $_request;
    protected $_response;
    protected $_routeMatch;
    protected $_event;

    protected function setUp()
    {
        $serviceManager    = Bootstrap::getServiceManager();
        $this->_controller = new Controller();
        
        
        $this->_request    = new Request();
        $this->_routeMatch = new RouteMatch(array('controller' => 'index'));
        $this->_event      = new MvcEvent();
        
        $config = $serviceManager->get('Config');
        $routerConfig = isset($config['router']) ? $config['router'] : array();
        $router = HttpRouter::factory($routerConfig);
        
        $this->_event->setRouter($router);
        $this->_event->setRouteMatch($this->_routeMatch);
        $this->_controller->setEvent($this->_event);
        $this->_controller->setServiceLocator($serviceManager);
       
    }
  
    protected function getMyServiceMock($info='info', $calc=12)
    {
        $mock = $this->getMock(
               'service',
               array('getInfo', 'getAddition')
               );
        
        $mock->expects($this->any())
                ->method('getInfo')
                ->will($this->returnValue($info));
        
        $mock->expects($this->any())
                ->method('getAddition')
                ->will($this->returnValue($calc));
        
        return $mock;
        
    }    
    
    public function testInitialState()
    {
        $this->assertNull(
            $this->_controller->getService(), 
            sprintf('"getService()" should initially be null')
        );  
    }
    
    public function testSetsPropertiesCorrectly()
    {
        $service = $this->getMyServiceMock();
        $this->_controller->setService($service);
        
        $this->assertSame(
                $service, 
                $this->_controller->getService(), 
                sprintf('"getService()" was not set correctly')
        );
    }
    
    public function testIndexActionCanBeAccessed()
    {
        $this->_routeMatch->setParam('action', 'index');

        
        $mock = $this->getMyServiceMock();
        $this->_controller->setService($mock);
       
        $result   = $this->_controller->dispatch($this->_request);
        $response = $this->_controller->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertInstanceOf('Zend\View\Model\ViewModel', $result);
        
    }
    
    
}