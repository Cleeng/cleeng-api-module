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

namespace CleengApiModule\Service;

use Cleeng_Api;
use DoctrineModule\Service\AbstractFactory;
use Zend\ServiceManager\ServiceLocatorInterface;

class CleengApiFactory extends AbstractFactory
{

    /**
     * Get the class name of the options associated with this factory.
     *
     * @return string
     */
    public function getOptionsClass()
    {
        return 'CleengApiModule\Options\CleengApi';
    }

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $options = $this->getOptions($serviceLocator, 'cleeng_api');
        $api = new Cleeng_Api($options->toArray());
        return $api;
    }
}