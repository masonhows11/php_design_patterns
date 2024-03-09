<?php

require_once 'AbstractCouponValidator.php';

class CouponActive extends AbstractCouponValidator
{
    
    public function validate($code)
    {
        if (!$this->coupon->isActive($code)) {
            throw new Exception('Coupon not active');
        }
        echo "coupon is active" . PHP_EOL;

         //// for set next chain of cycle
         return $this->gotToNextValidator($code);
    }





    
}
