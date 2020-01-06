<?php
include_once 'ValidarUser.php';
include_once 'CrearSesion.php';

$Session = new Session();
$user = new User();
if(isset($_SESSION['user'])){
    echo "hay sesion";

}else if(isset($_POST['user']) && isset($_POST['password'])){
    echo "Existe el usuario";   

    $userSess = $_POST['user'];
    $passSess = $_POST['password'];
    #Verificar si existe

    if($user->userExists($userSess, $passSess)){
        echo "Usuario Validado";
    }else{
        echo "Nombre ";
    }

}else{
    include_once 'Login.php';
}
?>
