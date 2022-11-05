<?php
$connexion = mysqli_connect("localhost", "root", "", "tafa3.0") or
    die("erreur de connexion");

    if (isset($_POST['add'])) {
        if (empty($_POST['task'])) {
            $error = "votre tâche est vide";
        } else {
            $task = $_POST['task'];
            $sql_insert = "INSERT INTO todo(tasks) VALUES('$task')";
            $query = mysqli_query($connexion, $sql_insert);
    
            if ($query) {
                $message = "tache ajouté";
            }
        }
    }

$sql_select = "SELECT * FROM todo";
$query = mysqli_query($connexion, $sql_select);
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>TO DO LIST APP</h1>

        <?php if(isset($message)) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $message ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>

        <?php if(isset($error)) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $error ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
        <form action="" method="POST">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="task">
                <input class="btn btn-success" name="add" type="submit" id="button-addon2" value="ajouter">
            </div>

        </form>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tâches</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $value) : ?>
                    <tr>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['tasks'] ?></td>
                        <td><button class="btn btn-danger"><a href="delete.php?id=<?= $value['id'] ?>" class="text-decoration-none text-white">supprimer</a></button></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>