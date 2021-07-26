<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h4>Hi Admin,</h4>

    <p>You received a new message.</p>

    <em>For: {{ $data['name'] }}</em>
    <em>Email: {{ $data['email'] }}</em>

    <em>Message</em>
    <p>{{ $data['body'] }}</p>


    Thanks,
    {{ config('app.name') }}







</body>

</html>
