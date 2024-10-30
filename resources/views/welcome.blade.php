<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!--style Css-->
       <link rel="stylesheet" href="{{ url('css/generate.css') }}">
        <!--Google fonts-->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Generate</title>
</head>
<body>
      <div class="container">

            <div class="title">
                <h5>Qr code</h5>
            </div>
            <div class="image">
                {!! $qrcode !!}
            </div>

            <div class="back">
                <a class="btn_back" href="{{ route('pdf', ['id' => $id])}}">Imprimer</a>
                <a class="btn_edit" href="{{ route('home') }}">Retour</a>
            </div>

      </div>

</body>
</html>
