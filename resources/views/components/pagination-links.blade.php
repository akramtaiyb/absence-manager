@if($paginator->hasPages())
    <div class="flex justify-start gap-2 mt-2" role="pagination">
        <!-- Previous -->
        <x-button wire:click="previousPage" :disabled="$paginator->onFirstPage() ? 'disabled' : null" color="white">
            « Précedent
        </x-button>

        <!-- Numbers -->

        @if(is_array($elements))
            @foreach($elements[0] as $page => $url)
                <x-button wire:click="gotoPage({{$page}})"
                          :disabled="$page == $paginator->currentPage() ? 'disabled' : null" color="white">
                    {{$page}}
                </x-button>
            @endforeach
        @endif

        <!-- Next -->
        <x-button wire:click="nextPage" :disabled="$paginator->onLastPage() ? 'disabled' : null" color="white">
            Suivant »
        </x-button>
    </div>
@endif
