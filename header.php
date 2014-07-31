<br/>
<img src="logo/runiso.jpg" width="25%";/>
<br/><br/>
<hr>
<br/><br/>
<?php
if(isset($_GET['generateur']) || isset($_GET['impression'])){
    session_start();
?>
    <div class="row">
    <div class="large-12 columns">
    <h1 style="text-align:center" class="subheader">
<?php echo $_SESSION['objet'] ?>
    </h1>

          </div>
    </div>
    <br/><br/>
    <br/><br/>

    <div class="large-12 columns">
    <table width="100%">
    <thead>
    <tr>
    <th>Informations générales</th>
    <th></th>

    </tr>

    </thead>
    <tbody>
    <tr>
    <td>Objet du document</td>
    <td><?php echo $_SESSION['objet'];?></td>
    </tr>
    <tr>
    <td>Référence</td>
    <td><?php echo $_SESSION['reference'];?></td>
    </tr>
    <tr>
    <td>Version</td>
    <td><?php echo $_SESSION['version'];?></td>
    </tr>
    <td>Propriétaire</td>
    <td><?php echo $_SESSION['proprietaire'];?></td>
    </tr>
    <td>Rédigé par</td>
    <td><?php echo $_SESSION['redacteur'];?></td>
    </tr>
    <td>Relecture par</td>
    <td><?php echo $_SESSION['relecteur'];?></td>
    </tr>
    <td>Validé par</td>
    <td><?php echo $_SESSION['validateur'];?></td>
    </tr>
    </tbody>
    </table>
    </div>
    <div class="large-12 columns">
    <table width="100%">
    <thead>
    <tr>
    <th>Informations du document</th>
    <th></th>
    </tr>
    </thead>

    <tbody>
    <tr>
    <td>Classification</td>
    <td><?php echo $_SESSION['classification'];?></td>
    </tr>
    <tr>
    <td>Date de debut </td>
    <td>
<?php 
    echo date("d-m-Y",strtotime($_SESSION['depart']));
?>
</td>
    </tr>
<tr>
<td>Date de fin</td>
<td>
<?php 
    echo date("d-m-Y",strtotime($_SESSION['fin']));
?>
</td>
</tr>
<tr>
<td>Client</td>
<td><?php echo $_SESSION['client'];?></td>
</tr>

</tbody>
</table>
</div>
<hr>

<?php
include('menu.php');
     }
?>
<hr>