@extends("layouts.app")
@section("main")
    <div class="w-full my-12 h-full flex flex-col items-center gap-20">
        <div class="min-w-[400px]">
            <div class="w-full text-left text-3xl font-[800]">Se connecter</div>
            <div class="text-sm">
                Gardez le contrôle, réduisez les absences et restez organisé(e) !
            </div>
            <form method="POST" action="{{route('login')}}" class="mt-6 w-full flex flex-col items-left gap-5">
                @csrf
                <x-input name="email" label="Nom d'utilisateur" type="text"></x-input>
                <x-input name="password" label="Mot de passe" type="password"></x-input>
                <div class="mt-4 flex flex-row justify-between items-center">
                    <x-link>
                        Mot de passe oublié?
                    </x-link>
                    <x-button>
                        Se connecter
                    </x-button>
                </div>
                @if(auth()->check())
                    <div class="text-[var(--green)]">CONNECTED</div>
                @else
                    @if($errors->any())
                        <div class="text-red-500">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endif
            </form>
        </div>
    </div>
@endsection
