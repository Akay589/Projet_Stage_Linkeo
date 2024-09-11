

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--style Css-->
         <link rel="stylesheet" href="{{ url('css/ajoutmach.css') }}">


    <!--Fontawesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!--Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <!-- Add jQuery UI CSS and JS files -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="http://mysite.com/jquery.min.js"><\/script>');
    </script>

    <title>Ajout</title>
</head>
<body>
        <div class="container">
             <div class="form-title">
                    <span>Ajout Matériel</span>
             </div>

             <form action="{{ route('materiel_add') }}" method="POST" enctype="multipart/form-data">
              @csrf
                 <div class="main-material-info">
                    <div class="material-input-box">
                        <label for="categorie">Catégorie : </label>
                        <input type="text" name="categorie" id="categorie" placeholder="Catégorie du matériel">
                   </div>
                    <div class="material-input-box">
                         <label for="designation">Designation : </label>
                         <input type="text" name="designation" id="designation" placeholder="Désignation du matériel">
                    </div>
                    <div class="material-input-box">
                        <label for="num_serie">Numéro de série/Imei :</label>
                        <input type="text" name="num_serie" id="num_serie" placeholder="Numéro de série">
                    </div>
                    <div class="material-input-box">
                        <label for="date_achat">Date d'achat :</label>
                        <input type="text" name="date_achat" id="date_achat" placeholder="Date d'achat">
                    </div>
                    <div class="material-input-box">
                        <label for="status">Status :</label>
                         <select name="status" id="status">
                               <option value="OK-Service">OK-Service</option>
                               <option value="OK-Stock">OK-Stock</option>
                               <option value="HS">HS</option>
                         </select>

                    </div>
                    <div class="material-input-box ">
                        <label for="user">user :</label>
                        <input type="text" name="user" id="user" placeholder="Propriétaire du matériel">
                    </div>

                    <div class="material-input-box relative">
                        <label for="usager">Usager :</label>
                        <div class="input-with-icon">
                            <input type="text" name="usager" id="usager" placeholder="Propriétaire du matériel">
                            <!-- Icône de dropdown -->

                        </div>
                        <span class="dropdown-icon" id="dropdown-icon">&#x25BC;</span> <!-- Icône de flèche vers le bas -->
                        <ul id="dropdown" class="list-group" style="display: none;">
                            <!-- Les options seront ajoutées dynamiquement ici -->
                        </ul>
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
                        <label for="services">Emplacement :</label>
                        <input type="text" name="emplacement" id="emplacement" placeholder="l'emplacement du matériel">
                    </div>
                    <div class="material-input-box">
                        <label for="services">Poste :</label>
                        <input type="text" name="services" id="services" placeholder="La fonction du propriétaire">
                    </div>
                    <div class="material-input-box">
                        <label for="services">Type :</label>
                        <input type="text" name="type" id="type" placeholder="Le type du matériel">
                    </div>
                    <div class="material-input-box">
                        <label for="services">Operateur :</label>
                        <input type="text" name="operateur" id="operateur" placeholder="L'opérateur du propriétaire">
                    </div>
                    <div class="material-input-box">
                        <label for="services">@Mac :</label>
                        <input type="text" name="mac" id="mac" placeholder="L'adresse mac du matériel">
                    </div>
                    <div class="material-input-box">
                        <label for="services">@IP :</label>
                        <input type="text" name="ip" id="ip" placeholder="L'adresse ip du matériel">
                    </div>
                 </div>
                 <br>
                 <div class="form-submit-btn">
                    <button class="btn btn-primary" type="submit">AJOUTER</button>
                 </div>
                 <br>


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

       <script>
            $(document).ready(function() {
                let dropdownVisible = false; // État du dropdown

                // Fonction pour afficher ou cacher le dropdown quand on clique sur l'icône du dropdown
                $('#dropdown-icon').on('click', function() {
                    if (dropdownVisible) {
                        // Si le dropdown est visible, le cacher
                        $('#dropdown').hide();
                        dropdownVisible = false;
                    } else {
                        // Si le dropdown est caché, l'afficher
                        $.ajax({
                            url: '/fetch-ldap-users',
                            method: 'GET',
                            data: { query: '' }, // Envoyer une chaîne vide pour récupérer tous les utilisateurs
                            success: function(data) {
                                $('#dropdown').empty().show();
                                data.forEach(function(displayName) {
                                    $('#dropdown').append('<li>' + displayName + '</li>');
                                });
                                dropdownVisible = true;
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });

                // Gérer l'événement de saisie dans l'input pour filtrer les résultats
                $('#usager').on('keyup', function() {
                    let query = $(this).val();
                    if (query.length > 0) {
                        $.ajax({
                            url: '/fetch-ldap-users',
                            method: 'GET',
                            data: { query: query },
                            success: function(data) {
                                $('#dropdown').empty().show();
                                data.forEach(function(displayName) {
                                    $('#dropdown').append('<li>' + displayName + '</li>');
                                });
                                dropdownVisible = true;
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    } else {
                        $('#dropdown').hide();
                        dropdownVisible = false;
                    }
                });

                // Cacher le dropdown si on clique en dehors
                $(document).on('click', function(event) {
                    if (!$(event.target).closest('.material-input-box').length) {
                        $('#dropdown').hide();
                        dropdownVisible = false;
                    }
                });

                // Afficher la valeur sélectionnée dans l'input
                $(document).on('click', '#dropdown li', function() {
                    $('#usager').val($(this).text());
                    $('#dropdown').hide();
                    dropdownVisible = false;
                });
        });




       </script>








</html>
