<form action="/path/to/save/route" method="post">
	<input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']) ?>" />
    <label for="name">Nom de l'outil:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea>
    
    <input type="submit" value="Ajouter">
</form>
