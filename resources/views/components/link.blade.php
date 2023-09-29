@props([
    "class" => null,
    "href" => "#",
    "title" => null,
    "type" => null,
])

<a class="font-[300] {{$type == 'nav' ? 'font-bold hover:text-[var(--bluesky)]' : 'underline hover:text-[var(--green)] hover:decoration-[var(--green)]' }} text-[var(--blue)] {{$class}} transition ease-in-out delay-50"
   href="{{$href}}"
   title="{{$title}}"
>
    {{$slot}}
</a>
