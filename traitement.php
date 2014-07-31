<div class ="show-for-print" style="">
<?php
session_start();
include('getter.php');

$client = $_SESSION['client'];
$auteur = $_SESSION['redateur'];

echo '<div class="page-break"></div>';

?>

<?php    
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

echo '<div>';
generationPDF($lesGraph,"graph");
generationPDF($lesPie,"pie");
generationPDF($lesTab,"array");
echo '</div>';
?>
<form class ="hide-for-print"><input type="button" class="button" value=" Imprimer le rapport " onclick="window.print();return false;" /></form> 
</div>
<form  class="hide-for-print" action="index.php">
   <input class="button" type="submit" value="Remise à zero" />
   </form>
