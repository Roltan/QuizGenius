@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/index.css" />
    <script defer src="/js/modal.js"></script>
@endsection

@section('mainContent')
    @include('block.header')

    <figure class="background"></figure>

    <main class="container">
        <div class="slogan">Создайте свой тест за считанные минуты!</div>

        <div class="index--main">
            <section class="descriptions">
                <div>
                    <img src="/img/index/1666071.png" alt="" />
                    <span>Разнообразные тематики</span>
                </div>
                <div>
                    <img src="/img/index/125375123.png" alt="" />
                    <span>Подробная статистика ответов</span>
                </div>
                <div>
                    <img src="/img/index/123671253.png" alt="" />
                    <span>Экономия времени</span>
                </div>
                <div>
                    <img src="/img/index/7036414.png" alt="" />
                    <span>Обширная база вопросов</span>
                </div>
            </section>
            <div class="line"></div>
            <form class="form">
                <div>
                    <div class="input">
                        <label for="overCount">Количество вопросов</label>
                        <input type="text" name="overCount" id="overCount" class="input--field" />
                    </div>
                    @include('/elements/input/selector', [
                        'name'=>'topic',
                        'label'=>'Выберете тему',
                        'options'=>[
                            'тема 1',
                            'тема 2',
                            'тема 3',
                            'тема 4',
                        ]
                    ])
                </div>

                <button type="submit" class="button button__blue button__bold">Сгенерировать</button>
            </form>
        </div>
    </main>
@endsection
