
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--fontawesome-->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!--sweetalert2-->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ url('css/ajoutmach.css') }}">
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <div class="form-title">
               <span>Modification</span>
        </div>
        <form action="{{route('update_materiel', $materiels->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="main-material-info">
                <div class="material-input-box">
                     <label for="categorie">Catégorie : </label>
                     <input type="text" name="categorie" id="categorie" value="{{ $materiels->categorie }}">
                </div>
                <div class="material-input-box">
                    <label for="designation">Designation : </label>
                    <input type="text" name="designation" id="designation" value="{{ $materiels->designation }}">
               </div>
                <div class="material-input-box">
                    <label for="num_serie">Numéro de série :</label>
                    <input type="text" name="num_serie" id="num_serie" value="{{ $materiels->num_serie }}">
                </div>
                <div class="material-input-box">
                    <label for="date_achat">Date d'achat :</label>
                    <input type="text" name="date_achat" id="date_achat" value="{{ $materiels->date_achat }}">
                </div>
                <div class="material-input-box">
                    <label for="status">status :</label>

                    <select name="status" id="status" value="{{ $materiels->status }}">
                        <option value="OK-Service">OK-Service</option>
                        <option value="OK-Stock">OK-Stock</option>
                        <option value="HS">HS</option>
                    </select>
                </div>
                <div class="material-input-box">
                    <label for="usager">Usager :</label>
                    <input type="text" name="usager" id="usager" value="{{ $materiels->usager }}">
                </div>
                <div class="material-input-box">
                    <label for="etiquette">Etiquette :</label>
                    <input type="text" name="etiquette" id="etiquette" value="{{ $materiels->etiquette }}">
                </div>
                <div class="material-input-box">
                    <label for="remarque">Remarque :</label>
                    <input type="text" name="remarque" id="remarque" value="  {{ $materiels->remarque }}">
                </div>
                <div class="material-input-box">
                    <label for="emplacement">Emplacement :</label>
                    <input type="text" name="emplacement" id="emplacement" value="  {{ $materiels->emplacement }}">
                </div>
                <div class="material-input-box">
                    <label for="services">Poste:</label>
                    <input type="text" name="services" id="services" value="  {{ $materiels->services}}">
                </div>
             </div>
             <div class="form-submit-btn">
                <input type="submit" value="VALIDER">
             </div>

        </form>
        <div class="form-submit-btn">
            <a class="btn_back prev" href="{{ route('home') }}"><i class="fa-solid fa-backward"></i></a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      @if(session('success'))
            <script>
                Swal.fire({
                    title: 'Succès!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3498db',
                    willClose: () => {
                        window.location.href = '{{ route('home') }}';
                    }
                });
            </script>
       @endif
</body>
</html>

