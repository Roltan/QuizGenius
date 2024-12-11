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

        <div class="quest quest__choice">
            <span>задание задание задание задание задание задание задание задание задание задание задание задание задание</span>
            <div>
                <div class="input input__radio">
                    <input type="checkbox" name="quest1c1" id="quest2choice1" class="input--field true" disabled checked />
                    <label for="quest2choice1">Label</label>
                </div>
                <div class="input input__radio">
                    <input type="checkbox" name="quest1c2" id="quest2choice2" class="input--field false" disabled checked />
                    <label for="quest2choice2">Label</label>
                </div>
                <div class="input input__radio">
                    <input type="checkbox" name="quest1c3" id="quest2choice3" class="input--field" disabled checked />
                    <label for="quest2choice3">Label</label>
                </div>
                <div class="input input__radio">
                    <input type="checkbox" name="quest1c4" id="quest2choice4" class="input--field" disabled />
                    <label for="quest2choice4">Label</label>
                </div>
            </div>
        </div>

        @include('/elements/quest/answer', [
            'type' => 'blank',
            'id'=>3,
            'quest'=>'задание задание задание задание задание задание задание задание задание задание задание задание задание',
            'answer'=>'ответ',
            'isCorrect'=>false
        ])

        <div class="quest quest__fill">
            задание задание задание задание задание задание
            <span class="input input__little">
                <select name="quest4choice1" id="quest4choice1" class="input--field true" disabled>
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

