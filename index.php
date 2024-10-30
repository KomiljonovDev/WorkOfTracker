<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Work Of Tracker</title>
</head>
<body>
<form method="GET">
    <input type="datetime-local" name="arrived_at"><br>
    <input type="datetime-local" name="leaved_at">
    <button>Yuborish</button>
</form>
<?php

$dns = "mysql:host=127.0.0.1;dbname=work_of_tracker";

$username = "root";
$password = "1234";

$pdo = new PDO($dns, $username, $password);

define('WORK_TIME', 8);
if (isset($_GET['arrived_at']) and isset($_GET['leaved_at'])) {
    $arrived_at = $_GET['arrived_at'];
    $leaved_at = $_GET['leaved_at'];
    $query = "INSERT INTO work_times (arrived_at, leaved_at) VALUES(:arrived_at, :leaved_at)";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':leaved_at', $leaved_at);
    $stmt->bindParam(':arrived_at', $arrived_at);

    $stmt->execute();

    echo "
        <h1>Arrived at " . $_GET['arrived_at'] . "</h1>
        <h1>Leaved at {$_GET['leaved_at']}</h1>
        <h1>Leaved at " . WORK_TIME . "</h1>";
}
?>
</body>
</html>


<?php


//    $fruits = ['Apple', 'Banana', 'Orange'];
//
//
//    $arr = ['arrived_at' => '2020-01-01 00:00:00',];
//
//
//    $person = [
//            'John Doe',
//            'age'=>30,
//            'education'=>[
//                    "Najot Ta'lim",
//                'ITPU',
//                'TATU'
//            ]
//    ];
//
//
//    echo $person['education'][0];
//    echo $person[0];
