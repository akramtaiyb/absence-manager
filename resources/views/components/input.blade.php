@props([
    "name" => null,
    "label" => null,
    "type" => "text",
    "placeholder" => null,
    "value" => null,
    "min" => null,
    "max" => null,
    "class" => null,
    "error" => null,
])

<div class="{{$class}}">
    <label class="text-md font-[500]">
        {{$label}} <br />
        <input class="w-full p-1 border border-[var(--blue)]" name="{{$name}}" min="{{$min}}" max="{{$max}}" type="{{$type}}" placeholder="{{$placeholder}}" value="{{$value}}" />
    </label>
</div>
