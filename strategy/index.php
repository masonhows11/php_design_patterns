<?php



///// class Payment


// {

//     //// this class violatin solid principles


//     public function pay(int $amount, string $type)
//     {

//         if ($type == 'online') {
//             echo " pay $type amount $amount toman ";
//         }
//         if ($type == 'cashon') {
//             echo " pay $type amount $amount toman ";
//         }
//         if ($type == 'cartTocart') {
//             echo " pay $type amount $amount toman ";
//         }
//     }
// }


// $pay = new Payment();
// echo $pay->pay(25000, 'online');

//// this class do payment
//// and doing payment maney in many way/algoritms like 1.online 2.cashon 3.cartTocart
//// so this class seems we can implement strategry pattern  for this class
//// and we can separate each of payment strategy into one class


//// refactor to strategy pattern
interface PaymentStrategryInterface
{

    public function pay(int $amount);
}

//// online is strategry fro payment
class Online implements PaymentStrategryInterface
{

    public function pay(int $amount)
    {

        echo "pay $amount on online" . PHP_EOL;
    }
}

//// Cashon is strategry fro payment
class Cashon implements PaymentStrategryInterface
{

    public function pay(int $amount)
    {

        echo "pay $amount on cashon" . PHP_EOL;
    }
}

//// CartTocart is strategry fro payment
class CartTocart implements PaymentStrategryInterface
{

    public function pay(int $amount)
    {

        echo "pay $amount on cartTocart" . PHP_EOL;
    }
}


///// refactor class Payment on strategry pattern

class Payment
{

    private $strategy;

    public function __construct(PaymentStrategryInterface $paymentStrategy)
    {
        $this->setStrategy($paymentStrategy);
    }


    //// function setter for change strategy pattern in runtime

    public function setStrategy(PaymentStrategryInterface $paymentStrategy)
    {
        $this->strategy = $paymentStrategy;
    }


    public function pay(int $amount)
    {

        //// strategy is one the above  payment way like online cartTocart or cashon
        //// nad each strategy implement  PaymentStrategryInterface interface
        //// so each strategy has pay() method


        //// and we can write any login / other code we need
        //// write here
        return  $this->strategy->pay($amount);
    }
}


//// test payment class on different strategry

// $payment = new Payment(new Online);
// $payment->pay(150000);

// $payment = new Payment(new Cashon);
// $payment->pay(25000);


// $payment = new Payment(new CartTocart);
// $payment->pay(50000);

//// test payment class on different strategry on run time

$payment = new Payment(new Online);
$payment->pay(150000);


$payment->setStrategy(new CartTocart);
$payment->pay(45000);