MyService
====

This is an example how to make use of the ZF2 services for having thin 
controllers. Busisness logic is injected as service to the controller.
By the way, the basic usage of mocking objects is shown for unit tests.
Without mocking objects, no TDD!

Features 
----

* services
* factory
* unit tests


Requirements
----

* PHP >= 5.3.3
* Zend Framework 2, beta4 or later, specifically:
    * Zend\ModuleManager (implements a ZF2 module)
    * Zend\Mvc (provides a controller)
    * Zend\ServiceManager (provides service factories)
    * Zend\View
 * phpunit >= 3.7.14


Installation
----

Install the module by cloning it into ./vendor/ and enabling it in your
application.config.php file.



License
----

Copyright (c) 2013, Dr. Holger Maerz
All rights reserved.

Redistribution and use in source and binary forms, with or without modification,
are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this
  list of conditions and the following disclaimer.

* Redistributions in binary form must reproduce the above copyright notice, this
  list of conditions and the following disclaimer in the documentation and/or
  other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR
ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
