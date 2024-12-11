@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/test.css" />
    <script defer src="/js/modal.js"></script>
    <script defer src="/js/drag.js"></script>
@endsection

@section('mainContent')
    @include('block.header')

    <figure class="background"></figure>

    <main class="container">
        <h1 class="main--header">{{$title}}</h1>

        @foreach ($quest as $item)
            @include('/elements/quest/solve', $item)
        @endforeach

        <div class="test--button">
            <button class="button button__blue button__bold">Завершить тест</button>
        </div>
    </main>
@endsection
