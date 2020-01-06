<?php
    require 'ConexionDB.php';

    $message='';

    if(!empty($_POST['email']) && !empty($_POST['password'])){

        $Mysql = "INSERT INTO Usuarios (nombre,apellidos,user,email,password,cel,birthday) 
        VALUES (:nombre, :apellidos, :user, :email, :password, :cel, :birthday)";
        #Mando la consulta
        $stmt = $conn->prepare($Mysql);
        $stmt->bindParam(':nombre',$_POST['nombre']);
        $stmt->bindParam(':apellidos',$_POST['apellidos']);
        $stmt->bindParam(':user',$_POST['user']);
        $stmt->bindParam(':email', $_POST['email']);
        #Encifrar la contraseña
        $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
        $stmt->bindParam(':password',$password);
        $stmt->bindParam(':cel',$_POST['cel']);
        $stmt->bindParam(':birthday',$_POST['birthday']);

        if ($stmt->execute()) {
            $message = 'Successfully created new user';
        } else {
            $message = 'Sorry, Could not create user';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../Css/footer.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/Register.css" media="all" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="shortcut icon" href="Imagenes/navegador.png" type="image/png">

</head>

<body>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

    

    <div class="Cuerpo">
        <div class="SliderImg">

        </div>
        <div class="Registro">
            <?php if(!empty($message)): ?>
                <p> <?= $message ?></p>
            <?php endif; ?>

            <form action="Register.php" action="" method="POST" class="needs-validation" novalidate>
                <div class="DatosUsuario">
                    <img class="ImgUsuario " src="Imagenes/Usuario.png" alt="Icono Usuario">
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="nombre" type="text" value="" required>
                            <div class="valid-feedback"> Correct </div>
                        </div>
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="colFormLabel" name="apellidos">
                        </div>
                    </div>
                </div>
                <div class="DatosGen">
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">User</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="colFormLabel" name="user">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="colFormLabel" placeholder="example@email.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label" >Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Cel</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="colFormLabel" name="cel">
                        </div>
                    </div>
                    <div class="FechaNac">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">Birthday</label>
                        <input class="form-control" id="colFormLabel" placeholder="Day" name="birthday">
                        <select id="select" class="form-control" name="buscames">
                            <option value="0">Enero</option>
                            <option value="1">Febrero</option>
                            <option value="2">Marzo</option>
                            <option value="3">Abril</option>
                            <option value="4">Mayo</option>
                            <option value="5">Junio</option>
                            <option value="6">Julio</option>
                            <option value="7">Agosto</option>
                            <option value="8">Septiembre</option>
                            <option value="9">Octubre</option>
                            <option value="10">Noviembre</option>
                            <option value="11">Diciembre</option>
                        </select>
                        <input class="form-control" id="colFormLabel" placeholder="Year" name="year">
                    </div>
                </div>
                <div class="LoginRegis">
                    <a href="Login.php" class="btn btn-outline-primary">Login</a>
                    <input class="btn btn-outline-success" type="submit" value="Register"></input>
                </div>
            </form>
        </div>
    </div>
</body>

<footer>
    <div class="contenedor">
        <p class="copy" style="font-size:small">&emsp;&emsp;&emsp;&emsp;Copyright &copy; 2019,
            Login, Introducción al Desarrollo de Páginas Web </p>
    </div>
</footer>

</html>