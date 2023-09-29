<div>
    <x-search-input wire:model.live.debounce.300ms="search" class="mb-4"/>
    <table class="w-fill border-separate border-spacing-0 overflow-y-auto">
        <thead>
        <tr class="bg-[var(--white)]">
            <th class="w-96 text-left border-b">ID</th>
            <th class="w-96 text-left border-b">Nom</th>
            <th class="w-96 text-left border-b">Prénom</th>
            <th class="w-96 text-left border-b">Groupe</th>
            <th class="w-96 text-left border-b">Taux d'absentéisme</th>
            <th class="w-32 text-left border-b"></th>
        </tr>
        </thead>
        <tbody>
        @if($stagiaires)
            @foreach($stagiaires as $stagiaire)
                <tr class="hover:bg-gray-100">
                    <td class="border-b">
                        {{$stagiaire->id}}
                    </td>
                    <td class="border-b">{{$stagiaire->last_name}}</td>
                    <td class="border-b">{{$stagiaire->first_name}}</td>
                    <td class="border-b">{{$stagiaire->groupe->label}}</td>
                    <td class="border-b">
                        <div class="w-full h-full flex flex-row justify-between items-center gap-2">
                            <div>
                                {{$stagiaire->absenteeismRate()}}%
                            </div>
                            <x-absenteeism-rate-alert :rate="$stagiaire->absenteeismRate()"/>
                        </div>
                    </td>
                    <td class="border-b">
                        <x-link class="w-full py-1 flex flex-row justify-center items-center hover:bg-gray-200"
                                title="Cliquer pour consulter {{$stagiaire->last_name}} {{$stagiaire->first_name}}"
                                href="{{route('stagiaires.show', $stagiaire->id)}}"
                        >
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 5H2V22H19V13H17.5V20.5H3.5V6.5H11V5Z" fill="var(--blue)"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M19.4394 3.5H14.0001V2H22.0001V10H20.5001V4.561L9.53039 15.53L8.46973 14.47L19.4394 3.5Z"
                                      fill="var(--blue)"/>
                            </svg>
                        </x-link>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">:( aucun stagiaire trouvé!</td>
            </tr>
        @endif
        </tbody>
        <tfoot class="w-full">
        <tr class="w-full">
            <td colspan="6">
                {{$stagiaires->links("components.pagination-links")}}
            </td>
        </tr>
        </tfoot>
    </table>
</div>
