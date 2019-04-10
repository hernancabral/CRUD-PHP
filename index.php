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

        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Imagen</th>
                        <th colspan="4">Accion</th>
                    </tr>
                </thead>
            <?php
                while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Nombre'];?></td>
                    <td><?php echo $row['Usuario'];?></td>
                    <td><?php echo $row['Email'];?></td>
                    <td><?php echo $row['URL'];?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id'] ?>" class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        
        </div>

        <?php

            function pre_r($array) {
                echo "<pre>";
                print_r($array);
                echo "</pre>";
            };
        ?>

        <div class="row justify-content-center">
            <form action="process.php" method="post">
                <input type="hidden" name='id' value='<?php echo $id; ?>'>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="Nombre" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Ingresa el Nombre">
                </div>
                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" name="Usuario" class="form-control" value="<?php echo $Usuario; ?>" placeholder="Ingresa el Usuario">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="Email" class="form-control" value="<?php echo $Email; ?>" placeholder="Ingresa el Email">
                </div>
                <div class="form-group">
                    <label>Imagen</Label>
                    <input type="text" name="Imagen" class="form-control" value="<?php echo $Imagen; ?>" placeholder="Ingresa la URL">
                </div>
                <div class="form-group">
                    <?php 
                    if ($update == true):
                    ?>
                        <button type="submit" name="update" class="btn btn-info">Editar</button>
                    <?php else: ?>
                    
                    <button type="submit" name="save" class="btn btn-primary">Guardar</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>   
</body>
</html>