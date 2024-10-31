<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Work Of Tracker</title>
    <style>
        table,tr,td,th{
            border: solid black 2px;
        }
    </style>
</head>
<body>
<h1>Work Of Tracker</h1>
<form method="post">
    <label for="name">Ism</label>
    <input type="text" name="name" id="name"><br>
    <label for="arrived_at">Kelgan vaqti</label>
    <input type="datetime-local" name="arrived_at" id="arrived_at"><br>
    <label for="leaved_at">Ketgan vaqti</label>
    <input type="datetime-local" name="leaved_at" id="leaved_at"><br>
    <button>Yuborish</button>

    <?php
        $dsn = "mysql:host=127.0.0.1;dbname=work_of_tracker";

        $pdo = new PDO($dsn, "root", "1234");

        if (isset($_POST['name']) && isset($_POST['arrived_at']) && isset($_POST['leaved_at'])) {
            $name = $_POST["name"];
            $arrived_at = $_POST["arrived_at"];
            $leaved_at = $_POST["leaved_at"];

            $inset_query = "INSERT INTO daily (name,arrived_at,leaved_at) VALUES (:name, :arrived_at, :leaved_at)";

            $stmt = $pdo->prepare($inset_query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":arrived_at", $arrived_at);
            $stmt->bindParam(":leaved_at", $leaved_at);
            $stmt->execute();

        }

        $select_query = "SELECT * FROM daily";
        $stmt = $pdo->query($select_query);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>


    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Ismi</th>
            <th>Kelgan vaqti</th>
            <th>Ketgan vaqti</th>
        </tr>
        </thead>
        <tbody>
        <?php

            foreach ($records as $record) {
                echo "<tr>
                    <td>{$record['id']}</td>
                    <td>{$record['name']}</td>
                    <td>{$record['arrived_at']}</td>
                    <td>{$record['leaved_at']}</td>
                </tr>";
            }


        ?>

        </tbody>
    </table>



</form>
</body>
</html>