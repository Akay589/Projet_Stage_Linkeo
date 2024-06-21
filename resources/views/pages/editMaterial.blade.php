<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/ajoutmat.css') }}">
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <div class="form-title">
               <span>Modificatipn</span>
        </div>
        <form action="{{route('update', $machine->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="main-material-info">
                <div class="material-input-box">
                     <label for="designation">Designation : </label>
                     <input type="text" name="designation" id="designation" value="{{ $machine->designation }}">
                </div>
                <div class="material-input-box">
                    <label for="num_serie">Numéro de série :</label>
                    <input type="text" name="num_serie" id="num_serie" value="{{ $machine->num_serie }}">
                </div>
                <div class="material-input-box">
                    <label for="date_achat">date d'achat :</label>
                    <input type="text" name="date_achat" id="date_achat" value="{{ $machine->date_achat }}">
                </div>
                <div class="material-input-box">
                    <label for="etat">etat :</label>
                    <input type="text" name="etat" id="user" value="{{ $machine->etat }}">

                </div>
                <div class="material-input-box">
                    <label for="user">Usager :</label>
                    <input type="text" name="user" id="user" value="{{ $machine->user }}">
                </div>
                <div class="material-input-box">
                    <label for="etiquette">Etiquette :</label>
                    <input type="text" name="etiquette" id="etiquette" value="{{ $machine->etiquette }}">
                </div>
                <div class="material-input-box">
                    <label for="remarque">Remarque :</label>
                    <input type="text" name="remarque" id="remarque" value="{{ $machine->remarque }}">
                </div>
                <div class="material-input-box">
                    <label for="status">Status:</label>
                    <input type="text" name="status" id="status" value="{{ $machine->status }}">
                </div>
             </div>
             <div class="form-submit-btn">
                <input type="submit" value="VALIDER">
            </div>
        </form>

 </div>
</body>
</html>
