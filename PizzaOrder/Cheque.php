<?php

    include 'Database.php';

    function Out($value, $name){
        $data = database::OutputPrices($value, $name);
        if($data == null)
        {
            echo "<script>self.location='http://pizzaorder/Error.php';</script>";
            return "Error";
        }
        else
        {
            return $data[0]['price'];
        }
    }

    function HTMLOut()
    {
        $value = "Type";
        $a = Out("$value", $_GET[$value]);
        echo "<br>$value: $_GET[$value] | Price: $a$";
        $b = Out("size", $_GET["Size"]);
        echo "<br>Size: ". $_GET['Size']."sm | Multiplier: ".$b."x";
        $value = "Sauce";
        $c = Out("$value", $_GET[$value]);
        echo "<br>$value: $_GET[$value] | Price: $c$";
        echo "<h5><br>Total: ".$a*$b+$c."$<h5>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Cheque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/lib/bootstrap/dist/css/bootstrap.css" />
</head>
<body>
<nav class="navbar navbar-light bg-light">
</nav>
<div class="panel-body">
    <div class = "text-center">
        <h3><br>Your Order</h3>
        <?php HTMLOut(); ?>
    </div>
</div>
</body>
</html>
