@extends("layouts.app")
@section("sidebar")
    <div class="w-44 py-4 flex flex-col bg-[var(--blue)]">
        <x-link
            class="text-left text-[var(--white)] font-[600] py-2 px-4 bg-[var(--blue)] hover:bg-[var(--bluesky)] hover:text-[var(--white)] no-underline {{str_contains(Route::currentRouteName(), 'dashboard') ? 'bg-[var(--bluesky)]' : null}}"
            type="button" href="/dashboard">
            Dashboard
        </x-link>
        <x-link
            class="text-left text-[var(--white)] font-[600] py-2 px-4 bg-[var(--blue)] hover:bg-[var(--bluesky)] hover:text-[var(--white)] no-underline {{str_contains(Route::currentRouteName(), 'absences') ? 'bg-[var(--bluesky)]' : null}}"
            type="button" href="/absences">
            Absences
        </x-link>
        <x-link
            class="text-left text-[var(--white)] font-[600] py-2 px-4 bg-[var(--blue)] hover:bg-[var(--bluesky)] hover:text-[var(--white)] no-underline {{str_contains(Route::currentRouteName(), 'seances') ? 'bg-[var(--bluesky)]' : null}}"
            type="button" href="/seances">
            Séances
        </x-link>
        <x-button>
            Modules
        </x-button>
        <x-button>
            Groupes
        </x-button>
        <x-link
            class="text-left text-[var(--white)] font-[600] py-2 px-4 bg-[var(--blue)] hover:bg-[var(--bluesky)] hover:text-[var(--white)] no-underline {{str_contains(Route::currentRouteName(), 'stagiaires') ? 'bg-[var(--bluesky)]' : null}}"
            type="button" href="/stagiaires">
            Stagiaires
        </x-link>
    </div>
@endsection
@section("main")
    <div class="sticky top-0 w-full h-fit flex flex-row justify-between items-center bg-[var(--white)] my-1 z-40">
        <div class="pb-2">
            <div>
                Bonjour, <span
                    class="font-bold">{{auth()->user()->title}} {{strtoupper(auth()->user()->last_name)}}</span>
            </div>
            @yield("title")
        </div>
        <div>
            <!-- Content like number of trainees, date, SVG icon... -->
            @yield("director-info")
        </div>
    </div>
    @yield("content")
@endsection
