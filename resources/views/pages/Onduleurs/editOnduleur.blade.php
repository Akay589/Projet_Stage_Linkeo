

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Fontawesome-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ url('css/ajoutmach.css') }}">
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <div class="form-title">
               <span>Modification</span>
        </div>
        <form action="{{route('update_onduleur', $onduleurs->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="main-material-info">
                <div class="material-input-box">
                     <label for="designation">Designation : </label>
                     <input type="text" name="designation" id="designation" value="{{ $onduleurs->designation }}">
                </div>
                <div class="material-input-box">
                    <label for="num_serie">Numéro de série :</label>
                    <input type="text" name="num_serie" id="num_serie" value="{{ $onduleurs->num_serie }}">
                </div>
                <div class="material-input-box">
                    <label for="date_achat">Date d'achat :</label>
                    <input type="text" name="date_achat" id="date_achat" value="{{ $onduleurs->date_achat }}">
                </div>
                <div class="material-input-box">
                    <label for="status">status :</label>

                    <select name="status" id="status" value="{{ $onduleurs->status }}">
                        <option value="OK-Service">OK-Service</option>
                        <option value="OK-Stock">OK-Stock</option>
                        <option value="HS">HS</option>
                    </select>
                </div>

                <div class="material-input-box">
                    <label for="etiquette">Etiquette :</label>
                    <input type="text" name="etiquette" id="etiquette" value="{{ $onduleurs->etiquette }}">
                </div>
                <div class="material-input-box">
                    <label for="remarque">Remarque :</label>
                    <input type="text" name="remarque" id="remarque" value="{{ $onduleurs->remarque }}">
                </div>

                <div class="material-input-box">
                    <label for="emplacement">Emplacement:</label>
                    <input type="text" name="emplacement" id="emplacement" value="{{ $onduleurs->emplacement }}">
                </div>
             </div>
             <div class="form-submit-btn">
                <input type="submit" value="VALIDER">
            </div>

        </form>
        <div class="form-submit-btn">
            <a class="btn_back prev" href="{{ route('liste_onduleurs') }}"><i class="fa-solid fa-backward"></i></a>
        </div>

 </div>
</body>
</html>
