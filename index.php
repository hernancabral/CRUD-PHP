<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Glammit</title>
</head>
<body>
    <?php require_once "process.php" ?>

    <?php 
    
    if (isset($_SESSION['message'])): ?>

        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>

    <div class="container">
        <?php
            $mysqli = new mysqli('localhost', 'root', '', 'abm') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
            //pre_r($result);
            //pre_r($result->fetch_assoc());
            //pre_r($result->fetch_assoc());
        ?>
        <div class="jumbotron" style="text-align:center">
            <h1>Glamit ABM</h1>
        </div>
        <div class="row justify-content-center">
            <table class="table" style="text-align:center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Imagen</th>
                        <th colspan="3">Accion</th>
                    </tr>
                </thead>
            <?php
                while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Nombre'];?></td>
                    <td><?php echo $row['Usuario'];?></td>
                    <td><?php echo $row['Email'];?></td>
                    <td><img src="<?php echo $row['URL'];?>" class="img-thumbnail" style="height:60px;width:60px"></td>
                    <td>
                        <a href="form.php?edit=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a>
                        <a href="process.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Borrar BD</a>
                        <a href="process.php?edit=<?php echo $row['id'] ?>" class="btn btn-warning">Borrar Logicamente</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
            <div>
                <a href="form.php" class="btn btn-info">Nuevo Registro</a>
            </div>
        
        </div>

        <?php

            function pre_r($array) {
                echo "<pre>";
                print_r($array);
                echo "</pre>";
            };
        ?>

        
    </div>   
</body>
</html>