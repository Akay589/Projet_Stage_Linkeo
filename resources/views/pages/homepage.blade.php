<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ url('css/home.css') }}">
    <title>home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>


</head>
<body>



    <div class="container">


                <div class="log_title">
                    <span>Suivi Matériel</span>
                </div>
                <!--div class="linkeo_logo">

                </!--div!-->
                <form class="form_search" action="{{ route('materiels.search') }}" method="GET">
                    <label for="search_by">Recherche par :</label>
                    <select name="search_by" id="search_by" required>
                        <option value="categorie">Catégorie</option>
                        <option value="designation">Désignation</option>
                        <option value="usager">Usager</option>
                        <option value="user">Utilisateur</option>
                        <option value="num_serie">Numéro de série/Imei</option>
                        <option value="services">Services</option>
                        <option value="type">Type</option>
                        <option value="mac">@Mac</option>
                        <option value="ip">@ip</option>
                    </select>

                    <input class="search_input" type="text" name="query" placeholder="Entrez votre recherche..." required>
                    <button class="search_btn" type="submit">Rechercher</button>
                </form>

                <div class="outer-wrapper">
                    <div class="table-wrapper">
                      <table>
                            <thead>
                                  <th>Catégorie</th>
                                  <th>Designation</th>
                                  <th>Usager</th>
                                  <th>Action</th>
                            </thead>

                            <tbody>
                            @if($materiels->isEmpty())
                                <tr>
                                    <td colspan="5" style="text-align: center;">Aucun matériel de ce type</td>
                                </tr>


                            @else
                                @foreach ($materiels as $materiel )
                                    <tr>
                                        <td>{{$materiel->categorie}}</td>
                                        <td>{{$materiel->designation}}</td>

                                        <td>{{$materiel->usager}}</td>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa-solid fa-caret-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ route('voir_materiel', $materiel->id) }}"><i class="fa-solid fa-circle-info"></i>  voir</a>
                                                    <a class="dropdown-item" href="{{ route('edit_materiel', $materiel->id) }}"><i class="fa-solid fa-pen-to-square"></i>  Modifier</a>
                                                    <a class="dropdown-item" href="{{ route('delete_materiel', $materiel->id) }}"><i class="fa-solid fa-trash"></i>  Supprimer</a>
                                                    <a class="dropdown-item" href="{{ route('generate_materiel', $materiel->id) }}"><i class="fa-solid fa-qrcode"></i>  Générer CodeQr</a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>


                                @endforeach
                            @endif
                            </tbody>

                      </table>
                    </div>
                </div>
                <div class="back">
                    <a class="btn_edit" href="{{ route('add_machine') }}">Nouveau matériel</a>

                    <a class="btn_back" href="{{ route('logout_admin') }}" type="submit">
                       Déconnecter

                    </a>



                </div>


                <div class="linkeo_logo">
                    <img src="images/logo.png" alt="" />
                </div>
    </div>







</body>
</html>
