<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--style Css-->
         <link rel="stylesheet" href="{{ url('css/ajoutmat.css') }}">
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
                    <span>Ajout Matériel</span>
             </div>
             @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}Matériel
                </div>
             @endif
             <form action="{{ route('machine_add') }}" method="POST" enctype="multipart/form-data">
              @csrf
                 <div class="main-material-info">
                    <div class="material-input-box">
                         <label for="designation">Designation : </label>
                         <input type="text" name="designation" id="designation" placeholder="Désignation du matériel">
                    </div>
                    <div class="material-input-box">
                        <label for="num_serie">Numéro de série :</label>
                        <input type="text" name="num_serie" id="num_serie" placeholder="Numéro de série">
                    </div>
                    <div class="material-input-box">
                        <label for="date_achat">date d'achat :</label>
                        <input type="text" name="date_achat" id="date_achat" placeholder="Date d'achat">
                    </div>
                    <div class="material-input-box">
                        <label for="etat">etat :</label>
                         <select name="etat" id="etat">
                               <option value="OK-Service">OK-Service</option>
                               <option value="OK-Stock">OK-Stock</option>
                               <option value="HS">HS</option>
                         </select>

                    </div>
                    <div class="material-input-box">
                        <label for="user">Usager :</label>
                        <input type="text" name="user" id="user" placeholder="Propriétaire du matériel">
                    </div>
                    <div class="material-input-box">
                        <label for="etiquette">Etiquette :</label>
                        <input type="text" name="etiquette" id="etiquette" placeholder="Etiquette">
                    </div>
                    <div class="material-input-box">
                        <label for="remarque">Remarque :</label>
                        <input type="text" name="remarque" id="remarque" placeholder="Remarque sur ce matériel">
                    </div>
                    <div class="material-input-box">
                        <label for="status">Status:</label>
                        <input type="text" name="status" id="status" placeholder="Le status">
                    </div>
                 </div>
                 <br>
                 <div class="form-submit-btn">
                    <button class="btn btn-primary" type="submit">AJOUTER</button>
                 </div>
                 <br>

                 <div class="back">
                     <a class="btn_back" href="{{ route('/home') }}">Retour</a>
                 </div>
             </form>

      </div>
</body>
</html>
