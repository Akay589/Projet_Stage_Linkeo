<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ url('css/ajoutmat.css') }}">
    <title>Liste matériel</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>


</head>
<body>



       <div class="wrapper" id="content">


                <div class="log_title">
                    <span>Listes</span>
                </div>
                <div class="linkeo_logo">
                    <img src="images/logo.png" alt="" />
                </div>
                <div class="menus">


                            <div class="row button">

                                <a class="btn btn-primary" href="{{ route('liste_machine') }}">Liste des machines</a>

                            </div>
                            <div class="row button">

                                 <a class="btn btn-primary" href="{{ route('liste_casques') }}">Liste des casques</a>

                            </div>
                            <div class="row button">

                                <a class="btn btn-primary" href="{{ route('liste_souris') }}">Liste des souris</a>

                            </div>
                            <div class="row button">

                                <a class="btn btn-primary" href="{{ route('liste_onduleurs') }}">Liste des onduleurs</a>

                            </div>
                            <div class="row button">

                                <a class="btn btn-primary" href="{{ route('liste_tv') }}">Liste des Smart TV</a>

                            </div>
                            <div class="row button">

                                <a class="btn btn-primary" href="{{ route('liste_phones') }}">Liste des Postes téléphonique</a>

                            </div>
                            <div class="row button">

                                <a class="btn btn-primary" href="{{ route('liste_projecteurs') }}">Liste des vidéoprojecteurs</a>

                            </div>
                            <div class="row button">

                                <a class="btn btn-primary" href="{{ route('liste_servers') }}">Liste des Serveurs</a>

                            </div>
                            <div class="row button">

                                <a class="btn btn-primary" href="{{ route('liste_imprimantes') }}">Liste des Imprimantes</a>

                            </div>
                            <div class="row button">

                                <a class="btn btn-primary" href="{{ route('liste_hautparleurs') }}">Liste des Haut Parleurs</a>

                            </div>
                            <div class="row button">

                                <a class="btn btn-primary" href="{{ route('liste_ecrans') }}">Liste des ecrans</a>

                            </div>

                            <div class="row button">

                                <a class="btn btn-primary" href="{{ route('liste_dominos') }}">Liste des Clés & Domino</a>

                            </div>
                            <div class="row button">

                                <a class="btn btn-primary" href="{{ route('liste_cameras') }}">Liste des caméras</a>

                            </div>



                </div>
                <div class="logout">
                    <a class="logout_icon" href="{{ route('/home') }}"><i class="fa-solid fa-hand-point-left"></i></a>
                </div>
       </div>





</body>
</html>
