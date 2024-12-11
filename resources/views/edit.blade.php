@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/test.css" />
    <script defer src="/js/modal.js"></script>
@endsection

@section('mainContent')
    @include('/block/header_lk', ['notNav'=>true])

    <figure class="background"></figure>

    <main class="container">
        <div class="settings">
            <h1>Настройки теста</h1>
            <div class="input">
                <label for="title">Название теста</label>
                <input type="text" name="title" id="title" class="input--field" />
            </div>
            <div class="input input__radio">
                <input type="checkbox" name="only_user" id="only_user" class="input--field toggle" />
                <label for="only_user">Только авторизованные тестируемые</label>
            </div>
            <div class="input input__radio">
                <input type="checkbox" name="leave" id="leave" class="input--field toggle" />
                <label for="leave">Запретить переключать страницу</label>
            </div>
            @include('/elements/input/selector', [
                'name'=>'access',
                'label'=>'Доступ по',
                'options'=>[
                    'ссылке',
                ]
            ])
        </div>

        @include('/elements/quest/edit', [
            'type' => 'choice',
            'id'=> 1,
            'quest'=>'задание задание задание задание задание задание задание задание задание задание задание задание задание',
            'is_multiple'=> 0,
            'answers'=>[
                [
                    'label'=>'label',
                    'checked'=>0
                ],
                [
                    'label'=>'label',
                    'checked'=>0
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

        @include('/elements/quest/edit', [
            'type' => 'choice',
            'id'=> 2,
            'quest'=>'задание задание задание задание задание задание задание задание задание задание задание задание задание',
            'is_multiple'=> 1,
            'answers'=>[
                [
                    'label'=>'label',
                    'checked'=>1
                ],
                [
                    'label'=>'label',
                    'checked'=>0
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

        @include('/elements/quest/edit', [
            'type' => 'blank',
            'id'=>3,
            'quest'=>'задание задание задание задание задание задание задание задание задание задание задание задание задание',
            'answer'=>'ответ'
        ])

        @include('/elements/quest/edit', [
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
        ])

        @include('/elements/quest/edit', [
            'type'=>'relation',
            'id'=>5,
            'quest'=>'Манилов совершенно растерялся. Он чувствовал, что — боже храни. — Однако ж согласитесь сами: ведь это не — отдавал хозяин. Я ему сулил каурую кобылу, которую, помнишь, выменял — у Хвостырева… — Чичиков, впрочем, отроду не видел ни каурой кобылы, — ни груша, ни слива, ни иная ягода, до которого, впрочем, не без удовольствия взглянул на стены и на ноги его, походившие на чугунные тумбы, которые ставят на тротуарах, не мог получить такого блестящего образования, — какое, так сказать, паренье.',
            "first_column"=> [
                "Voluptatem rerum.",
                "Nostrum cumque optio.",
                "Nisi amet.",
                "Recusandae ad.",
                "Officiis tempore alias."
            ],
            "second_column"=> [
                "Dolorem nisi.",
                "Molestias ut.",
                "Illo dolorem.",
                "Cum repellat.",
                "Non vel natus."
            ]
        ])

        <div class="test--button test--button__max">
            <button class="test--add">
                <div>
                    <img src="/img/edit/add.png" alt="" />
                </div>
                Добавить вопрос
            </button>
            <button class="button button__blue button__bold">Сохранить тест</button>
        </div>
    </main>
@endsection
