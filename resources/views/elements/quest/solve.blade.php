@switch($type)
    @case('choice')
        @include('/elements/quest/type/choice', [
            'quest'=>$quest,
            'id'=>$id,
            'is_multiple'=> $is_multiple,
            'answers'=>$answers
        ])
        @break
    @case('blank')
        @include('/elements/quest/type/blank', [
            'id'=>$id,
            'quest'=>$quest
        ])
        @break
    @case('fill')
        @include('/elements/quest/type/fill', [
            'id'=>$id,
            'quest'=>$quest,
            'options'=>$options
        ])
        @break
    @case('relation')
        @include('/elements/quest/type/relation', [
            'quest' => $quest,
            'id'=>$id,
            'first_column'=>$first_column,
            "second_column"=> $second_column
        ])
        @break
@endswitch
