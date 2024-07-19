<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ url('css/home.css') }}">
    <title>home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>


</head>
<body>



       <div class="wrapper" id="content">


                <div class="log_title">
                    <span>Suivi Matériel</span>
                </div>
                <div class="linkeo_logo">
                    <img src="images/logo.png" alt="" />
                </div>
                <div class="menus">

                        <div class="row button">

                            <a class="btn btn-primary" href="{{ route('add_material') }}">Nouveau matériel</a>

                        </div>
                        <div class="row button">

                            <button class="btn btn-primary" id="start-scan">Faire un scan</button>
                            <div id="scanModal" class="modal">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <h2>Scanner QR Code</h2>
                                    <!-- Div pour afficher la caméra -->
                                    <video id="preview" width="100%"></video>
                                </div>
                            </div>

                        </div>
                        <div class="row button">

                            <a class="btn btn-primary" href="{{ route('liste') }}">Liste des matériels</a>

                        </div>


                </div>
                <div class="logout">
                    <a class="logout_icon" href="{{ route('logout_admin') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
                </div>
       </div>

       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

       <script>
        document.getElementById('start-scan').addEventListener('click', function() {
            Swal.fire({
                title: 'Scanner QR Code',
                titleColor : '#292b2c',
                html: '<div id="qr-reader" style="width: 100%;"></div>',
                showCancelButton: true,
                cancelButtonColor : '#2073bd',
                showConfirmButton: false,
                cancelButtonText: "Annuler",
                width: '90%',
                didOpen: () => {
                    const html5QrCode = new Html5Qrcode("qr-reader");
                    html5QrCode.start(
                        { facingMode: "environment" },
                        {
                            fps: 10,
                            qrbox: function(viewfinderWidth, viewfinderHeight) {
                                // Adjust the QR code box size dynamically based on the viewfinder size
                                var minDimension = Math.min(viewfinderWidth, viewfinderHeight);
                                var qrboxSize = Math.floor(minDimension * 0.7);
                                return { width: qrboxSize, height: qrboxSize };
                            }
                        },
                        (decodedText, decodedResult) => {
                            // Rediriger vers l'URL scannée
                            window.location.href = decodedText;
                        },
                        (errorMessage) => {
                            console.log(errorMessage);
                        }
                    ).catch((err) => {
                        console.log(err);
                    });

                    // Arrêter le scan quand le modal est fermé
                    Swal.getPopup().addEventListener('close', () => {
                        html5QrCode.stop().then((ignore) => {
                            html5QrCode.clear();
                        }).catch((err) => {
                            console.log(err);
                        });
                    });
                },
                willClose: () => {
                    // Nettoyer le lecteur QR
                    Html5Qrcode.getCameras().then(cameras => {
                        if (cameras && cameras.length) {
                            const html5QrCode = new Html5Qrcode("qr-reader");
                            html5QrCode.stop().then(() => {
                                html5QrCode.clear();
                            }).catch((err) => {
                                console.log(err);
                            });
                        }
                    });
                }
            });
        });
        </script>

</body>
</html>
