<div class="input">
    <label for="questEdit1Quest">Задание</label>
    <input type="text" name="questEdit{{$id}}Quest" id="questEdit{{$id}}Quest" class="input--field" value="{{$quest}}"/>
</div>
<div class="answer">
    @foreach ($answers as $key => $answer)
        <div class="input input__{{ $is_multiple ? 'checkbox' : 'radio' }}">
            <input type="checkbox"
                name="questEdit{{$id}}choice{{$key}}"
                id="questEdit{{$id}}choice{{$key}}"
                class="input--field toggle"
                {{$answer['checked'] ? 'checked' : ''}}
            />
            <label for="questEdit{{$id}}choice{{$key}}">
                <div class="input">
                    <input
                        type="text"
                        name="questEdit{{$id}}choice{{$key}}value"
                        id="questEdit{{$id}}choice{{$key}}value"
                        class="input--field"
                        value="{{$answer['label']}}"
                    />
                </div>
            </label>
        </div>
    @endforeach
</div>
