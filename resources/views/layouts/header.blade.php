<div class="w-full h-fit p-4">
    <div class="flex flex-row justify-between">
        <x-application-logo fill="#064789"/>
        <div class="flex flex-row justify-between items-center gap-4">
            @if(auth()->check())
                <livewire:dropdown/>
            @else
                <x-button>Contactez-nous!</x-button>
            @endif
        </div>
    </div>
</div>
