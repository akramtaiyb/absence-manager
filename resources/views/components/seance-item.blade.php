@props([
    "item",
    "class" => null,
])

@if($item)
    <div class="{{$class}} w-96 flex flex-col">
        <div class="flex flex-row justify-between items-center text-2xl font-bold">
            <div>
                {{$item->start_time}}
            </div>
            <div>
                {{$item->groupe->label}}
            </div>
            <div>
                {{$item->end_time}}
            </div>
        </div>
        <div class="flex flex-row justify-between items-center py-1 px-2 bg-[var(--blue)] text-[var(--white)] font-semibold">
            <div>
                {{$item->label}}
            </div>
            <a href="{{route('seances.edit', $item->id)}}" title="Consulter/Editer">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 13L19.25 1.75L22.25 4.75L11 16H8V13Z" fill="var(--white)"/>
                    <path d="M4 5H10V3H2V22H21V14H19V20H4V5Z" fill="var(--white)"/>
                </svg>
            </a>
        </div>
        <div class="p-2 border border-t-0 border-[var(--blue)]">
            {{$item->module->code}}: {{$item->module->title}}
        </div>
        @php
            $now = \Carbon\Carbon::now();
            $start_time = \Carbon\Carbon::createFromFormat("H:i", $item->start_time);
            $end_time = \Carbon\Carbon::createFromFormat("H:i", $item->end_time);
        @endphp

        @if($item->marked())
            <div class="p-2 bg-green-100 text-[var(--green)] font-medium mt-2">
                <svg class="inline" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.4706 15.918L12.5084 17.9054L23.7067 6.70706L22.2924 5.29285L12.4907 15.0946L11.8849 14.5037L10.4706 15.918Z"
                        fill="var(--green)"/>
                    <path
                        d="M17.2067 6.70706L15.7925 5.29285L5.99517 15.0901L1.70225 10.8504L0.296875 12.2734L6.00395 17.9098L17.2067 6.70706Z"
                        fill="var(--green)"/>
                </svg>
                <div class="inline">
                    Absence marquée
                </div>
            </div>
        @else
            <div class="p-2 bg-orange-100 text-[var(--red)] font-medium mt-2">
                <svg class="inline" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M12.0001 1L0.453125 21H23.5471L12.0001 1ZM13.0668 9.63182L12.8798 14.0065H11.1252L10.9334 9.63182H13.0668ZM12.0025 17.5746C11.6861 17.5746 11.4144 17.4628 11.1875 17.2391C10.9606 17.0121 10.8488 16.7405 10.8519 16.4241C10.8488 16.1109 10.9606 15.8424 11.1875 15.6187C11.4144 15.395 11.6861 15.2831 12.0025 15.2831C12.3061 15.2831 12.573 15.395 12.8031 15.6187C13.0332 15.8424 13.1499 16.1109 13.1531 16.4241C13.1499 16.635 13.094 16.8284 12.9853 17.0042C12.8798 17.1767 12.7408 17.3158 12.5682 17.4212C12.3956 17.5235 12.2071 17.5746 12.0025 17.5746Z"
                          fill="var(--red)"/>
                </svg>
                <div class="inline">
                    L'absence n'est pas encore marquée
                </div>
            </div>
        @endif
    </div>
@endif
