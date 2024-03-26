<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Citoyen')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Citoyen')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('Citoyen')->create && hasPermission(getRouteName().'.citoyen.create', 1, 1))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.citoyen.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Citoyen') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('Citoyen')->searchable())
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" @if(config('easy_panel.lazy_mode')) wire:model.lazy="search" @else wire:model="search" @endif placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin" ></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style='cursor: pointer' wire:click="sort('email_insc')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'email_insc') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'email_insc') fa-sort-amount-up ml-2 @endif'></i> {{ __('Email') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('nom')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'nom') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'nom') fa-sort-amount-up ml-2 @endif'></i> {{ __('Nom') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('prenom')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'prenom') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'prenom') fa-sort-amount-up ml-2 @endif'></i> {{ __('Prenom') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('Cnie')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'Cnie') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'Cnie') fa-sort-amount-up ml-2 @endif'></i> {{ __('Cnie') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('date_naissance')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'date_naissance') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'date_naissance') fa-sort-amount-up ml-2 @endif'></i> {{ __('Date_naissance') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('age')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'age') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'age') fa-sort-amount-up ml-2 @endif'></i> {{ __('Age') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('genre')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'genre') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'genre') fa-sort-amount-up ml-2 @endif'></i> {{ __('Genre') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('ne_au_maroc')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'ne_au_maroc') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'ne_au_maroc') fa-sort-amount-up ml-2 @endif'></i> {{ __('Ne_au_maroc') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('ne_au_maroc')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'ne_au_maroc') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'ne_au_maroc') fa-sort-amount-up ml-2 @endif'></i> {{ __('Region') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('ne_au_maroc')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'ne_au_maroc') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'ne_au_maroc') fa-sort-amount-up ml-2 @endif'></i> {{ __('Province') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('ne_au_maroc')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'ne_au_maroc') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'ne_au_maroc') fa-sort-amount-up ml-2 @endif'></i> {{ __('Pachalik') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('ne_au_maroc')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'ne_au_maroc') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'ne_au_maroc') fa-sort-amount-up ml-2 @endif'></i> {{ __('Quartier') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('ne_au_maroc')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'ne_au_maroc') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'ne_au_maroc') fa-sort-amount-up ml-2 @endif'></i> {{ __('Avenue') }} </th>


                            <th scope="col" style='cursor: pointer' wire:click="sort('type_dhabitat')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'type_dhabitat') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'type_dhabitat') fa-sort-amount-up ml-2 @endif'></i> {{ __('Type_dhabitat') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('n_de_porte')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'n_de_porte') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'n_de_porte') fa-sort-amount-up ml-2 @endif'></i> {{ __('N_de_porte') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('adresse')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'adresse') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'adresse') fa-sort-amount-up ml-2 @endif'></i> {{ __('Adresse') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('code_postal')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'code_postal') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'code_postal') fa-sort-amount-up ml-2 @endif'></i> {{ __('Code_postal') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('telephone')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'telephone') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'telephone') fa-sort-amount-up ml-2 @endif'></i> {{ __('Telephone') }} </th>


                            @if(getCrudConfig('Citoyen')->delete or getCrudConfig('Citoyen')->update)
                                <th scope="col">{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($citoyens as $citoyen)
                            @livewire('admin.citoyen.single', [$citoyen], key($citoyen->id))
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $citoyens->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
