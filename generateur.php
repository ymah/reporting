<div class ="large-4 columns">
     <form action="index.php?generateur" method="POST">
     <table border="0">    
     <tr>
     <td>Date de depart :</td>
     <td><input name="depart" type="text" id="depart" size="30"></td>
     </tr>
     <tr>
     <td>Date de fin :</td>
     <td><input name="fin" type="text" id="fin" size="30"></td>
     </tr>

     <TR>
     <TD>Auteur :</TD>
     <TD>
     <INPUT type=text name="auteur">
     </TD>
     </TR>


     <TR>
     <TD>Client :</TD>
     <TD>
     <SELECT name="client">
<?php
     $lines=file('listeClient.txt');

foreach ($lines as $lineNumber => $lineContent)
    {
        echo "<OPTION VALUE=\"$lineContent\">$lineContent</OPTION>";
    }
?>
     
</SELECT>
    </TD>
    </TR>
    

    <TR>
    <TD COLSPAN=2>
    <INPUT class="button" type="submit" value="Envoyer">
    </TD>
    </TR>
    </TABLE>
    </form>
    </div>
    <div class ="large-8 columns">
<?php 
    include('message.php');
?>
</div>