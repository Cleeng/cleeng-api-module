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

namespace CleengApiModule\View\Helper;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Helper\AbstractHelper;

class EnableCleengJsApi extends AbstractHelper implements ServiceLocatorAwareInterface
{
    /**
     * Helper variable preventing Cleeng API from being included twice
     * @var bool
     */
    protected $enabled = false;

    /**
     * Service locator
     *
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;


    /**
     * Set the service locator.
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return AbstractHelper
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    /**
     * Get the service locator.
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    /**
     * Add Cleeng JS API to head scripts
     */
    public function __invoke()
    {
        if ($this->enabled) {
            return;
        }
        $cleengApi = $this->getServiceLocator()->getServiceLocator()->get('Cleeng\Api');
        $headScript = $this->view->plugin('headScript');
        $headScript->appendFile($cleengApi->getJsApiUrl());
        $this->enabled = true;
    }
}