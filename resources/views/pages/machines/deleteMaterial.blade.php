

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--  css -->
    <link rel="stylesheet" href="{{ url('css/showmat.css') }}">
    <title>Document</title>
</head>
<body>
<div class="container mt-4">
       <div class="row justify-content-center bg-light p-4">
            <div class="col-lg-8">
                <h3>Voulez-vous vraiment supprimer   {{$materiels->designation}} ?</h3>
                <div>
                    <form action="{{route('destroy_materiel', $materiels->id)}}" method="POST">
                    @csrf
                    @method('DELETE')

                        <div class="back">
                            <button type="submit" class="btn_back">OUI</button>


                        </div>
                    </form>
                    <div class="back">

                        <button  class="btn_edit"><a style="text-decoration: none; color: white;" href="{{route('home')}}">NON</a></button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
