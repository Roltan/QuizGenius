@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/statistic.css" />
    <script defer src="/js/modal.js"></script>
@endsection

@section('mainContent')
    @include('/block/header_lk', ['active'=>3])

    <figure class="background"></figure>

    <main class="container">
        @include('/block/navLK', ['active'=>3])

        <div class="main">
            <div class="statistic--header">
                <div class="input input__img">
                    <label for="search"><img src="/img/lens.png" alt="" /></label>
                    <input type="text" placeholder="поиск" name="search" id="search" class="input--field" />
                </div>
                <img src="/img/filter.png" alt="" class="openModalBtn" data-modal="modal2" />

                <div class="modalka" id="modal2">
                    <form class="filter form">
                        @include('/elements/input/selector', [
                            'name'=>'test',
                            'label'=>'Тест',
                            'options'=>[
                                'тест 1',
                                'тест 2',
                                'тест 3',
                                'тест 4',
                            ]
                        ])

                        @include('/elements/input/data_select')

                        <button type="submit" class="button button__light button__bold">Применить</button>
                    </form>
                </div>
            </div>

            <div class="window">
                <div class="list">
                    @for($i=0; $i<10; $i++)
                        @include('/elements/solved', [
                            'href'=>'#',
                            'span'=>[
                                'Автор',
                                'XX/XX',
                                'Название теста',
                                'Дата'
                            ]
                        ])
                    @endfor
                </div>
            </div>
        </div>
    </main>
@endsection
