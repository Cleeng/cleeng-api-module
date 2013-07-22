<?php
/**
 * CleengApiModule
 *
 * @link      http://cleeng.com
 * @link      https://github.com/cleeng
 * @author    Mateusz Tymek <mtymek@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace CleengApiModuleTest\Service;


use CleengApiModule\Service\CleengApiFactory;
use Zend\ServiceManager\ServiceManager;

class CleengApiFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateServiceCreatesCleengApiObjectWithSettingsInjectedFromConfiguration()
    {
        $sm = new ServiceManager();
        $sm->setService('Configuration',
            array(
                'cleeng_api' => array(
                    'endpoint' => 'https://cleeng.com/api-endpoint',
                    'batchMode' => true
                )
            )
        );

        $service = new CleengApiFactory();
        $cleengApi = $service->createService($sm);
        $this->assertInstanceOf('Cleeng_Api', $cleengApi);
        $this->assertEquals('https://cleeng.com/api-endpoint', $cleengApi->getEndpoint());
        $this->assertEquals(true, $cleengApi->getBatchMode());
    }

}