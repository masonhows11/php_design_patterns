<?php

require_once 'AbstractCouponValidator.php';

class CouponExist extends AbstractCouponValidator
{



    public function validate($code)
    {
        if (empty($this->coupon->find($code))) {
            throw new Exception('Coupon does not exist');
        }
        echo "coupon is exist" . PHP_EOL;

         //// for set next chain of cycle
         return $this->gotToNextValidator($code);
    }




    // private Coupon $coupon;

    //// for run next level of chain
    // private $nextLevelValidator;

    // public function __construct(Coupon $coupon)
    // {
    //     $this->coupon = $coupon;
    // }

     //// for run next level of chain
    //  public function setNextValidator($validator)
    //  {
    //      # code...
    //      $this->nextLevelValidator = $validator;
    //  }

   

    //// for if this chain is last do some thing

    // public function gotToNextValidator($code)
    // {
    //     # if this chain is last do

    //     if($this->nextLevelValidator == null ){
    //         return true;
    //     }

    //     # else this chain is last do
    //     return $this->nextLevelValidator->validate($code);

    // }


   
}
