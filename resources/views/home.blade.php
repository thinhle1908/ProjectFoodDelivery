<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello {{auth()->user()->firstname .' ' .auth()->user()->lastname}}</h1>
    <h2>Your email is {{ auth()->user()->email}}</h2>
    <h2>Your role is {{ auth()->user()->role[0]->name}}</h2>
</body>
</html>