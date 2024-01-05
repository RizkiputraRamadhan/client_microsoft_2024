<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.5.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title>@yield('title')</title>
</head>

<body class="font-sans antialiased bg-gray-100">

    <div class="navbar bg-base-100 shadow-lg">
        <a class="btn btn-ghost text-xl">Kuli IT Tecno</a>
      </div>

    <div class="container mx-auto p-5">
        @yield('content')
    </div>
</body>

</html>
