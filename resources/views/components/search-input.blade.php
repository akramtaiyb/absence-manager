@props([
    "name" => "query",
    "class" => null,
    "attributes" => null,
])

<div class="{{$class}} w-96" {{$attributes}}>
    <label class="font-[400]">
        <input class="w-full py-2 px-4 border border-[var(--gray)]" name="{{$name}}" type="search" placeholder="Rechercher.." />
    </label>
</div>
