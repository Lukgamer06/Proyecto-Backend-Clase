<header class="site-header">
    <a href="{{ url('/') }}" class="brand">Mi E‑Commerce</a>
    <nav class="site-nav">
        @guest
            <a href="{{ url('/') }}">Inicio</a>
            <a href="{{ route('products.index') }}">Catálogo</a>
            <a href="{{ route('login') }}">Iniciar sesión</a>
            <a href="{{ route('register') }}">Registrarse</a>
        @endguest

        @auth
            <a href="{{ url('/') }}">Inicio</a>
            <a href="{{ route('products.index') }}">Catálogo</a>
            <a href="{{ route('products.create') }}" class="site-nav-cta">Crear producto</a>
            <span class="site-nav-user">{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="site-nav-button">Cerrar sesión</button>
            </form>
        @endauth
    </nav>
</header>
