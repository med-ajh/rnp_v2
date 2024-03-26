<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $centreinscription->name }}</td>
    <td class="">{{ $centreinscription->region->name }}</td>
    <td class="">{{ $centreinscription->province->name }}</td>
    <td class="">{{ $centreinscription->pachalik->name }}</td>
    <td class="">{{ $centreinscription->quartier->name }}</td>
    <td class="">{{ $centreinscription->avenue->name }}</td>



    @if(getCrudConfig('CentreInscription')->delete or getCrudConfig('CentreInscription')->update)
        <td>

            @if(getCrudConfig('CentreInscription')->update && hasPermission(getRouteName().'.centreinscription.update', 1, 1, $centreinscription))
                <a href="@route(getRouteName().'.centreinscription.update', $centreinscription->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('CentreInscription')->delete && hasPermission(getRouteName().'.centreinscription.delete', 1, 1, $centreinscription))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('CentreInscription') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('CentreInscription') ]) }}</p>
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
