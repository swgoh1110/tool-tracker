<div class="scanner-container">
    <video id="preview"></video>
    <div id="scan-result"></div>
</div>

<script type="text/javascript" src="/path/to/instascan.min.js"></script>
<script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    
    scanner.addListener('scan', function (content) {
        document.getElementById('scan-result').textContent = 'Outil scanné avec ID: ' + content;

        // Envoi d'une requête AJAX pour mettre à jour le statut de l'outil
        fetch('/apps/tooltracker/updateStatus/' + content, {
            method: 'POST'
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Statut de l\'outil mis à jour avec succès !');
            } else {
                alert('Erreur lors de la mise à jour du statut de l\'outil.');
            }
        });
    });
    
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
</script>
