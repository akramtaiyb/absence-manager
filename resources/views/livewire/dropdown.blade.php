<div>
    <div>
        <x-button wire:click="toggleDropdown" wire:click.away="awayToggleDropdown">
            {{Auth::user()->title}}
            {{strtoupper(Auth::user()->last_name)}}
        </x-button>
    </div>
    <div
        class="{{ $isOpen ? 'block' : 'hidden' }} absolute z-50 right-4 w-fit ease-in">
        <div class="" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            @foreach($options as $option)
                <form class="flex flex-col justify-end items-end" method="{{$option['method']}}"
                      action="{{route($option['action'])}}">
                    @csrf
                    <x-button color="{{$option['color']}}">
                        {{$option['name']}}
                    </x-button>
                </form>
            @endforeach
        </div>
    </div>
</div>
