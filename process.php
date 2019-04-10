<?php

session_start();

$mysqli = new mysqli("localhost", "root", "", "abm") or die(mysqli_error($mysqli));

$Nombre = '';
$Usuario = '';
$Email = '';
$Imagen = '';
$Codigo = '';
$CodigoDisable = '';
$UsuarioDisable = '';
$update = false;
$id = 0;

if (isset($_POST['save'])){
    $Nombre = $_POST['Nombre'];
    $Usuario = $_POST['Usuario'];
    $Email = $_POST['Email'];
    $Imagen = $_POST['Imagen'];
    $Codigo = $_POST['Codigo'];

    $mysqli->query("INSERT INTO data (Nombre, Usuario, Email, URL, Codigo) VALUES ('$Nombre', '$Usuario', '$Email', '$Imagen', '$Codigo')") or die($mysqli->error);

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

if (isset($_GET['logdel'])){
    $id = $_GET['logdel'];
    echo $id;
    $mysqli->query("UPDATE data SET Mostrar='0' WHERE id=$id")
        or die($mysqli->error);

    $_SESSION['message'] = "Se borro al usuario logicamente!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
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
        $Codigo = $row['Codigo'];
        $UsuarioDisable = 'disabled';
        $CodigoDisable = 'disabled';
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $Nombre = $_POST['Nombre'];
    $Email = $_POST['Email'];
    $Imagen = $_POST['Imagen'];

    $mysqli->query("UPDATE data SET Nombre='$Nombre', Email='$Email', URL='$Imagen' WHERE id=$id")
        or die($mysqli->error);

    $_SESSION['message'] = "Se edito el usuario correctamente!";
    $_SESSION['msg_type'] = "success";

    header('location: index.php');
}
