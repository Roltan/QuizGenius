@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/test.css" />
    <script defer src="/js/modal.js"></script>
    <script defer src="/js/drag.js"></script>
@endsection

@section('mainContent')
    @include('/block/header_lk', ['notNav'=>true])

    <figure class="background"></figure>

    <main class="container">
        <h1 class="main--header">Название теста</h1>

        @include('/elements/quest/solve', [
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

        @include('/elements/quest/solve', [
            'type' => 'choice',
            'id'=> 2,
            'quest'=>'задание задание задание задание задание задание задание задание задание задание задание задание задание',
            'is_multiple'=> 1,
            'answers'=>[
                [
                    'id'=>1,
                    'label'=>'label',
                    'checked'=>1
                ],
                [
                    'id'=>2,
                    'label'=>'label',
                    'checked'=>0
                ],
                [
                    'id'=>3,
                    'label'=>'label',
                    'checked'=>0
                ],
                [
                    'id'=>4,
                    'label'=>'label',
                    'checked'=>1
                ],
            ]
        ])

        @include('/elements/quest/solve', [
            'type' => 'blank',
            'id'=>3,
            'quest'=>'задание задание задание задание задание задание задание задание задание задание задание задание задание'
        ])

        @include('/elements/quest/solve', [
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

        @include('/elements/quest/solve', [
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

        <div class="test--button">
            <button class="button button__blue button__bold">Завершить тест</button>
        </div>
    </main>
@endsection
