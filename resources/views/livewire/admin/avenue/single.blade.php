<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $avenue->name }}</td>
    <td class="">{{ $avenue->quartier->name }}</td>


    @if(getCrudConfig('Avenue')->delete or getCrudConfig('Avenue')->update)
        <td>

            @if(getCrudConfig('Avenue')->update && hasPermission(getRouteName().'.avenue.update', 1, 1, $avenue))
                <a href="@route(getRouteName().'.avenue.update', $avenue->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Avenue')->delete && hasPermission(getRouteName().'.avenue.delete', 1, 1, $avenue))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Avenue') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Avenue') ]) }}</p>
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
