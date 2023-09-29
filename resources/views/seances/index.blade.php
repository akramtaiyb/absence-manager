@extends("dashboard")

@section("title")
    <div class="sticky top-0 text-xl font-bold bg-[var(--white)]">
        Séances
    </div>
@endsection

@section("director-info")
    <div class="flex flex-row justify-between items-center gap-8">
        <form method="HEAD" action="{{route('seances.create')}}">
            <x-button>
                Ajouter
            </x-button>
        </form>
        <div class="flex flex-row justify-around items-center gap-2">
            <div>
                <svg width="34" height="34" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 4.99997V2.99997H8V4.99997H16V2.99997H18V4.99997H22V8.99997H2V4.99997H6Z"
                          fill="var(--blue)"/>
                    <path d="M2 11H22V21H2V11Z" fill="var(--bluesky)"/>
                </svg>
            </div>
            <div class="text-3xl font-bold">
                {{$count}}
            </div>
        </div>
    </div>
@endsection

@section("content")
    <div class="h-max flex flex-row justify-between items-start gap-8">
        <div class="w-[25%] pr-4 border-r">
            <div class="text-lg font-bold">
                Aujourd'hui
            </div>
            @if(false)
                <div class="flex flex-col items-center justify-center gap-6 h-96">
                    <img src="/assets/urban-wall-calendar.gif" alt="aucune_seance_pour_aujourdhui">
                    <div class="text-xl font-light">
                        Aucune séance n'est programmée aujourd'hui.
                    </div>
                </div>
            @else
                <div class="w-full">
                    @foreach($seances as $seance)
                        <x-seance-item class="w-full pb-2 mb-2 border-b" :item="$seance"/>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="w-[75%]">
            <div class="text-lg font-bold">
                Historique
            </div>
            <div class="h-96 overflow-auto">
                <livewire:seances-table />
            </div>
        </div>
    </div>
@endsection
