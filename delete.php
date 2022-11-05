<?php
$connexion = mysqli_connect("localhost", "root", "", "tafa3.0") or
die("erreur de connexion");  

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM todo WHERE id = $id";
    $query = mysqli_query($connexion, $sql);

   header('location:index.php');
}

?>