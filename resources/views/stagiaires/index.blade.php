@extends("dashboard")

@section("title")
    <div class="sticky top-0 text-xl font-bold bg-[var(--white)]">
        Listes de tous vos stagiaires
    </div>
@endsection

@section("director-info")
    <div class="flex flex-row justify-between items-center gap-8">
        <form method="HEAD" action="{{route('stagiaires.create')}}">
            <x-button>
                Ajouter
            </x-button>
        </form>
        <div class="flex flex-row justify-around items-center gap-2">
            <div>
                <svg width="34" height="34" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_39_1318)">
                        <path d="M12 2L0 9L12 16L22 10.1667V16H24V9L12 2Z" fill="var(--blue)"/>
                        <path d="M12 18L4 13.3333V18.3333L12 23L20 18.3333V13.3333L12 18Z" fill="var(--bluesky)"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_39_1318">
                            <rect width="24" height="24" fill="var(--white)"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="text-3xl font-bold">
                {{$count}}
            </div>
        </div>
    </div>
@endsection

@section("content")
    <div class="w-full pb-12">
        <livewire:stagiaires-table/>
    </div>
@endsection
