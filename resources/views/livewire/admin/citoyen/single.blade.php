<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $citoyen->email_insc }}</td>
    <td class="">{{ $citoyen->nom }}</td>
    <td class="">{{ $citoyen->prenom }}</td>
    <td class="">{{ $citoyen->Cnie }}</td>
    <td class="">{{ $citoyen->date_naissance }}</td>
    <td class="">{{ $citoyen->age }}</td>
    <td class="">{{ $citoyen->genre }}</td>
    <td class="">{{ $citoyen->ne_au_maroc }}</td>
    <td class="">{{ $citoyen->region->name }}</td>
    <td class="">{{ $citoyen->province->name }}</td>
    <td class="">{{ $citoyen->pachalik->name }}</td>
    <td class="">{{ $citoyen->quartier->name }}</td>
    <td class="">{{ $citoyen->avenue->name }}</td>
    <td class="">{{ $citoyen->type_dhabitat }}</td>
    <td class="">{{ $citoyen->n_de_porte }}</td>
    <td class="">{{ $citoyen->adresse }}</td>
    <td class="">{{ $citoyen->code_postal }}</td>
    <td class="">{{ $citoyen->telephone }}</td>
    <td class="">{{ $citoyen->email }}</td>


    @if(getCrudConfig('Citoyen')->delete or getCrudConfig('Citoyen')->update)
        <td>

            @if(getCrudConfig('Citoyen')->update && hasPermission(getRouteName().'.citoyen.update', 1, 1, $citoyen))
                <a href="@route(getRouteName().'.citoyen.update', $citoyen->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Citoyen')->delete && hasPermission(getRouteName().'.citoyen.delete', 1, 1, $citoyen))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Citoyen') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Citoyen') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
