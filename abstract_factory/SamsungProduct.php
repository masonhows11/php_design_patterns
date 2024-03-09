<?php

// include 'smartPhone.php';
// include 'tablet.php';

//// SamsungPhone product class
class SamsungPhone implements SmartPhone
{

    public function switchOn()
    {
        echo 'Samsung phone switching on ';
    }

    public function ring()
    {
        echo 'Samsung smartphone ringing ';
    }
}

//// SamsungTablet product class
class SamsungTablet implements Tablet
{

    public function switchOn()
    {
        echo 'Samsung tablet  switching on ';
    }
}
