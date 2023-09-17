<nav class="navbar navbar-expand-lg bg-body-tertiary rounded mb-5" aria-label="Thirteenth navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11"
            aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
            <a class="navbar-brand col-lg-3 me-0 ps-4" href="#"><img style="width:12.5%"
                    src="https://cdn.pixabay.com/photo/2017/01/31/23/42/animal-2028258_1280.png" alt=""></a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">Master</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/user') }}">User</a></li>
                        <li><a class="dropdown-item" href="{{ url('/kendaraan') }}">Kendaraan</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-disabled="true" href="{{ url('/penitipan') }}">Penitipan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-disabled="true" href="{{ url('/penyewaan') }}">Penyewaan</a>
                </li>
            </ul>
            <ul class="navbar-nav col-lg-3 justify-content-lg-end">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="nav-link"
                                    onclick="return confirm('Sure to logout?')">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                <button class="btn btn-primary">Button</button>
            </div>
        </div>
    </div>
</nav>
