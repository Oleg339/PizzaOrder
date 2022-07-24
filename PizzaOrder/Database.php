<?php
$link = null;
class database
{
	public static function connect(): void
    {
		try
		{
			global $link;
			$link = mysqli_connect("localhost", "root", "root", "pizzaorder");
		}
		catch(mysqli_sql_exception)
		{
			database::CreateDatabase();
		}
	}

    public static function OutputPrices($value, $name)
    {
        $mysqli = new mysqli("localhost","root","root","pizzaorder");
        $value = $mysqli->real_escape_string($value);
        $name = $mysqli->real_escape_string($name);
        $sql = "SELECT `price` FROM `$value` WHERE `name` = '$name'";
        global $link;
        $result = $mysqli->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


	public static function OutputValues($value): array
    {
		$sql = "SELECT * FROM $value";
		global $link;
		$result = mysqli_query($link, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

	public static function CreateDatabase(): void
    {
		$link = mysqli_connect("localhost", "root", "root");
		$sql = "CREATE DATABASE pizzaorder";

		if (!mysqli_query($link, $sql))
		{
		    echo 'Ошибка при создании базы данных: ' . mysqli_error() . "\n";
		}

		global $link;
		$link = mysqli_connect("localhost", "root", "root", "pizzaorder");

		$sql_arr = array("CREATE TABLE IF NOT EXISTS sauce (
		name VARCHAR(20) PRIMARY KEY,
		price DOUBLE)",
		"CREATE TABLE IF NOT EXISTS type (
		name VARCHAR(20) PRIMARY KEY,
		price DOUBLE)",
		"CREATE TABLE IF NOT EXISTS size (
		name INT PRIMARY KEY,
		price DOUBLE
		)",
	    "INSERT INTO sauce (name, price)
		VALUES ('Cheese', 0.99),
		('Sweet-and-sour', 1.09),
		('Garlic', 0.89),
		('BBQ', 1.19)",
		"INSERT INTO type (name, price)
		VALUES ('Pepperoni', 14),
		('Country', 10),
		('Hawaiian', 12),
		('Mushroom', 12)",
		"INSERT INTO size (name, price)
		VALUES (21, 1),
		(26, 1.3),
		(31, 1.4),
		(45, 1.8)");

		foreach ($sql_arr as $sql)
            mysqli_query($link, $sql);
	}
}
