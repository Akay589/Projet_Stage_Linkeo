<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!--style Css-->
   <link rel="stylesheet" href="{{ url('css/listesmat.css') }}">
   <!--Bootstrap-->



   <!--Fontawesome-->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
   <!--Google fonts-->
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <title>Listes</title>
</head>
<body>
       <div class="container">
            <div class="form-title">
                    <span>Liste des servers</span>
            </div>
            <div class="outer-wrapper">
                  <div class="table-wrapper">
                    <table>
                           <thead>
                                <th>Id</th>
                                <th>Designation</th>
                                <th>Etat</th>
                                <th>Emplacement</th>
                                <th>Action</th>
                           </thead>
                        @foreach ($servers as $server )
                           <tbody>

                                <td>{{$server->id}}</td>

                                <td>{{$server->designation}}</td>
                                <td>{{$server->etat}}</td>
                                <td>{{$server->emplacement}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('voir_servers', $server->id) }}"><i class="fa-solid fa-circle-info"></i></a>
                                    <a class="btn btn-success" href="{{ route('edit_server', $server->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="btn btn-danger" href="{{ route('delete_server', $server->id) }}"><i class="fa-solid fa-trash"></i></a>
                                    <a class="btn btn-secondary" href="{{ route('generate_server', $server->id) }}"><i class="fa-solid fa-qrcode"></i></a>
                                </th>
                           </tbody>
                        @endforeach
                    </table>
                  </div>
            </div>


            <div class="back">
                <a class="btn_back" href="{{ route('liste') }}">Retour</a>
            </div>
       </div>
</body>
</html>
