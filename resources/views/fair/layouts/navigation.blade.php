<style>
    .margin-top-20 {
        margin-top: 20vh;
    }

    .navbar {
        transition: background-color 0.3s ease, color 0.3s;
        font-size: 24px;
    }

    .nav-item {
        margin-right: 100px;
    }

    .navbar-brand {
        margin-left: 100px;
    }

    .navbar a.nav-link,
    .navbar span {
        color: white;
    }

    .navbar.navbar-state {
        background-color: #f0f0f0;
    }

    .navbar.navbar-state a.nav-link,
    .navbar.navbar-state span {
        color: black;
    }

    #background-video {
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        z-index: -1;
    }

    .transparent-box {
        max-width: 500px;
        border-radius: 16px;
        height: 600px;
        color: rgba(255, 255, 255, 0.9);
        position: relative;
    }


    #background-video {
        width: calc(100% + 40px);
        height: calc(100% + 40px);
        object-fit: cover;
        filter: grayscale(0.5) opacity(0.8);
    }
/* 
    .video-content:before {
        content: '';
        position: absolute;
        background: rgba(0, 0, 0, 0.5);
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        backdrop-filter: blur(5px);
    } */

    .separator {
        position: relative;
        width: 100%;
        pointer-events: none;
    }
</style>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="nav-content container-fluid">
        <a class="navbar-brand" href="{{ route('fair.index') }}">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/IEBLogo.jpg') }}" alt="Logo" width="80" height="85"
                    class="rounded-5 me-3">
                <span class="align-text-top fs-1">IEB</span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('fair.index') }}">Fira</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('fair.activities') }}">Activitats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('fair.location') }}">Ubicació</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Tauler
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Sortida') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Entrada</a>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>


<div class="video-content">
    <video id="background-video" autoplay loop muted poster="{{ asset('img/IEBLogo.jpg') }}">
        <source src="{{ asset('vid/fira.mp4') }}" type="video/mp4">
    </video>
</div>

<div class="transparent-box margin-top-20 container-xxl">
    <div>
        {{-- <h1 class="text-center">@yield('pageTitle')</h1>
        <p class="card-text mt-3">
            @yield('pageContent')
        </p>
        <div class="text-center mt-3">
            <a class="btn1" href=" {{ Route::currentRouteNamed('fair.index') ? '#schedule' : route('fair.index') }}">RESERVAR</a>
        </div> --}}
    </div>
</div>

<div class="separator">
    <img src=" {{ asset('img/separate.png') }} " alt="Nature" class="responsive separator">
</div>

<script>
    window.addEventListener('scroll', function() {
        var navbar = document.querySelector('.navbar');
        if (window.scrollY > 0) {
            navbar.classList.add('navbar-state');
        } else {
            navbar.classList.remove('navbar-state');
        }
    });
</script>
