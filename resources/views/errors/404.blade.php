@extends("layouts.app")
@section("main")
    <div class="flex justify-center items-center h-[84vh]">
        <div class="w-[74%] flex flex-col justify-center items-center">
            <div class="text-3xl text-center font-[600]">Nous sommes désolés, la page que vous avez demandée est
                introuvable.
            </div>
            <div class="text-3xl text-center">
                L’URL est peut-être mal orthographiée ou la page que vous recherchez n’est plus disponible.
                @dump(\Illuminate\Support\Facades\Route::current())
            </div>
            <div class="mt-10">
                <img width="82" src="/assets/404.png" alt="page_introuvable">
            </div>
        </div>
    </div>
@endsection
