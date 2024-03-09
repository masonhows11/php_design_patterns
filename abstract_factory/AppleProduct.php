<?php

include 'smartPhone.php';
include 'tablet.php';

//// ApplePhone product class
class ApplePhone implements SmartPhone
{

    public function switchOn()
    {
        echo 'Apple phone Switching on ';
    }

    public function ring()
    {
        echo 'Apple phone  Ringing ';
    }
}

//// AppleTablet product class
class AppleTablet implements  Tablet {

    public function switchOn()
    {
        echo 'Apple Tablet Switching on ';
    }

}

