<nav class="navbar navbar-expand-md navbar-dark shadow-sm header-container">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('top') }}">
            <i class="fa-solid fa-store me-1"></i> {{ config('app.name', 'Laravel') }}
        </a>
        <form action="{{ route('products.index') }}" method="GET" class="row g-1">
            <div class="col-auto">
                <input class="form-control header-search-input" name="keyword" placeholder="{{ __('messages.header.search') }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn header-search-button"><i class="fas fa-search header-search-icon"></i></button>
            </div>
        </form>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2">
                {{-- for guest --}}
                @guest
                    <li class="nav-item me-2">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="{{ route('login') }}">Log in</a>
                    </li>
                    <hr>
                {{-- for login user --}}
                @else
                    <li class="nav-item me-2">
                        <a href="{{ route('mypage.favorite')}}" class="nav-link">
                            <i class="far fa-heart fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            <i class="fas fa-shopping-cart fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="{{ route('mypage') }}">
                            <i class="fas fa-user-circle fa-lg"></i>
                        </a>
                    </li>
                @endguest
                <!-- Language Dropdown -->
                <li class="nav-item dropdown d-flex align-items-center">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="langDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-globe fa-lg"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('lang.switch', ['locale' => 'en']) }}">
                                <img src="https://flagcdn.com/us.svg" width="24" class="me-2 rounded-circle border"> English
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('lang.switch', ['locale' => 'ja']) }}">
                                <img src="https://flagcdn.com/jp.svg" width="24" class="me-2 rounded-circle border"> 日本語
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>