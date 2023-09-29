<div>
    <table class="w-fill border-separate border-spacing-0 overflow-y-auto">
        <thead>
        <tr class="bg-[var(--white)]">
            <th class="w-96 text-left border-b">Libelle</th>
            <th class="w-96 text-left border-b">Module</th>
            <th class="w-48 text-left border-b">Date</th>
            <th class="w-24 text-left border-b">Début</th>
            <th class="w-24 text-left border-b">Fin</th>
            <th class="w-32 text-left border-b">Type</th>
            <th class="w-32 text-left border-b">Groupe</th>
            <th class="w-44 text-left border-b">Absence</th>
            <th class="w-16 text-left border-b"></th>
        </tr>
        </thead>
        <tbody>
        @if($all)
            @foreach($all as $seance)
                <tr class="hover:bg-gray-100 text-sm align-top">
                    <td class="border-b pr-2">
                        {{$seance->label}}
                    </td>
                    <td class="border-b pr-2">{{$seance->module->title}}</td>
                    <td class="border-b">{{$seance->date}}</td>
                    <td class="border-b">{{$seance->start_time}}</td>
                    <td class="border-b">
                        {{$seance->end_time}}
                    </td>
                    <td class="border-b">
                        {{$seance->type}}
                    </td>
                    <td class="border-b">
                        {{$seance->groupe->label}}
                    </td>
                    <td class="border-b">
                        <x-link title="Consulter l'absence">
                            {{$seance->marked() ? "marquée" : "non marquée"}}
                        </x-link>
                    </td>
                    <td class="border-b">
                        <x-link class="w-8 h-8 flex flex-row justify-center items-center hover:bg-gray-200"
                                title="Cliquer pour consulter {{$seance->label}}"
                                href="{{route('seances.edit', $seance->id)}}"
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
                <td colspan="7">:( aucune seance trouvée!</td>
            </tr>
        @endif
        </tbody>
        <tfoot class="w-full">
        <tr class="w-full">
            <td colspan="7">
                {{$all->links("components.pagination-links")}}
            </td>
        </tr>
        </tfoot>
    </table>
</div>
