<div class="quest__edit">
    @switch($type)
        @case('choice')
            @include('/elements/quest/choice', [
                'quest'=>$quest,
                'id'=>$id,
                'is_multiple'=> $is_multiple,
                'disabled'=>'disabled',
                'answers'=>$answers
            ])
            @break
    @endswitch
    <div class="buttons">
        <button>
            <img src="/img/edit/reset.png" alt="" />
        </button>
        <button>
            <img src="/img/edit/edit.png" alt="" class="openModalBtn" data-modal="questEdit{{$id}}" />
        </button>
        <button>
            <img src="/img/edit/delet.png" alt="" />
        </button>
    </div>
</div>
<div class="modalka modalka--wrapper" id="questEdit{{$id}}">
    <form class="quest--modal form">
        @switch($type)
        @case('choice')
            @include('/elements/quest/modal/choice', [
                'quest'=>$quest,
                'id'=>$id,
                'is_multiple'=> $is_multiple,
                'answers'=>$answers
            ])
            @break
    @endswitch
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
