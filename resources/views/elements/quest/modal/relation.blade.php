<div class="input">
    <label for="questEdit{{$id}}Quest">Задание</label>
    <input type="text" name="questEdit{{$id}}Quest" id="questEdit{{$id}}Quest" class="input--field" value="{{$quest}}"/>
</div>
<div class="answer answer__relation">
    @for ($i = 0; $i < count($first_column); $i++)
        <div class="input">
            <input type="text" name="questEdit{{$id}}FirstColumn{{$i}}" id="questEdit{{$id}}FirstColumn{{$i}}" class="input--field" value="{{$first_column[$i]}}"/>
        </div>
        <div class="input">
            <input type="text" name="questEdit{{$id}}SecondColumn{{$i}}" id="questEdit{{$id}}SecondColumn{{$i}}" class="input--field" value="{{$second_column[$i]}}"/>
        </div>
    @endfor
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

