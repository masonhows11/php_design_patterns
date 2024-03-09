<?php

require './refactor/CouponActive.php';
require './refactor/CouponExist.php';
require './refactor/CouponExpire.php';

class CouponValidator
{

    private $coupon;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }


    public function validate(string $code)
    {

        

        $couponExist = new CouponExist($this->coupon);
        $couponActive = new CouponActive($this->coupon);
        $couponExpire = new CouponExpire($this->coupon);


        //// make chain (class) to gether orderby class instance
        //// l.1
        $couponExist->setNextValidator($couponActive);
        //// l.2
        $couponActive->setNextValidator($couponExpire);



        $couponExist->validate($code);
    }
}
