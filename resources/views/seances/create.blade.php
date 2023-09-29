@extends("dashboard")

@section("title")
    <div class="text-xl">
        <x-link type="nav" href="{{route('seances.index')}}" title="Listes des stagiaires">Séances</x-link> > Ajouter
    </div>
@endsection

@section("content")
    <form class="w-96 flex flex-col gap-2" method="POST" action="{{route('seances.store')}}">
        @csrf
        <x-input name="label" type="text" label="Titre" />
        <x-input name="date" type="date" label="Date" />
        <x-input name="start_time" type="time" label="Début" />
        <x-input name="end_time" type="time" label="Fin" />
        <x-select-input name="module_id" label="Module" :options="$modules" />
        <x-select-input name="groupe_id" label="Type" :options="$groupes" />
        <x-select-input name="type" label="Groupe" :options="['en ligne' => 'en ligne', 'présentielle' => 'présentielle']" />
        <x-button class="w-fit mt-4">
            Ajouter
        </x-button>
    </form>
    @if($errors->any())
        <div class="text-[var(--red)]">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has("message"))
        <div class="text-[var(--green)]">
            {{session()->get("message")}}
        </div>
    @endif
    @dump($errors)
    @dump(session()->has("message"))
@endsection
