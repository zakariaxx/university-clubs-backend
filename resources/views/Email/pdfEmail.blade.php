<!DOCTYPE html>
<html>
<head>
    <title>confirmation de votre participation</title>
</head>
<body>
    <h1>{{ $title }}</h1>

    <img style="margin-left:40%;margin-top:5%;margin-bottom:10%;" src="data:image/{{ $qrCode }}.svg"> <br>
    <p style="margin-top:5%;">{{ $body }}</p>

    <table style="width:100%;margin-top:10%;" border="2px">
      <tr>
        <td>Nom</td>
        <td>{{$nom}}</td>
      </tr>
      <tr>
        <td>Prenom</td>
        <td>{{$prenom}}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>{{$email}}</td>
      </tr>
      <tr>
        <td>Numero de telaphone</td>
        <td>{{$telephone}}</td>
      </tr>
    </table>

    <p>Thank you</p>
</body>
</html>
