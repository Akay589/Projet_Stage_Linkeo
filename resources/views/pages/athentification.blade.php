<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
    <title>authentification</title>
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
              <div class="button">

                <input type="submit" value="Connecter"/>

              </div>
       </form>





       </div>

</body>
</html>
