@props([
    "name" => null,
    "label" => null,
    "value" => null,
    "sub" => null,
    "options" => [],
])

<div class="text-md font-[500]">
    <div>
        {{$label}}
    </div>
    <select name="{{$name}}" value="{{$value}}" class="p-1 w-full border border-[var(--blue)]">
        @foreach($options as $key => $val)
            <option value="{{$key}}" {{($value == $val) ? 'selected' : null}}>
                {{$val}}
            </option>
        @endforeach
    </select>
    <div class="text-xs">
        {{$sub}}
    </div>
</div>
