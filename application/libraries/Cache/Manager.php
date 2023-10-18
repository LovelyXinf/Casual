<?php

namespace Pg\Libraries\Cache;

class Manager
{
    const NS_PREFIX = 'pg';

    const PROVIDER_APC = 'apc';

    const PROVIDER_BLACKHOLE = 'blackhole';

    const PROVIDER_ELASTI_CACHE = 'elasticache';

    const PROVIDER_FILESYSTEM = 'filesystem';

    const PROVIDER_MEMCACHE = 'memcache';

    const PROVIDER_MEMCACHED = 'memcached';

    const PROVIDER_MEMCACHED_SASL = 'Memcachedsasl';

    const PROVIDER_MEMORY = 'memory';

    const PROVIDER_MYSQL = 'mysql';

    const PROVIDER_REDIS = 'redis';

    const PROVIDER_SQLITE = 'sqlite';

    const PROVIDER_WIN_CACHE = 'wincache';

    const PROVIDER_X_CACHE = 'xcache';

    const PROVIDER_ZENDSERVER = 'zendserver';

    const PROVIDER_DEFAULT = self::PROVIDER_FILESYSTEM;

    private $factory;

    private $adapters = [];

    private $services = [];

    private $providers = [
        self::PROVIDER_APC,
        self::PROVIDER_BLACKHOLE,
        self::PROVIDER_FILESYSTEM,
        self::PROVIDER_MEMORY,
    ];

    private static $instance;

    private function __construct()
    {
        $this->factory = new \wv\BabelCache\SimpleFactory();

        $this->factory->setCachePrefix(self::NS_PREFIX);
        $this->factory->setCacheDirectory(TEMPPATH . 'cache');

        if (!empty($_ENV['ELASTI_CACHE_HOST']) && !empty($_ENV['ELASTI_CACHE_PORT'])) {
            $this->factory->setElastiCacheEndpoint($_ENV['ELASTI_CACHE_HOST'], $_ENV['ELASTI_CACHE_PORT']);
            $this->providers[] = self::PROVIDER_ELASTI_CACHE;
        }

        if (!empty($_ENV['MEMCACHED_HOST']) && !empty($_ENV['MEMCACHED_PORT'])) {
            $this->factory->setMemcachedAddresses([$_ENV['MEMCACHED_HOST'], $_ENV['MEMCACHED_PORT'], 0]);

            if (!empty($_ENV['MEMCACHED_AUTH_USERNAME']) && !empty($_ENV['MEMCACHED_AUTH_PASSWORD'])) {
                $this->factory->setMemcachedAuthentication([$_ENV['MEMCACHED_AUTH_USERNAME'], $_ENV['MEMCACHED_AUTH_PASSWORD']]);
            }

            $this->providers[] = self::PROVIDER_MEMCACHE;
            $this->providers[] = self::PROVIDER_MEMCACHED;
        }

        if (!empty($_ENV['REDIS_HOST']) && !empty($_ENV['REDIS_PORT'])) {
            $this->factory->setRedisAddresses(['host' => $_ENV['REDIS_HOST'], 'port' => $_ENV['REDIS_PORT']]);
            $this->providers[] = self::PROVIDER_REDIS;
        }
    }

    /**
     * Get singleton
     *
     * @return \Pg\Libraries\Cache\Manager
     */
    public static function &getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    protected function getAdapter($service)
    {
        if (!array_key_exists($service, $this->adapters)) {
            $cache = $this->factory->getCache($this->services[$service]['provider']);

            //TODO: use babelcache library
            $this->adapters[$service] = new \wv\BabelCache\Adapter\Jailed($cache, $service, true);
        }

        return $this->adapters[$service];
    }

    public function registerService($name, $provider=null)
    {
        if (!$provider || !in_array($provider, $this->providers)) {
            $provider = self::PROVIDER_DEFAULT;
        }

        $this->services[$name] = ['provider' => $provider];
    }

    protected function getValue($service, $key, $callback)
    {
        $adapter = $this->getAdapter($service);

        $value = $adapter->get($key);

        if ($value === null) {
            $value = $callback();

            if ($value === null) {
                return null;
            }

            $adapter->set($key, $value);
        }

        return $value;
    }

    protected function mgetValue($service, $keys, $callback)
    {
        $adapter = $this->getAdapter($service);

        $values = [];
        $uvalues = [];

        foreach ($keys as $key) {
            $values[$key] = $adapter->get($key);
            if ($values[$key] === null) {
				unset($values[$key]);
                $uvalues[] = $key;
            }
        }

        if (!empty($uvalues)) {
            $uvalues = $callback($uvalues, true);
            foreach ($uvalues as $key => $value) {
                $values[$key] = $value;
                $adapter->set($key, $value);
            }
        }

        return array_values($values);
    }

    protected function setValue($service, $key, $value)
    {
        $this->getAdapter($service)->set($key, $value);
    }

    protected function existsValue($service, $key)
    {
        return $this->getAdapter($service)->exists($key);
    }

    protected function deleteValue($service, $key)
    {
        $this->getAdapter($service)->delete($key);
    }

    protected function flushValue($service)
    {
        $this->getAdapter($service)->clear();
    }

    public function __call($name, $args)
    {
        if (!$_ENV['DATA_USE_CACHE']) {
            $count = count($args);
            if ($args[$count - 1] instanceof \Closure) {
                $callback = $args[$count - 1];
                return $callback($args[$count - 2], false);
            } else {
                return;
            }
        }

        if (!method_exists($this, $name . 'Value')) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $name . 'Value'], $args);
    }
}
