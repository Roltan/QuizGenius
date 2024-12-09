<div class="quest quest__choice">
    <span>{{$quest}}</span>
    <div>
        @foreach ($answers as $key => $answer)
            <div class="input input__{{ $is_multiple ? 'checkbox' : 'radio' }}">
                <input
                    type="{{ $is_multiple ? 'checkbox' : 'radio' }}"
                    name="quest{{$id}}" id="quest{{$id}}choice{{$key}}"
                    class="input--field"
                    {{$disabled ?? ''}}
                    {{$answer['checked'] ? 'checked' : ''}}
                />
                <label for="quest{{$id}}choice{{$key}}">{{$answer['label']}}</label>
            </div>
        @endforeach
    </div>
</div>
