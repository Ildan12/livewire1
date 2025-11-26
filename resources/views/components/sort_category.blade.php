<div>
    {{ $field }}
    @if ($field == $sort)
        @if ($direction == 'desc')
            ↑
        @else
            ↓
        @endif

    @else
        ⇅
    @endif

</div>

