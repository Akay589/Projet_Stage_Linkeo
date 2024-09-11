<!-- resources/views/ldap/users.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs LDAP</title>
</head>
<body>
    <h1>Liste des utilisateurs LDAP</h1>

    <!-- Liste pour afficher les utilisateurs LDAP -->
    <ul>
        <!-- Boucle pour afficher les utilisateurs dans une liste -->
        @foreach($userOptions as $user)
            <li>
                <strong>DisplayName:</strong> {{ $user['displayName'] }} <br>
                <strong>UID:</strong> {{ $user['uid'] }} <br>
                <strong>SN:</strong> {{ $user['sn'] }} <br>
                <strong>GivenName:</strong> {{ $user['givenName'] }}
            </li>
            <hr>
        @endforeach
    </ul>

</body>
</html>
