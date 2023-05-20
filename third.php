<?php 

interface ConfigInterface
{
    public function get(string $key);
}

class FileConfig implements ConfigInterface {
    public function get(string $key) {}
}
class DbConfig implements ConfigInterface {
    public function get(string $key) {}
}
class RedisConfig implements ConfigInterface {
    public function get(string $key) {}
}

class ConfigFactory 
{
    const TYPE_FILE = 'file';
    const TYPE_DB = 'db';
    const TYPE_REDIS = 'redis';

    public static function getConfigObject(string $type) : ConfigInterface
    {
        switch ($type) {
            case self::TYPE_FILE:
                return new FileConfig();
            case self::TYPE_DB:
                return new DbConfig();
            case self::TYPE_REDIS:
                return new RedisConfig();
            default:
                throw new Exception("Invalid type");
        }
    }
}

class Concept {
    private $client;

    public function __construct() {
        $this->client = new \GuzzleHttp\Client();
    }

    public function getUserData() {
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $this->getSecretKey('db')
        ];

        $request = new \Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }

    protected function getSecretKey(string $type) : string {
        $config = ConfigFactory::getConfigObject($type);
        return $config->get('$secret_key');
    }
}