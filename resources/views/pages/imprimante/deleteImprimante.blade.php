

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ url('css/showmat.css') }}">
    <title>Document</title>
</head>
<body>
<div class="container mt-4">
       <div class="row justify-content-center bg-light p-4">
            <div class="col-lg-8">
                <h3>Voulez-vous vraiment supprimer  {{$imprimantes->designation}} ?</h3>
                <div>
                    <form action="{{route('destroy_imprimante', $imprimantes->id)}}" method="POST">
                    @csrf
                    @method('DELETE')

                        <div class="back">
                            <button type="submit" class="btn_back">OUI</button>
                            <button  class="btn_edit"><a style="text-decoration: none; color: white;" href="{{route('liste_imprimantes')}}">NON</a></button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
