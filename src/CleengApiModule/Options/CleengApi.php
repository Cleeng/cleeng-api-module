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

namespace CleengApiModule\Options;

use Zend\Stdlib\AbstractOptions;

class CleengApi extends AbstractOptions
{

    /**
     * @var string
     */
    protected $endpoint = 'https://api.cleeng.com/3.0/json-rpc';

    /**
     * @var string
     */
    protected $jsApiUrl = 'http://cdn.cleeng.com/js-api/3.0/api.js';

    /**
     * @var bool
     */
    protected $batchMode;

    /**
     * @var string
     */
    protected $customerToken;

    /**
     * @var string
     */
    protected $publisherToken;

    /**
     * @var string
     */
    protected $distributorToken;

    /**
     * @param boolean $batchMode
     * @return self
     */
    public function setBatchMode($batchMode)
    {
        $this->batchMode = $batchMode;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getBatchMode()
    {
        return $this->batchMode;
    }

    /**
     * @param string $customerToken
     * @return self
     */
    public function setCustomerToken($customerToken)
    {
        $this->customerToken = $customerToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerToken()
    {
        return $this->customerToken;
    }

    /**
     * @param string $distributorToken
     * @return self
     */
    public function setDistributorToken($distributorToken)
    {
        $this->distributorToken = $distributorToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getDistributorToken()
    {
        return $this->distributorToken;
    }

    /**
     * @param string $endpoint
     * @return self
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param string $jsApiUrl
     * @return self
     */
    public function setJsApiUrl($jsApiUrl)
    {
        $this->jsApiUrl = $jsApiUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getJsApiUrl()
    {
        return $this->jsApiUrl;
    }

    /**
     * @param string $publisherToken
     * @return self
     */
    public function setPublisherToken($publisherToken)
    {
        $this->publisherToken = $publisherToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublisherToken()
    {
        return $this->publisherToken;
    }

}