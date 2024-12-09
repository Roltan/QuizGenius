@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/create.css" />
    <script defer src="/js/modal.js"></script>
@endsection

@section('mainContent')
    @include('/block/header_lk', ['active'=>2])

    <figure class="background"></figure>

    <main class="container">
        @include('/block/navLK', ['active'=>2])

        <div class="main">
            <form>
                <div class="input input__dark">
                    <label for="name">Название</label>
                    <input type="text" name="name" id="name" class="input--field" />
                </div>

                <section>
                    <div>
                        <h1>Количество вопросов</h1>
                        <div class="input--wrap__img">
                            <img src="/img/create/choice.png" alt="" />
                            <div class="input input__dark">
                                <label for="choice">С выбором</label>
                                <input type="text" placeholder="число" name="choice" id="choice" class="input--field" />
                            </div>
                        </div>
                        <div class="input--wrap__img">
                            <img src="/img/create/blank.png" alt="" />
                            <div class="input input__dark">
                                <label for="blank">С бланком</label>
                                <input type="text" placeholder="число" name="blank" id="blank" class="input--field" />
                            </div>
                        </div>
                        <div class="input--wrap__img">
                            <img src="/img/create/relation.png" alt="" />
                            <div class="input input__dark">
                                <label for="relation">На соотношение</label>
                                <input type="text" placeholder="число" name="relation" id="relation" class="input--field" />
                            </div>
                        </div>
                        <div class="input--wrap__img">
                            <img src="/img/create/fill.png" alt="" />
                            <div class="input input__dark">
                                <label for="fill">На заполнение</label>
                                <input type="text" placeholder="число" name="fill" id="fill" class="input--field" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <h1>Общее</h1>
                        @include('/elements/input/selector', [
                            'name'=>'topic',
                            'label'=>'Выберете тему',
                            'class' => 'input__dark',
                            'options'=>[
                                'тема 1',
                                'тема 2',
                                'тема 3',
                                'тема 4',
                            ]
                        ])
                        <div class="input input__dark">
                            <label for="overCount">Количество вопросов</label>
                            <input type="text" placeholder="число" name="overCount" id="overCount" class="input--field" />
                        </div>
                    </div>
                </section>

                <button type="submit" class="button button__blue button__bold">Сгенерировать</button>
            </form>
        </div>
    </main>
@endsection
