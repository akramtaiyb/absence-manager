@props([
    "type" => "submit",
    "text",
    "class" => null,
    "color" => "primary",
    "attributes",
    "disabled" => null,
])

@php
    $_color = "";
@endphp

@switch($color)
    @case("primary")
        @php
            $_color = "text-[var(--white)] bg-[var(--blue)] hover:bg-[var(--bluesky)]"
        @endphp
        @break
    @case("white")
        @php
            $_color = "text-[var(--blue)] text-md font-normal bg-[var(--white)] hover:bg-[var(--blue)] hover:text-[var(--white)] hover:border-[var(--blue)] border border-[var(--gray)] py-1 px-2"
        @endphp
        @break
    @case("danger")
        @php
            $_color = "text-[var(--white)] bg-[var(--red)] hover:bg-[var(--dark-red)]"
        @endphp
        @break
@endswitch

<button {{$attributes}} class="{{$_color}} {{$class}} font-[600] text-left py-2 px-4 transition ease-in-out delay-50 disabled:text-gray-400 disabled:hover:bg-white disabled:hover:border-[var(--gray)]"
        type="{{$type}}"
        {{$disabled}}
>
    {{ $slot }}
</button>
