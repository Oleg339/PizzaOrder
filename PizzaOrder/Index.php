<?php
include 'Database.php';
	database::connect();
?>
<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>PizzaOrder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css" />
    <link rel="stylesheet" href="/styles/bootstrap-5.2.0-dist/css/bootstrap.css" />
    <style>
    </style>
</head>
<body>
    <div class="panel panel-success">
        <div class="panel-heading text-center p-3 border bg-light"><h4>Make your order!</h4></div>
        <div class="panel-body">
            <form class="p-a-1" action="Cheque.php">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-5 offset-md p-5">
                            <div class="p-1">
                                <label>Choose the pizza type</label>
                                <select class="form-control" name="Type">
                                    <?php foreach(database::OutputValues('type') as $value)
                                        print("<option value=" . $value['name'] . ">" . $value['name'] ." ". $value['price'] . "$</option>");?>
                                </select>
                            </div>
                            <div class="p-1">
                                <label>Choose the size</label>
                                <select class="form-control" name="Size">
                                    <?php foreach(database::OutputValues('size') as $value)
                                        print("<option value=" . $value['name'] . ">" . $value['name'] . " sm (Price multiplier: " . $value['price'] . "x)</option>");?>
                                </select>
                            </div>
                            <div class="p-1">
                                <label>Choose the sauce</label>
                                <select class="form-control" name="Sauce">
                                    <?php foreach(database::OutputValues('sauce') as $value)
                                    print("<option value=" . $value['name'] . ">" . $value['name'] ." ".$value['price']."$</option>");?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class ="p-3">
                    <div class="text-center">
                    <button class="btn btn-warning" type="submit">
                        Welcome
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
