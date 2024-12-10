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

        <div class="quest__edit">
            <div class="quest quest__blank">
                <span>задание задание задание задание задание задание задание задание задание задание задание задание задание</span>
                <div class="input">
                    <label for="quest3">Ответ</label>
                    <input type="text" name="quest3" id="quest3" class="input--field" disabled />
                </div>
            </div>
            <div class="buttons">
                <button>
                    <img src="/img/edit/reset.png" alt="" />
                </button>
                <button>
                    <img src="/img/edit/edit.png" alt="" class="openModalBtn" data-modal="questEdit2" />
                </button>
                <button>
                    <img src="/img/edit/delet.png" alt="" />
                </button>
            </div>
        </div>
        <div class="modalka modalka--wrapper" id="questEdit2">
            <form class="quest--modal form">
                <div class="input">
                    <label for="questEdit2Quest">Задание</label>
                    <input type="text" name="questEdit2Quest" id="questEdit2Quest" class="input--field" />
                </div>
                <div class="answer answer__blank">
                    <div class="input">
                        <label for="questEdit2answer">Ответ</label>
                        <input type="text" name="questEdit2answer" id="questEdit2answer" class="input--field" />
                    </div>
                </div>
                <div class="test--button test--button__max">
                    <button class="test--add test--add__light">
                        <div>
                            <img src="/img/edit/add.png" alt="" />
                        </div>
                        Добавить вопрос
                    </button>
                    <button class="button button__blue button__bold">Сохранить</button>
                </div>
            </form>
        </div>

        <div class="quest__edit">
            <div class="quest quest__fill">
                задание задание задание задание задание задание
                <span class="input input__little">
                    <select name="quest4choice1" id="quest4choice1" class="input--field" disabled>
                        <option value="" disabled selected hidden>вариант</option>
                        <option value="1">тема 1</option>
                        <option value="2">тема 2</option>
                        <option value="3">тема 3</option>
                        <option value="4">тема 4</option>
                    </select>
                </span>
                задание задание задание задание задание задание
                <span class="input input__little">
                    <select name="quest4choice2" id="quest4choice2" class="input--field" disabled>
                        <option value="" disabled selected hidden>вариант</option>
                        <option value="1">тема 1</option>
                        <option value="2">тема 2</option>
                        <option value="3">тема 3</option>
                        <option value="4">тема 4</option>
                    </select>
                </span>
                задание задание задание задание задание задание задание задание задание задание задание задание задание
                <span class="input input__little">
                    <select name="quest4choice2" id="quest4choice2" class="input--field" disabled>
                        <option value="" disabled selected hidden>вариант</option>
                        <option value="1">тема 1</option>
                        <option value="2">тема 2</option>
                        <option value="3">тема 3</option>
                        <option value="4">тема 4</option>
                    </select>
                </span>
                задание задание задание
            </div>
            <div class="buttons">
                <button>
                    <img src="/img/edit/reset.png" alt="" />
                </button>
                <button>
                    <img src="/img/edit/edit.png" alt="" class="openModalBtn" data-modal="questEdit3" />
                </button>
                <button>
                    <img src="/img/edit/delet.png" alt="" />
                </button>
            </div>
        </div>
        <div class="modalka modalka--wrapper" id="questEdit3">
            <form class="quest--modal form">
                <span> В поле ввода напишите текст задания. В местах где хотите сделать выбор ответа, напишите варианты разделяя их “;” и заключив в <>. Пример <вариант 1;вариант 2;вариант 3> </span>
                <div class="input">
                    <label for="questEdit2Quest">Задание</label>
                    <textarea type="text" name="questEdit2Quest" id="questEdit2Quest" class="input--field"> </textarea>
                </div>
                <div class="test--button">
                    <button class="button button__blue button__bold">Сохранить</button>
                </div>
            </form>
        </div>

        <div class="quest__edit">
            <div class="quest quest__relation">
                <span>задание задание задание задание задание задание задание задание задание задание задание задание задание</span>
                <div class="quest__relation--grid">
                    <div>Текст варианта</div>
                    <div class="interactive second-column" id="quest5choice1">Вариант 1</div>

                    <div>Текст варианта</div>
                    <div class="interactive second-column" id="quest5choice2">Вариант 2</div>

                    <div>Текст варианта</div>
                    <div class="interactive second-column" id="quest5choice3">Вариант 3</div>

                    <div>Текст варианта</div>
                    <div class="interactive second-column" id="quest5choice4">Вариант 4</div>
                </div>
            </div>
            <div class="buttons">
                <button>
                    <img src="/img/edit/reset.png" alt="" />
                </button>
                <button>
                    <img src="/img/edit/edit.png" alt="" class="openModalBtn" data-modal="questEdit4" />
                </button>
                <button>
                    <img src="/img/edit/delet.png" alt="" />
                </button>
            </div>
        </div>
        <div class="modalka modalka--wrapper" id="questEdit4">
            <form class="quest--modal form">
                <div class="input">
                    <label for="questEdit2Quest">Задание</label>
                    <input type="text" name="questEdit2Quest" id="questEdit2Quest" class="input--field" />
                </div>
                <div class="answer answer__relation">
                    <div class="input">
                        <input type="text" name="" id="" class="input--field" />
                    </div>
                    <div class="input">
                        <input type="text" name="" id="" class="input--field" />
                    </div>
                    <div class="input">
                        <input type="text" name="" id="" class="input--field" />
                    </div>
                    <div class="input">
                        <input type="text" name="" id="" class="input--field" />
                    </div>

                    <div class="input">
                        <input type="text" name="" id="" class="input--field" />
                    </div>
                    <div class="input">
                        <input type="text" name="" id="" class="input--field" />
                    </div>
                    <div class="input">
                        <input type="text" name="" id="" class="input--field" />
                    </div>
                    <div class="input">
                        <input type="text" name="" id="" class="input--field" />
                    </div>
                </div>
                <div class="test--button test--button__max">
                    <button class="test--add test--add__light">
                        <div>
                            <img src="/img/edit/add.png" alt="" />
                        </div>
                        Добавить пару
                    </button>
                    <button class="button button__blue button__bold">Сохранить</button>
                </div>
            </form>
        </div>

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
