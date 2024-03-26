<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $reclamation->type }}</td>
    <td class="">{{ $reclamation->titre }}</td>
    <td class="">{{ $reclamation->nom_prenom }}</td>
    <td class="">{{ $reclamation->email }}</td>
    <td class="">{{ $reclamation->telephone }}</td>
    <td class="">{{ $reclamation->region->name }}</td>
    <td class="">{{ $reclamation->province->name }}</td>
    <td class="">{{ $reclamation->descriptif }}</td>
    <td class="">{{ $reclamation->date_reclamation }}</td>

    @if(getCrudConfig('Reclamation')->delete or getCrudConfig('Reclamation')->update)
        <td>



            @if(getCrudConfig('Reclamation')->delete && hasPermission(getRouteName().'.reclamation.delete', 1, 1, $reclamation))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Reclamation') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Reclamation') ]) }}</p>
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
