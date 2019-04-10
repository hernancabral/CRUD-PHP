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
    <title>Formulario</title>
</head>
<body>

<?php require_once "process.php" ?>

<div class="container">
    <div class="jumbotron" style="text-align:center">
        <h1>
            <?php 
                if ($update == true):
                ?>
                    Esta editando al usuario: <?= $Usuario;?>
                <?php else: ?>
                    Nuevo Registro
            <?php endif; ?>
        </h1>
    </div>
    <div class="row justify-content-center">
            <form action="process.php" method="post">
                <input type="hidden" name='id' value='<?php echo $id; ?>'>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="Nombre" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Ingresa el Nombre">
                </div>
                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" name="Usuario" class="form-control" value="<?php echo $Usuario; ?>" <?php echo $UsuarioDisable; ?> placeholder="Ingresa el Usuario">
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
                    <label>Codigo</Label>
                    <input type="text" name="Codigo" class="form-control" value="<?php echo $Codigo; ?>" <?php echo $CodigoDisable; ?> placeholder="Ingresa el Codigo">
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