<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
    <title>home</title>
</head>
<body>
       <div class="wrapper">


                <div class="log_title">
                    <span>Authentification</span>
                </div>

        <form action="/login" method="POST">
         @csrf
              <div class="row">
                <i class="fa-solid fa-user"></i>
                <input type="email" placeholder="nom d'utilisateur" required name="email" />

              </div>
              <div class="row">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="mot de passe" required  name="password"  />

              </div>
              <div class="row button">

                <input type="submit" value="Connecter"/>

              </div>
       </form>





       </div>

</body>
</html>
