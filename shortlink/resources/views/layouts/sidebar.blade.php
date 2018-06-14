<div class="side-menu sidebar-inverse ps-container ps-theme-default ps-active-x">
    <nav class="navbar navbar-default" role="navigation" style="margin-top: 60px;">
        <div class="side-menu-container">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('home') }}" target="_self">
                        <span class="icon big voyager-home"></span> <span class="text">Главная</span>
                    </a>
                </li>
                <li><a href="{{ route('login') }}">Войти</a></li>
                <li><a href="{{ route('register') }}">Регистрация</a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Выход
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>
