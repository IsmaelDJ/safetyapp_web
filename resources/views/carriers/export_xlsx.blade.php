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
                <th style="width: 50px; text-align:center;">N°</th>
                <th style="text-align: center">Nom</th>
                <th style="text-align: center">Phone</th>
                <th style="text-align: center">Adresse</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carriers as $carrier)
            <tr>
                <td style="text-align: center">{{$carrier->number}}</td>
                <td style="width: 250px; text-align: center">{{$carrier->name}}</td>
                <td style="width: 250px; text-align: center">{{$carrier->phone}}</td>
                <td style="width: 250px; text-align: center">{{$carrier->address}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>