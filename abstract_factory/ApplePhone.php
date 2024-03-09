<?php

include 'abstract_factory/smartPhone.php';

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