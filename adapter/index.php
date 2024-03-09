<?php


//// kavenegar is third party package
//// usually adapter design pattern used for third party package
class Kavenegar
{
    public function sendNotification()
    {
        echo "send sms with Kavenegar" . PHP_EOL;
    }
}


//// this is adapter for Kavenegar class
class KavenegarAdapter
{
    private $kavenegar;

    public function __construct(Kavenegar $kavenegar)
    {
        $this->kavenegar = $kavenegar;
    }

    public function sendSms()
    {

        return $this->kavenegar->sendNotification();
    }
}

class User
{


    //// use with out adapter design pattern ////
    // private $kavenegar;
    // public function __construct(Kavenegar $kavenegar)
    // {
    //     $this->kavenegar = $kavenegar;
    // }


    //// use with adapter design pattern
    private $kavenegarAdapter;
    public function __construct(KavenegarAdapter $kavenegarAdapter)
    {
        $this->kavenegarAdapter = $kavenegarAdapter;
    }

    public function create()
    {
        # code...
        echo "user created" . PHP_EOL;
        $this->kavenegarAdapter->sendSms();
    }
}

class Order
{
    //// use with out adapter design pattern ////
    // private $kavenegar;
    // public function __construct(Kavenegar $kavenegar)
    // {
    //     $this->kavenegar = $kavenegar;
    // }


    //// use with adapter design pattern ////
    private $kavenegarAdapter;
    public function __construct(KavenegarAdapter $kavenegarAdapter)
    {

        $this->kavenegarAdapter = $kavenegarAdapter;
    }
    public function create()
    {
        # code...
        echo "order created" . PHP_EOL;
        $this->kavenegarAdapter->sendSms();
    }
}

////
// $kavenegar = new Kavenegar();
////
// $user = new User($kavenegar);
// $user->create();
////
// $order = new Order($kavenegar);
// $order->create();



$kavenegar = new Kavenegar;
$kavenegarAdapter = new KavenegarAdapter($kavenegar);
    ////
$user = new User($kavenegarAdapter);
$user->create();
////
$order = new Order($kavenegarAdapter);
$order->create();
