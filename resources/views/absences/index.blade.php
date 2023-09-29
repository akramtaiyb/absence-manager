@extends("dashboard")

@section("title")
    <div class="sticky top-0 text-xl font-bold bg-[var(--white)]">
        Liste des absences
    </div>
@endsection

@if(session()->has("groupe_id"))
    @php($groupe_id = session()->get("groupe_id"))
@endif

@section("content")
    @dump(session()->has("groupe_id"), $groupe_id)
    <form method="POST" action="{{route('absences.list')}}">
        @csrf
        <div class="h-max flex flex-row gap-4">
            <div>
                <div class="text-md font-[500]">
                    <div>
                        Groupe
                    </div>
                    <select wire:model="updateGroupeId" name="groupe_id" class="p-1 w-full border border-[var(--blue)]">
                        @foreach($groupes as $key => $val)
                            <option value="{{$key}}" {{($groupe_id == $key) ? 'selected' : null}}>
                                {{$val}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="text-md font-[500]">
                    <div>
                        Seance
                    </div>
                    <select wire:model="seanceId" name="seance_id" class="p-1 w-full border border-[var(--blue)]">
                        @foreach($seances as $seance)
                            <option value="{{$seance->id}}" {{($seances->first()->id == $key) ? 'selected' : null}}>
                                {{$seance->label}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div></div>
        </div>
        <x-button>
            Rechercher
        </x-button>
    </form>
    {{--    <livewire:absences-table wire:init="setGroupeId({{}})" />--}}
    @livewire('absences-table', ['groupeId' => $groupe_id ?? 1])
@endsection
