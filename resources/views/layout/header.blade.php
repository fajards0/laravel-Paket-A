<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest
                @else
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('siswa.index')}}">Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('tabungan.index')}}">Tabungan</a>
                </li>
                @endguest

            </ul>
            @guest
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('register')}}">Register</a>
                    </li>
                </ul>
            </div>
            @else
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-disabled="true">{{Auth::user()->name}}</a>
                    </li>
                </ul>
                <button class="btn btn-sm btn-outline-warning" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    Logout
                </button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            @endguest

        </div>
    </div>
</nav>
