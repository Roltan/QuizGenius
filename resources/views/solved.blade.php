@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/solved.css" />
    <script defer src="/js/modal.js"></script>
@endsection

@section('mainContent')
    @include('/block/header_lk', ['notNav'=>true])

    <figure class="background"></figure>

    <main class="container">
        <div class="main--header__row">
            <h1 class="main--header">Название теста</h1>
            <h1 class="main--header">Тема теста</h1>
        </div>

        <div class="settings">
            <h1>Имя тестируемого: NAME</h1>

            <div>
                <div>
                    <span>Оценка: Х</span>
                    <span>Процент правильных ответов: XX%</span>
                    <span>Дата прохождения: xx-xx-xxxx</span>
                </div>
                <div>
                    <span>Набрал баллов: XX</span>
                    <span>Потрачено времени: XXX</span>
                    <span>
                        <img src="/img/checkbox/true.png" alt="" />
                        Не покидал страницу
                    </span>
                </div>
            </div>
        </div>

        @include('/elements/quest/answer', [
            'type' => 'choice',
            'id'=> 2,
            'quest'=>'задание задание задание задание задание задание задание задание задание задание задание задание задание',
            'is_multiple'=> 1,
            'answers'=>[
                [
                    'label'=>'label',
                    'checked'=>1,
                    'isCorrect'=>true
                ],
                [
                    'label'=>'label',
                    'checked'=>1,
                    'isCorrect'=>false
                ],
                [
                    'label'=>'label',
                    'checked'=>0
                ],
                [
                    'label'=>'label',
                    'checked'=>1
                ],
            ]
        ])

        @include('/elements/quest/answer', [
            'type' => 'blank',
            'id'=>3,
            'quest'=>'задание задание задание задание задание задание задание задание задание задание задание задание задание',
            'answer'=>'ответ',
            'isCorrect'=>false
        ])

        @include('/elements/quest/answer', [
            'type'=>'fill',
            'id'=>4,
            'quest' => 'Что ж тут смешного? — сказал Ноздрев, указывая пальцем на поле, — — Эй, борода! а как проедешь еще одну версту, так вот тебе, то есть, — то что сам уже давно сидел в бричке, придумывая, кому бы еще отдать визит, да уж извольте проходить вы. s?:0 Да какая просьба? — Ну, послушай, сыграем в шашки, выиграешь s?:2 твои все. Ведь у — тебя есть? — Бобров, Свиньин, Канапатьев, Харпакин, Трепакин, Плешаков. s?:1 Богатые люди или нет? — Нет, я вижу, нельзя, как водится — между хорошими друзьями и товарищами.',
            "options"=> [
                [
                    [
                        "str"=> "enim",
                        "correct"=> false
                    ],
                    [
                        "str"=> "consectetur",
                        "correct"=> true
                    ],
                    [
                        "str"=> "aut",
                        "correct"=> false
                    ],
                    [
                        "str"=> "eum",
                        "correct"=> false
                    ]
                ],
                [
                    [
                        "str"=> "soluta",
                        "correct"=> false
                    ],
                    [
                        "str"=> "eum",
                        "correct"=> false
                    ],
                    [
                        "str"=> "qui",
                        "correct"=> true
                    ],
                    [
                        "str"=> "quam",
                        "correct"=> false
                    ]
                ],
                [
                    [
                        "str"=> "dicta",
                        "correct"=> false
                    ],
                    [
                        "str"=> "qui",
                        "correct"=> true
                    ],
                    [
                        "str"=> "laboriosam",
                        "correct"=> false
                    ],
                    [
                        "str"=> "qui",
                        "correct"=> false
                    ]
                ]
            ],
            'answer'=> [true, false, false]
        ])

        <div class="quest quest__relation">
            <span>задание задание задание задание задание задание задание задание задание задание задание задание задание</span>
            <div class="quest__relation--grid quest__relation--grid__solved">
                <div>Текст варианта</div>
                <img src="/img/checkbox/true.png" alt="" />
                <div class="interactive second-column" draggable="true" id="quest5choice1">Вариант 1</div>

                <div>Текст варианта</div>
                <img src="/img/checkbox/false.png" alt="" />
                <div class="interactive second-column" draggable="true" id="quest5choice2">Вариант 2</div>

                <div>Текст варианта</div>
                <img src="/img/checkbox/false.png" alt="" />
                <div class="interactive second-column" draggable="true" id="quest5choice3">Вариант 3</div>

                <div>Текст варианта</div>
                <img src="/img/checkbox/false.png" alt="" />
                <div class="interactive second-column" draggable="true" id="quest5choice4">Вариант 4</div>
            </div>
        </div>

        <div class="test--button">
            <button class="button button__blue button__bold">Назад</button>
        </div>
    </main>
@endsection

