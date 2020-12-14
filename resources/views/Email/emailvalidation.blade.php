<!DOCTYPE html>
<html>
<head>
    <title>no_replay</title>
</head>

<body>
<h2>Bienvenue sur notre site  {{$user['first_name']}}</h2>
<br/>
Votre compte est maintenant activé, <br/>Vous pouvez vous connecter en utilisant votre email  {{$user['email']}}
, Veuillez cliquer sur le lien ci-dessous pour vous connecter Merci.
    <br/>
    <a href="http://localhost:4200/user/login">Se Connecter</a>
</body>

</html>

