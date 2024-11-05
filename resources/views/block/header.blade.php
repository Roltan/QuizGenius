<header class="header">
    <div class="container">
        <div class="header--logo">
            <img src="img/лого.png" alt="" />
        </div>
        <div class="header--buttons">
            @if (Auth::check())
                <button class="button button__blue button__image">
                    <span>Личный кабинет</span>
                    <img src="img/human.png" alt="" />
                </button>
            @else
                <button class="button button__blue">Вход</button>
                <button class="button button__blue">Регистрация</button>
            @endif
        </div>
    </div>
</header>
