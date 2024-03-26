<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $commune->name }}</td>
    <td class="">{{ $commune->pachalik->name }}</td>

    @if(getCrudConfig('Commune')->delete or getCrudConfig('Commune')->update)
        <td>

            @if(getCrudConfig('Commune')->update && hasPermission(getRouteName().'.commune.update', 1, 1, $commune))
                <a href="@route(getRouteName().'.commune.update', $commune->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Commune')->delete && hasPermission(getRouteName().'.commune.delete', 1, 1, $commune))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Commune') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Commune') ]) }}</p>
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
