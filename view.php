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
<body class="">
<div class="container">
    <h1 class="text-primary text-center">Work Of Tracker</h1>
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
        global $records;
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