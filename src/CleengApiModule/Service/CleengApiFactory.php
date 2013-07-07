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
use CleengApiModule\Options\CleengApi as CleengApiOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CleengApiFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $cfg = $serviceLocator->get('Configuration');
        $api = new Cleeng_Api($cfg['cleeng_api']);
        return $api;
    }
}