<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



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
                    <img src="images/logo.png" alt="" />
                </!--div!-->
                <form class="form_search" action="{{ route('materiels.search') }}" method="GET">
                    <label for="search_by">Recherche par :</label>
                    <select name="search_by" id="search_by" required>
                        <option value="categorie">Catégorie</option>
                        <option value="designation">Désignation</option>
                        <option value="usager">Usager</option>
                        <option value="num_serie">Numéro de série</option>
                        <option value="services">Services</option>
                    </select>

                    <input class="search_input" type="text" name="query" placeholder="Entrez votre recherche..." required>
                    <button class="btn btn-primary" type="submit">Rechercher</button>
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
                                            <a class="btn btn-primary" href="{{ route('voir_materiel', $materiel->id) }}"><i class="fa-solid fa-circle-info"></i></a>
                                            <a class="btn btn-success" href="{{ route('edit_materiel', $materiel->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a class="btn btn-danger" href="{{ route('delete_materiel', $materiel->id) }}"><i class="fa-solid fa-trash"></i></a>
                                            <a class="btn btn-secondary" href="{{ route('generate_materiel', $materiel->id) }}"><i class="fa-solid fa-qrcode"></i></a>
                                        </td>
                                    </tr>


                                @endforeach
                            @endif
                            </tbody>

                      </table>
                    </div>
                </div>
                <div class="back">
                    <a class="btn_back" href="{{ route('materiel.scan') }}"  type="submit">
                       Faire un scan

                    </a>


                    <a class="btn_edit" href="{{ route('add_machine') }}">Nouveau matériel</a>
                </div>


                <div class="logout">
                    <a class="logout_icon" href="{{ route('logout_admin') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
                </div>
    </div>







</body>
</html>
