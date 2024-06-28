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

                        </div>
                        <div class="row button">

                            <a class="btn btn-primary" href="{{ route('liste_material') }}">Liste des matériels</a>

                        </div>
                </div>
       </div>
       <div id="reader"></div>
       <script>
        document.getElementById('start-scan').addEventListener('click', function() {
            const reader = document.getElementById('reader');
            reader.style.display = 'block';
            const html5QrCode = new Html5Qrcode("reader");
            html5QrCode.start(
                { facingMode: "environment" },
                {
                    fps: 10,
                    qrbox: 250
                },
                (decodedText, decodedResult) => {
                    window.location.href = decodedText;
                },
                (errorMessage) => {
                    console.log(errorMessage);
                }
            ).catch((err) => {
                console.log(err);
            });
        });
    </script>
</body>
</html>
