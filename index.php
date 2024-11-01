<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Work Of Tracker</title>
    <style>
        table, tr, td, th {
            border: solid black 2px;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="text-danger text-center">Work Of Tracker</h1>
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Ism</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" required>
        </div>
        <div class="mb-3">
            <label for="arrived_at" class="form-label">Kelgan vaqt</label>
            <input type="datetime-local" class="form-control" id="arrived_at" name="arrived_at">
        </div>
        <div class="mb-3">
            <label for="leaved_at" class="form-label">Ketgan vaqt</label>
            <input type="datetime-local" class="form-control" id="leaved_at" name="leaved_at">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php

    $dsn = 'mysql:host=127.0.0.1;dbname=work_of_tracker';
    $pdo = new PDO($dsn, 'root', '1234');
    if (isset($_POST['name']) && isset($_POST['arrived_at']) && isset($_POST['leaved_at'])) {
        $name = $_POST['name'];
        $arrived_at = $_POST['arrived_at'];
        $leaved_at = $_POST['leaved_at'];

        $query = "INSERT INTO daily (name,arrived_at,leaved_at) 
                    VALUES (:name, :arrived_at, :leaved_at)";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':arrived_at', $arrived_at);
        $stmt->bindParam(':leaved_at', $leaved_at);
        $stmt->execute();
    }
    $query = "SELECT * FROM daily";
    $stmt = $pdo->query($query);
    $records = $stmt->fetchAll();
    ?>

</div>


<div class="container">
    <table class="table table-primary">
        <thead>
        <tr class="table-secondary">
            <th scope="col">#</th>
            <th scope="col">Ism</th>
            <th scope="col">Kelgan vaqti</th>
            <th scope="col">Ketgan vaqti</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($records as $record) {
            echo "<tr>
                <th scope='row'>{$record['id']}</th>
                <td>{$record['name']}</td>
                <td>{$record['arrived_at']}</td>
                <td>{$record['leaved_at']}</td>
            </tr>";
        }

        ?>


        </tbody>
    </table>
</div>


</body>
</html>