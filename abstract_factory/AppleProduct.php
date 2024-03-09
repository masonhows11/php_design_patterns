<?php

include 'abstract_factory/smartPhone.php';
include 'abstract_factory/tablet.php';

class ApplePhone implements SmartPhone
{

    public function switchOn()
    {
        echo 'Apple Smartphone: Switching on';
    }

    public function ring()
    {
        echo 'Apple Smartphone: Ringing';
    }
}


class AppleTablet implements  Tablet {

    public function switchOn()
    {
        echo 'Apple Smartphone: Switching on';
    }

}

