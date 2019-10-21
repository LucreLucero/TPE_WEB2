<?php

require_once ('./controller/GenderController.php');
require_once ('./controller/LogInController.php');
require_once ('./controller/SerieController.php');

// la url siempre la vamos a tomar con un get action
$action = $_GET['action'];
define ("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
// define ("URL_GENDER", 'http://'.SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/gender');
// define("URL_LOGIN",'http://'.SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER['PHP_SELF']).'/login');
// define("URL_LOGOUT",'http://'.SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER['PHP_SELF']).'/logout');  

// si el action es nulo se muestra el index por defectos
$controller = new GenderController();

if ($action == ''){
    echo ($action);
    $controller ->getGenders();
}else{
    if(isset($action)){
        $url = explode ("/", $action);

        if ($url[0] == "gender"){
            $controller-> getGenders();
        }else if($url[0] == "insert"){
            $controller -> addGender();
        // }else if ($url[0] == "end"){
        //     $controller -> endGender($url[1]);
        }else if ($url[0] == "delete"){
            $controller-> deleteGender($url[1]);
        }else if ($url[0] == "login"){
            $controllerUser = new LogInController();
            $controllerUser -> LogIn();
        }else if ($url[0]== "iniciarSesion"){
            $controllerUser = new LogInController();
            $controllerUser -> checkLoggedIn();
        }else if ($url[0]== "logOut"){
            $controllerUser = new LogInController();
            $controllerUser -> LogOut();
        }
    }
}