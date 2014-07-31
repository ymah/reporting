<?php


if(isset($_GET['generateur'])){
    session_start();
    $_SESSION= $_POST;
$client = $_SESSION['client'];
$dep = $_SESSION['depart'];
$fin = $_SESSION['fin'];



//enregistrement des données : 

    
    include('json.php');

    include('hcgenerator.php');

    include('client.php');

}else if (isset($_GET['impression'])) {
    session_start();
    $_SESSION = $_POST;



    
    include('hcgenerator.php');



}else{
    echo "error all";

}