<div class="quest quest__blank">
    <span>{{$quest}}</span>
    <div class="input">
        <label for="quest{{$id}}">Ответ</label>
        <input
            type="text"
            name="quest{{$id}}"
            id="quest{{$id}}"
            class="input--field"
            {{$disabled ?? ''}}
            @php
                if(isset($disabled))
                    return 'value='.is_array($answer) ? implode(' / ', $answer) : $answer;
            @endphp
        />
    </div>
</div>
