<div class="quest quest__relation">
    <span>{{$quest}}</span>
    <div class="quest__relation--grid">
        @php
            if(!isset($disable)){
                // Перемешиваем массив ответов случайным образом
                shuffle($second_column);
            }
        @endphp

        @for ($i = 0; $i < count($first_column); $i++)
            <div>{{$first_column[$i]}}</div>
            <div class="interactive second-column" id="quest{{$id}}relation{{$i}}">{{$second_column[$i]}}</div>
        @endfor
    </div>
</div>
