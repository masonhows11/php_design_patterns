<?php




class Singlton
{


    private static $instance;


    protected function __construct()
    {
        
    }

    public static function getInstance()
    {
        if (self::$instance == null) {

            self::$instance = new static;
        }

        return self::$instance;
    }
}



class Config extends Singlton
{

    public function getData()
    {
        return [
            'host' => '127.0.0.1'
        ];
    }
}


$config = Config::getInstance();

$config1 = Config::getInstance();
$config1 = new Config();

var_dump($config === $config1);
