<?php

require './coupon.php';
require './couponValidator.php';

$code = '13245';
$coupon = new Coupon();
$validator = new CouponValidator($coupon);


$validator->validate($code);