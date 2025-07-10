<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Install Novablog</title>
    <style>
        body {
            padding: 20px;
        }

        .button {
            padding: 10px 15px;
            border: 1px solid #818181;
            background: #ffffff;
            color: #000;
            text-decoration: none;
            border-radius: 12px;
            margin-right: 10px;
        }

        .button:hover {
            background-color: #ffaeae;
        }

        .butotn:last-child {
            margin-right: unset;
        }
    </style>
</head>

<body>
    <a href="{{ route('install.migrate') }}" class="button">Migrate database</a>
    <a href="{{ route('install.storage') }}" class="button">Create storage link</a>
</body>

</html>
