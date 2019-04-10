<?php

session_start();

$mysqli = new mysqli("localhost", "root", "", "abm") or die(mysqli_error($mysqli));

$Nombre = '';
$Usuario = '';
$Email = '';
$Imagen = '';
$update = false;
$id = 0;

if (isset($_POST['save'])){
    $Nombre = $_POST['Nombre'];
    $Usuario = $_POST['Usuario'];
    $Email = $_POST['Email'];
    $Imagen = $_POST['Imagen'];

    // insert into "tabla (columna1, col2) con los valores"
    $mysqli->query("INSERT INTO data (Nombre, Usuario, Email, URL) VALUES ('$Nombre', '$Usuario', '$Email', '$Imagen')") or die($mysqli->error);

    $_SESSION['message'] = "Se guardo correctamente!";
    $_SESSION['msg_type'] = 'success';

    header("location: index.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Se borro de la base de datos!";
    $_SESSION['msg_type'] = 'danger';

    header("location: index.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if (mysqli_num_rows($result)==1){
        $row = $result->fetch_array();
        $Nombre = $row['Nombre'];
        $Usuario = $row['Usuario'];
        $Email = $row['Email'];
        $Imagen = $row['URL'];
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $Nombre = $_POST['Nombre'];
    $Usuario = $_POST['Usuario'];
    $Email = $_POST['Email'];
    $Imagen = $_POST['Imagen'];

    $mysqli->query("UPDATE data SET Nombre='$Nombre', Usuario='$Usuario', Email='$Email', URL='$Imagen' WHERE id=$id")
        or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}
