<!-- FICHIER INDEX 
    page 1 : formulaire et message d'accueil
        entrer une date de depart
        entrer une date de fin
        entrer un auteur (Nom+Prénom)
        choisir le client
        valider
    page 2 :
    plusieurs dashboard dans cet ordre :
        un graphique de tous les evenement AFM
        un top 10 des IP ayant realisé le plus de requetes
        un top 10 des hôtes ayant le plus été appelés
        un top 10 des paths les plus appelés
        un top 10 des raison qui ont declanché une alerte
    Il y a possibilité de commenter chacun des graphiques ou tableau
    une fois que chaque graphique est commenté, validez.
    page 3 :
        vision de la version imprimable, une fois que le rapport est validé, vous pouvez l'imprimer.





        API utilisée :
-Elasticsearch-php
    -Highcharts

    -->

    <!doctype html>
<html class = "no-js" lang="fr">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="ckeditor/ckeditor.js"></script>

<?php
    if(!isset($_GET['generateur']) && (!isset($_GET['impression']))){
?>
<script>
$(function() {
    $( "#depart" ).datepicker({ dateFormat: "yy-mm-dd" });
})
$(function() {
    $( "#fin" ).datepicker({ dateFormat: "yy-mm-dd" });
});
</script>
<?php
    }else {
?>
        <!-- Libs -->
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script>
        // set time to local 

        Highcharts.setOptions({
          global: {
              useUTC: false
                    }	
        });
        </script>
<?php 
    }
?>

<link rel="stylesheet" href="zurb/css/normalize.css" media="screen"></link>
    <link rel="stylesheet" href="zurb/css/foundation.css" media="screen"></link>
    <link rel="stylesheet" href="zurb/css/app.css" media="screen"></link>
    <script src="zurb/js/vendor/modernizr.js"></script>
<link rel="stylesheet" href="zurb/css/print.css" media="print"></link>
    
    </head>

<body>
      
        <script src="zurb/js/foundation.min.js"></script>
        <script>
        $(document).foundation();
</script>

<div id ="header" class ="row">
        <div class ="large-12 columns">
<?php
        include('header.php');
?>
</div>
</div>
<div class ="row">

<?php
        //page d'accueil
        if(!isset($_GET['generateur']) && !isset($_GET['impression'])){
?>


<?php

include('generateur2.php');

echo "</div>";

        }else if(!isset($_GET['impression'])){

            //page du rapport a commenter
            include('rapport.php');
              
            echo "</div>";
        }else{
?>
          
<?php
            //version imprimable du rapport.
            include('traitement.php');
?>
<?php
        }

?>


<div id ="footer" class ="row">
        <div class="small-2 large-2 columns"></div>
        </div>
        </body>
        </html>

