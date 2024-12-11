<div class="quest quest__fill">
    @php
        // Разбиваем текст на части по шаблону "s?:{индекс}"
        $parts = preg_split('/(s\?:[0-9]+)/', $quest, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
    @endphp

    @foreach ($parts as $part)
        @if (preg_match('/^s\?:([0-9]+)$/', $part, $matches))
            <!-- Это селектор -->
            @php
                $index = (int)$matches[1]; // Индекс селектора
                $optionsForSelector = $options[$index] ?? []; // Получаем массив опций по индексу
                $selectedOption = null;

                // Если передан параметр 'disabled', выбираем вариант с "correct" => true
                if (isset($disabled)) {
                    foreach ($optionsForSelector as $option) {
                        if ($option['correct']) {
                            $selectedOption = $option['str'];
                            break;
                        }
                    }
                } else {
                    // Если 'disabled' не передан, перемешиваем варианты
                    shuffle($optionsForSelector);
                }
            @endphp
            <span class="input input__little">
                <select
                    name="quest{{ $id }}choice{{ $index }}"
                    id="quest{{ $id }}choice{{ $index }}"
                    class="input--field" {{ $disabled ?? '' }}
                >
                    <option value="" disabled selected hidden>вариант</option>
                    @foreach ($optionsForSelector as $option)
                        <option
                            value="{{ $option['str'] }}"
                            {{ ($selectedOption && $option['str'] === $selectedOption) ? 'selected' : ($option['correct'] ? 'selected' : '') }}
                        >
                            {{ $option['str'] }}
                        </option>
                    @endforeach
                </select>
            </span>
        @else
            <!-- Это обычный текст -->
            {{ $part }}
        @endif
    @endforeach
</div>
