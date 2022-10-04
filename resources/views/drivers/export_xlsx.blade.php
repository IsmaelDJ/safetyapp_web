<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
        <tr>
            <th style="text-align: center">N°</th>
            <th style="text-align: center">Nom</th>
            <th style="text-align: center">Numéro de téléphone</th>
            <th style="text-align: center">Clé OBC</th>
            <th style="text-align: center">Mot de passe</th>
        </tr>
        </thead>
        <tbody>
        @foreach($drivers as $driver)
            <tr>
                <td style="width: 50px; text-align: center">
                    <p>{{$loop->iteration}}</p>
                </td>
                <td style="width: 200px; text-align: center">
                    <p>{{$driver->name}}</p>
                </td>
                <td style="width: 200px; text-align: center">
                    <p>{{$driver->phone}}</p>
                </td>
                <td style="width: 200px; text-align: center">
                    <p>{{$driver->obc}}</p>
                </td>
                <td style="width: 200px; text-align: center">
                    <p>{{$driver->password}}</p>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>

</body>
</html>