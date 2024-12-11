@switch($type)
    @case('choice')

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
