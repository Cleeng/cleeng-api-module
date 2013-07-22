<?php
use CleengApiModule\View\Helper\EnableCleengJsApi;
use Zend\ServiceManager\ServiceManager;
use Zend\View\HelperPluginManager;

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

class EnableCleengJsApiTest extends \PHPUnit_Framework_TestCase
{
    public function testInvokeAppendsJsApiUrlToHeadScriptHelper()
    {
        $cleengApi = $this->getMock('Cleeng_Api', array('getJsApiUrl'));
        $cleengApi->expects($this->once())->method('getJsApiUrl')
            ->will($this->returnValue('https://cleeng.com/api-endpoint'));

        $headScript = $this->getMock('Zend\View\Helper\HeadScript', array('appendFile'));
        $headScript->expects($this->once())->method('appendFile')
            ->with('https://cleeng.com/api-endpoint');


        $sm = new ServiceManager();
        $sm->setService('Cleeng\Api', $cleengApi);
        $pluginManager = new HelperPluginManager();
        $pluginManager->setServiceLocator($sm);

        $view = $this->getMock('Zend\View\Renderer\PhpRenderer', array('plugin'));
        $view->expects($this->once())->method('plugin')->with('headScript')
            ->will($this->returnValue($headScript));

        $helper = new EnableCleengJsApi();
        $helper->setServiceLocator($pluginManager);
        $helper->setView($view);

        $helper->__invoke();
    }
}