<div class ="content">
<?php
     session_start();
include('getter.php');
echo '<div class="page-break"></div>';
$client = $_SESSION['client'];
?>

<?php    
//je genere les dashboard que je veux grace aux fonctions presentes dans hcgenerator.php

$lesGraph= array(
    "allEvent" => "AFM-EVENTS",
);

$lesPie=array(
    "ip" => "IP-TOP-10",
    "host" => "HOST-TOP-10",
);

$lesTab=array(
    "urlPath" => "URL-PATH",
    "afmExpl" => "AFM-EXPLENATION",
);

echo '<form action="index.php">
   <input class="button" type="submit" value="Remise à zero" />
   </form>';
echo '<form action="index.php?impression" method="post">';
generation($lesGraph,"graph");
generation($lesPie,"pie");
generation($lesTab,"array");
echo '<input class="button" type="submit" value="Valider le rapport" />';
echo '</form>';


?>
</div>