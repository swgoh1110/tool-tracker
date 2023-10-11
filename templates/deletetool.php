<h2>Êtes-vous sûr de vouloir supprimer cet outil ?</h2>
<p>Nom de l'outil : <?php echo $_['tool']['name']; ?></p>
<p>Description : <?php echo $_['tool']['description']; ?></p>

<form action="/path/to/delete/route" method="post">
	<input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']) ?>" />
    <input type="hidden" name="id" value="<?php echo $_['tool']['id']; ?>">
    <input type="submit" value="Confirmer la suppression">
    <a href="/path/to/tools/list">Annuler</a>
</form>
