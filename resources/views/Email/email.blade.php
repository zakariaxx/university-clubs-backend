<!DOCTYPE html>
<html>
<head>
    <title>no_replay</title>
</head>

<body>
<h2>Bienvenue sur notre site  {{$user['first_name']}}</h2>
<br/>
Votre création de compte a bien été effectuée,
Vous devez activer votre compte pour pour vous connecter
</br>
votre adresse e-mail enregistrée est {{$user['email']}}
, Veuillez cliquer sur le lien ci-dessous pour vérifier votre compte de messagerie
    <br/>
    <a href="{{route('verify', $user['verification_token'])}}">Verify Email</a>
</body>

</html>

