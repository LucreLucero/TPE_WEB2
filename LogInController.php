<?php 
require_once('./view/logInView.php');
require_once('./model/userModel.php');

class LogInController{
    private $view;
    // private $model;

    function __construct(){
        // $this->model = new LogInModel();
        $this->view = new LoginView();
    }
    
    public function checkLoggedIn(){
        session_start();//Crea una sesión en el servidor, si ya existe trae la existente.
        if(!isset($_SESSION['ID_USER'])){//si no está iniciada la sesion
            header('Location: '. LOGIN);
            die();//Luego de una redirección se suele llamar a la función
            //die() para forzar terminar la ejecución del script.
        }
    }
    public function Login(){
        $this->view->showLogin();
    }

    // public function iniciarSesion(){
    //     $password = $_POST['pass'];

    //     $usuario = $this->model->GetPass($_POST['user']);

    //     if (isset($usuario) && $usuario != null && password_verify($password, $usuario->password)){
    //         session_start();
    //         $_SESSION['user'] = $usuario->email;
    //         $_SESSION['userId'] = $usuario->id;
    //         header("Location: " . URL_GENDER);
    //     }else{
    //         header("Location: " . URL_LOGIN);
    //     }

    // }
    
    public function LogOut(){
        session_start();
        session_destroy();
        header("Location: " . URL_LOGIN);
    }

}