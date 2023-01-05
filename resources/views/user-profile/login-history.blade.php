
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Free Bulma template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="card-table">
    <div class="content">
        <table class="table is-bordered is-striped ">
            <thead>
            <tr class="info">
                <th >Name</th>
                <th >Email</th>
                <th >Data di accesso</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($logs as $log)
                <td> {{ $log->name }}</td>
                <td> {{ $log->email }}</td>
                <td> {{ $log->created_at }}</td>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
<div class="control mb-5">
    <button class="button is-info mt-5">
        <a href=" {{ route('home') }}">Torna alla dashboard</a>
    </button>
</div>
</body>
</html>
