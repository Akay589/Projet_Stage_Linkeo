<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--style Css-->
         <link rel="stylesheet" href="{{ url('css/showmat.css') }}">
    <!--Bootstrap-->

    <!--Fontawesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!--Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>Ajout</title>
</head>
<body>
      <div class="container">
             <div class="form-title">
                   <span>Détails Matériels</span>
             </div>

                 <div class="main-material-info">
                    <div class="material-input-box">
                         <p id="designation"> <span>Désignation : </span> {{ $machines->designation}} </p>

                    </div>
                    <div class="material-input-box">
                        <p id="num_serie"> <span> Numéro de série :</span> {{ $machines->num_serie}} </p>

                    </div>
                    <div class="material-input-box">
                        <p id="date_achat"> <span>date d'achat :</span>  {{ $machines->date_achat}} </p>

                    </div>
                    <div class="material-input-box">
                        <p id="etat"> <span>etat :</span>  {{ $machines->etat}}</p>

                    </div>
                    <div class="material-input-box">
                        <p id="user"> <span>Usager :</span>  {{ $machines->user}} </p>

                    </div>
                    <div class="material-input-box">
                        <p id="etiquette">  <span>Etiquette :</span> {{ $machines->etiquette}} </p>

                    </div>
                    <div class="material-input-box">
                        <p id="remarque"> <span>Remarque :</span> {{ $machines->remarque}} </p>

                    </div>
                    <div class="material-input-box">
                        <p id="status"> <span> Status:</span> {{ $machines->status}} </p>

                    </div>
                 </div>
                 <br>

            <div class="back">
                <a class="btn_back" href="{{ route('liste_material') }}">Retour</a>
                <a class="btn_edit" href="{{ route('edit_material', $machines->id) }}">Modifier</a>
            </div>

      </div>
</body>
</html>
