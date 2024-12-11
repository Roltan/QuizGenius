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
            @include('/block/list_header', ['tests'=>[
                'тест 1',
                'тест 2',
                'тест 3',
                'тест 4',
            ]])

            <div class="window">
                <div class="list">
                    @for($i=0; $i<10; $i++)
                        @include('/elements/card', [
                            'href'=>'#',
                            'span'=>[
                                'Имя',
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
