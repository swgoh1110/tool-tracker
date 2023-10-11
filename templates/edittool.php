<form action="/path/to/update/route" method="post">
	<input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']) ?>" />
    <input type="hidden" name="id" value="<?php echo $_['tool']['id']; ?>">
    
    <label for="name">Nom de l'outil:</label>
    <input type="text" id="name" name="name" value="<?php echo $_['tool']['name']; ?>" required>
    
    <label for="description">Description:</label>
    <textarea id="description" name="description"><?php echo $_['tool']['description']; ?></textarea>
	
	<img src="<?php echo $this->toolService->generateQRCode($_['tool']['id']); ?>" alt="QR Code">
    
    <input type="submit" value="Mettre à jour">
</form>
