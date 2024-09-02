
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--fontawesome-->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!--Google fonts-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
                    <label for="num_serie">Numéro de série/Imei :</label>
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
                <div class="material-input-box relative">
                    <label for="usager">Usager :</label>
                    <input type="text" name="usager" id="usager" value="{{ $materiels->usager }}">
                    <ul id="dropdown" class="list-group" style="display: none;">
                        <!-- Les options seront ajoutées dynamiquement ici -->
                    </ul>
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
                    <label for="services">Poste :</label>
                    <input type="text" name="services" id="services" value="  {{ $materiels->services}}">
                </div>
                <div class="material-input-box">
                    <label for="services">Type :</label>
                    <input type="text" name="type" id="type" value="  {{ $materiels->type}}">
                </div>
                <div class="material-input-box">
                    <label for="services">Opérateur :</label>
                    <input type="text" name="operateur" id="operateur" value="  {{ $materiels->operateur}}">
                </div>
                <div class="material-input-box">
                    <label for="services">@Mac :</label>
                    <input type="text" name="mac" id="mac" value="  {{ $materiels->mac}}">
                </div>
                <div class="material-input-box">
                    <label for="services">@IP :</label>
                    <input type="text" name="ip" id="ip" value="  {{ $materiels->ip}}">
                </div>
             </div>
             <div class="form-submit-btn modif">
                <input type="submit" value="VALIDER">
             </div>

        </form>
        <div class="form-submit-btn previous">
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

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const input = document.getElementById('usager');
                const dropdown = document.getElementById('dropdown');

                // Fonction pour récupérer les utilisateurs LDAP et mettre à jour le dropdown
                function fetchUsers() {
                    const query = input.value.trim(); // Supprimer les espaces inutiles
                    if (query.length < 1) {
                        dropdown.style.display = 'none';
                        return;
                    }

                    fetch(`/fetch-ldap-users?query=${query}`)
                        .then(response => response.json())
                        .then(displayNames => {
                            dropdown.innerHTML = ''; // Vider les options existantes
                            if (displayNames.length > 0) {
                                dropdown.style.display = 'block';
                                displayNames.forEach(name => {
                                    const li = document.createElement('li');
                                    li.textContent = name;
                                    li.classList.add('list-group-item');
                                    li.addEventListener('click', () => {
                                        input.value = name;
                                        dropdown.style.display = 'none';
                                    });
                                    dropdown.appendChild(li);
                                });
                            } else {
                                dropdown.style.display = 'none';
                            }
                        })
                        .catch(error => {
                            console.error('Erreur lors de la récupération des utilisateurs:', error);
                            dropdown.style.display = 'none';
                        });
                }

                // Écouteur d'événement pour l'entrée de l'utilisateur
                input.addEventListener('input', fetchUsers);

                // Écouteur d'événement pour masquer le dropdown lorsque l'utilisateur clique en dehors
                document.addEventListener('click', function(event) {
                    if (!dropdown.contains(event.target) && event.target !== input) {
                        dropdown.style.display = 'none';
                    }
                });
            });
        </script>
</body>
</html>

