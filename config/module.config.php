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

return array(
    'service_manager' => array(
        'factories' => array(
            'Cleeng\Api' => 'CleengApiModule\Service\CleengApiFactory',
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            'enableCleengJsApi' => 'CleengApiModule\View\Helper\EnableCleengJsApi',
        ),
    ),
    'cleeng_api' => array(
    ),
);