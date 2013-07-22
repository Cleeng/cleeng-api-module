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


use CleengApiModule\Exception\BadMethodCallException;
use CleengApiModule\Exception\InvalidArgumentException;
use Traversable;
use Zend\Stdlib\ParameterObjectInterface;

class CleengApi implements ParameterObjectInterface
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
    protected $batchMode = false;

    /**
     * @var string
     */
    protected $publisherToken;

    /**
     * @var string
     */
    protected $distributorToken;

    /**
     * @var string
     */
    protected $appId;

    /**
     * @param string $appId
     * @return self
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
        return $this;
    }

    /**
     * Constructor
     *
     * @param  array|Traversable|null $options
     */
    public function __construct($options = null)
    {
        if (null !== $options) {
            $this->setFromArray($options);
        }
    }

    /**
     * Cast to array
     *
     * @return array
     */
    public function toArray()
    {
        $array = array();
        foreach ($this as $key => $value) {
            $array[$key] = $value;
        }
        return $array;
    }

    /**
     * Set one or more configuration properties
     *
     * @param  array|Traversable|AbstractOptions $options
     * @throws InvalidArgumentException
     * @return AbstractOptions Provides fluent interface
     */
    public function setFromArray($options)
    {
        if ($options instanceof self) {
            $options = $options->toArray();
        }

        if (!is_array($options) && !$options instanceof Traversable) {
            throw new InvalidArgumentException(sprintf(
                'Parameter provided to %s must be an %s, %s or %s',
                __METHOD__, 'array', 'Traversable', 'Zend\Stdlib\AbstractOptions'
            ));
        }

        foreach ($options as $key => $value) {
            $this->__set($key, $value);
        }

        return $this;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     * @throws \CleengApiModule\Exception\BadMethodCallException
     */
    public function __set($key, $value)
    {
        $setter = 'set' . ucfirst($key);
        if (!method_exists($this, $setter)) {
            throw new BadMethodCallException(
                'The option "' . $key . '" does not '
                . 'have a matching ' . $setter . ' setter method '
                . 'which must be defined'
            );
        }
        $this->{$setter}($value);
    }

    /**
     * @param string $key
     * @throws \CleengApiModule\Exception\BadMethodCallException
     * @return mixed
     */
    public function __get($key)
    {
        $getter = 'get' . ucfirst($key);
        if (!method_exists($this, $getter)) {
            throw new BadMethodCallException(
                'The option "' . $key . '" does not '
                . 'have a matching ' . $getter . ' getter method '
                . 'which must be defined'
            );
        }

        return $this->{$getter}();
    }

    /**
     * @param string $key
     * @return bool
     */
    public function __isset($key)
    {
        return null !== $this->__get($key);
    }

    /**
     * @param string $key
     * @throws InvalidArgumentException
     * @return void
     */
    public function __unset($key)
    {
        try {
            $this->__set($key, null);
        } catch (BadMethodCallException $e) {
            throw new InvalidArgumentException(
                'The class property $' . $key . ' cannot be unset as'
                . ' NULL is an invalid value for it',
                0,
                $e
            );
        }
    }

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->appId;
    }

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