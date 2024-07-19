<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ url('css/ajoutmat.css') }}">
    <title>home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>


</head>
<body>



       <div class="wrapper" id="content">


                <div class="log_title">
                    <span>Matériels</span>
                </div>
                <div class="linkeo_logo">
                    <img src="images/logo.png" alt="" />
                </div>
                <div class="menus">

                        @foreach ($materiel as $mat)
                            <div class="row button">

                                <a class="btn btn-primary" href="{{ route($mat->route) }}">{{ $mat->nom_materiel}}</a>

                            </div>
                        @endforeach


                </div>
                <div class="logout">
                    <a class="logout_icon" href="{{ route('/home') }}"><i class="fa-solid fa-hand-point-left"></i></a>
                </div>
       </div>





</body>
</html>
