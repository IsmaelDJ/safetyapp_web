<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste of particulars</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th class="align-middle">chauffeur</th>
                <th class="text text-center">Reponse Vraie</th>
                <th class="text text-center">Reponse Faux</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drivers as $driver)
            <tr>
                <td>
                    <a href="{{route('drivers.show',$driver->id)}}">
                        <p class="text-muted mb-0 text-justify">{{$driver->name}}</p>
                    </a>
                </td>
                <td>
                    <div class="row">
                        <div class="col-auto">
                            <p class="text-muted mb-0 text-justify">{{$driver->correct_answers}}</p>
                        </div>
                    </div>

                </td>
                <td>
                    <div class="row">
                        <div class="col-auto">
                            <p class="text-muted mb-0 text-justify">{{$driver->incorrect_answers}}</p>
                        </div>
                    </div>

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>