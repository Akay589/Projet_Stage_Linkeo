<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!--style Css-->
       <link rel="stylesheet" href="{{ url('css/generate.css') }}">
    <title>Document</title>
</head>
<body>
      <div class="container">

            <div class="title">
                <h5>Qr code du ID = {{ $id }}</h5>
            </div>
            <div class="image">
                {!! $qrcode !!}
            </div>

            <div class="back">
                <a class="btn_back" href="{{ route('/home') }}">Imprimer</a>

            </div>
            <a href="{{ route('/home') }}">Retour</a>
      </div>

</body>
</html>
