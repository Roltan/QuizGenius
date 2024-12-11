@switch($type)
    @case('choice')
        @include('/elements/quest/type/choice', [
            'quest'=>$quest,
            'id'=>$id,
            'is_multiple'=> $is_multiple,
            'disabled'=>'disabled',
            'answers'=>$answers
        ])
        @break
    @case('blank')
        @include('/elements/quest/type/blank', [
            'id'=>$id,
            'quest'=>$quest,
            'disabled'=>'disabled',
            'answer'=>$answer,
            'isCorrect'=>($isCorrect ?? false)
        ])
        @break
    @default
@endswitch
