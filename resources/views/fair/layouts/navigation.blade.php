<style>
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
</style>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="nav-content container-fluid">
        <a class="navbar-brand" href="#">
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
                    <a class="nav-link" href="#">Fira</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Activitats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ubicació</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Usuari</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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
