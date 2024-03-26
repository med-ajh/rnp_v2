<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $region->name }}</td>
    
    @if(getCrudConfig('Region')->delete or getCrudConfig('Region')->update)
        <td>

            @if(getCrudConfig('Region')->update && hasPermission(getRouteName().'.region.update', 1, 1, $region))
                <a href="@route(getRouteName().'.region.update', $region->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Region')->delete && hasPermission(getRouteName().'.region.delete', 1, 1, $region))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Region') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Region') ]) }}</p>
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
