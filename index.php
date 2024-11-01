<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Work Of Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    
    <div class="container">
    <h1 class="text-center mb-4 text-primary">Work Of Tracker</h1>
        <form class="card p-4" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Ism</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="arrived_at" class="form-label">Kelgan vaqti</label>
            <input type="datetime-local" name="arrived_at" class="form-control" id="arrived_at">
        </div>
        <div class="mb-3">
            <label for="leaved_at" class="form-label">Kelgan vaqti</label>
            <input type="datetime-local" name="leaved_at" class="form-control" id="leaved_at">
        </div>
        <button type="submit" class="btn btn-primary w-100">Yuborish</button>
    </form>
    </div>
    
    <?php
        $dsn = "mysql:host=127.0.0.1;dbname=work_of_tracker";

        $pdo = new PDO($dsn, "root", "");

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

        <div class="container mt-4">
           <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ismi</th>
                    <th scope="col">Kelgan vaqti</th>
                    <th scope="col">Ketgan vaqti</th>
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
        </div>
        


   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>