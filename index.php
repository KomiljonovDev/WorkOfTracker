<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Work Of Tracker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="text-danger text-center">Work Of Tracker</h1>
    <div class="row align-items-end my-3">
        <div class="col">
            <form method="post" class="row g-3 mt-3 align-items-end">
                <div class="col-auto">
                    <label for="name">Ismi</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="col-auto">
                    <label for="arrived_at">Kelgan vaqti</label>
                    <input type="datetime-local" name="arrived_at" class="form-control" id="arrived_at">
                </div>
                <div class="col-auto">
                    <label for="leaved_at">Ketgan vaqti</label>
                    <input type="datetime-local" name="leaved_at" class="form-control" id="leaved_at">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Yuborish</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    const REQUIRED_WORK_HOUR_DAILY = 8;

    $dsn = 'mysql:host=127.0.0.1;dbname=work_of_tracker';
    $pdo = new PDO($dsn, 'root', '1234');
    if (isset($_POST['name']) && isset($_POST['arrived_at']) && isset($_POST['leaved_at'])) {

        if (!empty($_POST['name']) && !empty($_POST['arrived_at']) && !empty($_POST['leaved_at'])) {
            $name = $_POST['name'];
            $arrived_at = new DateTime($_POST['arrived_at']);
            $leaved_at = new DateTime($_POST['leaved_at']);

            $diff = $arrived_at->diff($leaved_at);
            $hour = $diff->h;
            $minute = $diff->i;
            $second = $diff->s;
            $total = ((REQUIRED_WORK_HOUR_DAILY * 3600) - ($hour * 3600) + ($minute * 60));

            $query = "INSERT INTO daily (name,arrived_at,leaved_at, required_of) 
                        VALUES (:name, :arrived_at, :leaved_at, :required_of)";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':name', $name);
            $stmt->bindValue(':arrived_at', $arrived_at->format('Y-m-d H:i'));
            $stmt->bindValue(':leaved_at', $leaved_at->format('Y-m-d H:i'));
            $stmt->bindParam(':required_of', $total);
            $stmt->execute();
        }
    }

    $query = "SELECT * FROM daily";
    $stmt = $pdo->query($query);
    $records = $stmt->fetchAll();
    ?>
    <table class="table table-primary table-hover">
        <thead>
        <tr class="table-secondary">
            <th scope="col">#</th>
            <th scope="col">Ism</th>
            <th scope="col">Kelgan vaqti</th>
            <th scope="col">Ketgan vaqti</th>
            <th scope="col">Ishlash kerak</th>
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
                <td>" . gmdate('H:i',$record['required_of']) . "</td>
            </tr>";
        }

        ?>
        </tbody>
    </table>
</div>


</body>
</html>