<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E‑Commerce')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

    <header class="site-header">
        <a href="/" class="brand">Mi E‑Commerce</a>
        <nav class="site-nav">
            <a href="/products">Productos</a>
            <a href="/products/create" class="site-nav-cta">Crear producto</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>