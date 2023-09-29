@extends("dashboard")

@section("title")
    <div class="text-xl">
        <x-link type="nav" href="{{route('stagiaires.index')}}" title="Listes des stagiaires">Stagiaires</x-link> > Ajouter
    </div>
@endsection

@section("content")
    <form class="w-96 flex flex-col gap-2" method="POST" action="{{route('stagiaires.store')}}">
        @csrf
        <x-input name="first_name" label="Nom" />
        <x-input name="last_name" label="Prénom" />
        <x-select-input name="groupe_id" label="Groupe" :options="$groupes"/>
        <x-button class="w-fit">
            Ajouter
        </x-button>
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
    </form>
@endsection
