<div class="large-12 columns">
<form action="index.php?generateur" method="POST">
<div class="row">
<fieldset>
<legend>Informations générales</legend>
<div class="large-12 columns">
<label>Objet du document
     <input name ="objet" type="text"  />
</label>
</div>
<div class="large-12 columns">
<label>Référence
     <input name ="reference" type="text"  />
</label>
</div>
<div class="large-12 columns">
<label>Version
     <input name ="version" type="text" />
</label>

</div>
<hr>
<div class="large-12 columns">
<label>Propriétaire
     <input name ="proprietaire" type="text" />
</label>
</div>
<div class="large-12 columns">
<label>Rédigé par 
     <input name ="redacteur" type="text" />
</label>
</div>
<div class="large-12 columns">
<label>Relecture par 
     <input name ="relecteur" type="text" />
</label>
</div>
<div class="large-12 columns">
<label>Validé par 
     <input name ="validateur" type="text" />
</label>
</div>

</fieldset>
<hr>
<fieldset>
<legend>Informations du document</legend>
<div class="large-12 columns">
<label>Classification
<select name="classification">
<option value="Externe">Externe</option>
<option value="Diffusion Interne">Diffusion Interne</option>
<option value="Confidentiel">Confidentiel</option>
</select>
</label>
</div>
<div class="large-12 columns">
<label>Date de debut
<input name="depart" type="text" id="depart"/>
</label>
</div>
<div class="large-12 columns">
<label>Date de fin
<input name="fin" type="text" id="fin"/>
</label>
</div>
<div class="large-12 columns">
<label>Client
<SELECT name="client">
     <OPTION VALUE="orange">orange</OPTION>
     <OPTION VALUE="skoda">skoda</OPTION>
     <OPTION value="runiso">runiso</option>
     
</SELECT>
</div>
</fieldset>
</div>
<div class="large-12 columns">
<INPUT class="button" type="submit" value="Envoyer">
</div>
</div>