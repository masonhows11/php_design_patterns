
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Abstract Factory</title>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

<h3>Abstract Factory</h3>
<form action="<?= $_SERVER['PHP_SELF'] ?>">
    Select a Brand:
    <label for="factory"></label>

    <select name="make" id="factory">
        <option value="apple">Apple</option>
        <option value="samsung">Samsung</option>
    <select>
    <input type="submit" value="Go!">

</form>



</body>
</html>
<?php

include 'AppleFactory.php';
include 'SamsungFactory.php';

if (isset($_REQUEST["make"])) {
    $factory = null;
    switch ($_REQUEST["make"]) {
        case "apple":
            $factory = new AppleFactory();
            break;
        case "samsung":
            $factory = new SamsungFactory();
            break;
    }

    $phone = $factory->createPhone();
    $tablet = $factory->creatTablet();

    echo "Phone: " . '  ' . $phone->switchOn() . "</br>";
    echo "Phone: " . '  ' . $phone->ring() . "</br>";
    echo "Tablet: " . '  ' . $tablet->switchOn() . "</br>";
}
?>

