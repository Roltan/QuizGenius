@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/profile.css" />
    <script defer src="/js/modal.js"></script>
@endsection

@section('mainContent')
    @include('/block/header_lk')
    <div class="modalka modalka--wrapper" id="modal1">
        <div class="navLK navLK__bar">
            @include('/block/navLK', ['active'=>1])
        </div>
    </div>

    <figure class="background"></figure>

    <main class="container">
        <nav class="navLK">
            @include('/block/navLK', ['active'=>1])
        </nav>

        <div class="main">
            <div>
                <img src="/img/lk/humen.png" alt="" />
                <div class="input input__dark">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" class="input--field" readonly />
                </div>
                <div class="input input__dark">
                    <label for="email">Почта</label>
                    <input type="email" name="email" id="email" class="input--field" readonly />
                </div>
            </div>
        </div>
    </main>
@endsection
