<?php
session_start();
require 'vendor/autoload.php';
include('jsonfun.php');
include('json.php');

/*
  l'api elasticsearch-php est chargée
*/



//definition de l'hote pour la connexion, ici c'est baxter.runiso.com:9200
$connexion['hosts'] = array( 
    'baxter.runiso.com:9200'
);

//on crée le client elasticsearch-php
$client_es = new Elasticsearch\Client($connexion);



/**
 * createFile : take data from a c.
 *
 * @param string $data Json data for pie creating.
 * @param string title of the pie
 */


function createFile($json,$cli,$output) 
{
    

    $query['body'] = json_decode($json); //on recupere le array issu des requetes json presentes dans json.php    
    $res = json_encode($cli->search($query)); // on recupere le resultat sous forme d'un json encodé grace à json_encode et obtenu grace à une recherche issu d'elasticsearch-php
    if(!file_put_contents($output,indent($res)))//on enregistre le resultat dans le fichier de sortie
        echo 'error write in '.$output.'<br/>';
 
}



//recupération des données.


createFile($allJson ,$client_es,'Json/allEvent.json' );
createFile($ipJson ,$client_es,'Json/ip.json' );
createFile($afmExplJson ,$client_es, 'Json/afmExpl.json');
createFile($urlPathJson,$client_es, 'Json/urlPath.json');
createFile($hostJson ,$client_es, 'Json/host.json');

//on passe ensuite à rapport.php