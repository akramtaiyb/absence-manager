@extends("dashboard")

@section("title")
    <div class="sticky top-0 text-xl font-bold bg-[var(--white)]">
        Séances > <span class="font-normal">{{$seance->date}} > {{$seance->label}}</span>
    </div>
@endsection

@section("director-info")
    <div class="flex flex-row justify-between items-center gap-8">
        <form method="HEAD" action="{{route('seances.create')}}">
            <x-button color="danger">
                Supprimer
            </x-button>
        </form>
        <form method="HEAD" action="{{route('seances.create')}}">
            <x-button>
                Consulter l'absence
            </x-button>
        </form>
    </div>
@endsection

@section("content")
    <form class="w-[60%] h-96 flex flex-col flex-wrap gap-y-2 gap-x-4" method="POST"
          action="{{route('seances.update', $seance->id)}}">
        @method("PATCH")
        @csrf
        <div class="w-96 flex flex-col gap-2">
            <x-input name="label" label="Libellé" :value="$seance->label"/>
            <x-select-input name="module_id" label="Module" :value="$seance->module->code" :options="$modules"/>
            <x-select-input name="groupe_id" label="Groupe" :value="$seance->groupe->label" :options="$groupes"/>
            <div class="w-full px-3 py-2 text-sm text-[var(--red)] flex flex-row gap-4">
                <svg class="w-fit" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M12.0001 1L0.453125 21H23.5471L12.0001 1ZM13.3401 9.63182L13.0908 13.8818H10.9047L10.6554 9.63182H13.3401ZM11.9977 17.6034C11.627 17.6034 11.309 17.474 11.0437 17.2151C10.7816 16.953 10.6522 16.635 10.6554 16.2611C10.6522 15.8967 10.7816 15.5851 11.0437 15.3262C11.309 15.0674 11.627 14.9379 11.9977 14.9379C12.3493 14.9379 12.6593 15.0674 12.9278 15.3262C13.1994 15.5851 13.3369 15.8967 13.3401 16.2611C13.3369 16.5104 13.2713 16.7373 13.1435 16.9418C13.0189 17.1432 12.8559 17.3046 12.6545 17.426C12.4532 17.5443 12.2342 17.6034 11.9977 17.6034Z"
                          fill="var(--red)"/>
                </svg>
                <div class="w-fit">
                    Si vous avez apporté des modifications au groupe, toutes les absences enregistrées en son nom pour
                    cette
                    séance seront effacées.
                </div>
            </div>
            <x-select-input name="type" label="Type" :value="$seance->type" :options="['en ligne' => 'en ligne', 'présentielle' => 'présentielle']" />
        </div>
        <div class="w-96 flex flex-col gap-2">
            <x-input name="date" type="date" label="Date" :value="$seance->date"/>
            <x-input name="start_time" type="time" label="Début" :value="$seance->start_time"/>
            <x-input name="end_time" type="time" label="Fin" :value="$seance->end_time"/>
        </div>
        <x-button class="w-fit mt-4">
            Modifier
        </x-button>
    </form>
    @if($errors->has('error'))
        <div class="text-[var(--red)]">
            {{ $errors->first('error') }}
        </div>
    @endif
    @if(session()->has("message"))
        <div class="text-[var(--green)]">
            {{session()->get("message")}}
        </div>
    @endif
@endsection
