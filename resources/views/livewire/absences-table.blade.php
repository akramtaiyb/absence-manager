<div class="w-full h-full flex flex-col items-top justify-start gap-4">
    <div class="h-96">
        <div>
            <x-search-input wire:model.live.debounce.300ms="search" class="mb-4"/>
            <table class="w-fill border-separate border-spacing-0 overflow-y-auto">
                <thead>
                <tr class="bg-[var(--white)]">
                    <th class="w-44 text-left border-b">Stagiaire</th>
                    <th class="w-32 text-left border-b">Groupe</th>
                    <th class="w-96 text-left border-b">Seance</th>
                    <th class="w-96 text-left border-b">Module</th>
                    <th class="w-44 text-left border-b">Date</th>
                    <th class="w-44 text-left border-b">Nombre d'heures</th>
                    <th class="w-18 text-left border-b">Justifiée</th>
                </tr>
                </thead>
                <tbody>
                @if($absences)
                    @foreach($absences as $absence)
                        <tr class="hover:bg-gray-100 text-sm align-top">
                            <td class="border-b pr-2 font-bold">
                                {{$absence->stagiaire->last_name}} {{$absence->stagiaire->first_name}}
                            </td>
                            <td class="border-b">{{$absence->stagiaire->groupe->label}}</td>
                            <td class="border-b pr-2">{{$absence->seance->label}}</td>
                            <td class="border-b pr-2">{{$absence->seance->module->title}}</td>
                            <td class="border-b">{{$absence->seance->date}}</td>
                            <td class="border-b">
                                @php
                                    $dist = json_decode($absence->distribution, true);
                                @endphp
                                <div class="h-full mt-px flex gap-1">
                                    @for($i = 0; $i < $absence->hours; $i++)
                                        @php($key = uuid_create() . $absence->id)
                                        <form class="absenceCheckBoxForm" method="POST"
                                              action="{{route('absences.update', $absence->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <input accesskey="{{$key}}" type="hidden" name="index" value="{{ $i }}">
                                            <input accesskey="{{"group".$key}}" type="hidden" name="groupe_id"
                                                   value="{{ $absence->stagiaire->groupe_id }}">
                                            <input
                                                id="checkbox-{{ $absence->id }}"
                                                class="relative peer shrink-0 appearance-none w-4 h-4 border border-[var(--blue)] bg-white checked:border-0 checked:bg-[var(--blue)] focus:outline-none focus:ring-offset-0 focus:ring-2 focus:ring-blue-100"
                                                type="checkbox"
                                                value="{{$i}}"
                                                {{in_array($i, $dist) ? 'checked' : null}}
                                            />
                                        </form>
                                    @endfor
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            const checkboxForms = document.querySelectorAll(".absenceCheckBoxForm");

                                            checkboxForms.forEach(function (form) {
                                                const checkbox = form.querySelector("input[type='checkbox']");

                                                checkbox.addEventListener("change", function () {
                                                    form.submit();
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                            </td>
                            <td class="border-b">
                                {{$absence->reason ? 'oui' : 'non'}}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">:( aucune absence trouvée!</td>
                    </tr>
                @endif
                </tbody>
                <tfoot class="w-full">
                <tr class="w-full">
                    <td colspan="7">
                        {{--                        {{$absences->links("components.pagination-links")}}--}}
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div>
    </div>
</div>
