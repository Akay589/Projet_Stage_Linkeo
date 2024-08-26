<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan du Matériel</title>
    <!-- Ajoutez les styles CSS ici -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        #scanner-container {
            width: 100%;
            height: 100%;
            max-height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #000; /* Fond noir pour mieux voir la caméra */
        }

        body {
                display: flex;
                height: 80vh;
                justify-content: center;
                align-items: center;

                background-size: cover;
            }
        video {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        /* Pour les petits écrans */
        @media (max-width: 768px) {
            #scanner-container {
                height: 300px; /* Hauteur réduite pour les petits écrans */
                width: 100%;
                max-height: 500px;
                display: flex;
                justify-content: space-evenly;
                align-items: center;
                background-color: #000;
            }
        }
    </style>
</head>
<body>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scanModal">
    Ouvrir le scanner
</button>

<!-- Modal -->
<div class="modal fade" id="scanModal" tabindex="-1" aria-labelledby="scanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down"> <!-- Responsive fullscreen pour les petits écrans -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scanModalLabel">Scanner du Matériel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Conteneur pour la caméra -->
                <div id="scanner-container"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Script QuaggaJS pour le scan de codes-barres -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modalElement = document.getElementById('scanModal');
        var scannerContainer = document.getElementById('scanner-container');

        modalElement.addEventListener('shown.bs.modal', function () {
            // Initialisation de QuaggaJS pour le scan
            Quagga.init({
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: scannerContainer, // Cible le conteneur où la caméra va apparaître
                },
                decoder: {
                    readers: ["code_128_reader"] // Type de code-barres à scanner (vous pouvez ajuster selon votre besoin)
                }
            }, function (err) {
                if (err) {
                    console.log(err);
                    return;
                }
                Quagga.start();
            });

            Quagga.onDetected(function(data) {
                // Code-barres détecté
                console.log(data.codeResult.code);
                // Vous pouvez ici envoyer les données à votre serveur ou traiter le code comme vous le souhaitez
                Quagga.stop(); // Arrête le scanner après avoir détecté un code
            });
        });

        modalElement.addEventListener('hidden.bs.modal', function () {
            Quagga.stop(); // Arrête le scanner quand le modal est fermé
        });
    });
</script>

</body>
</html>
