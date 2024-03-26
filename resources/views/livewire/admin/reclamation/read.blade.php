<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Reclamation')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Reclamation')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('Reclamation')->create && hasPermission(getRouteName().'.reclamation.create', 1, 1))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.reclamation.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Reclamation') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('Reclamation')->searchable())
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
                            <th scope="col" style='cursor: pointer' wire:click="sort('type')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'type') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'type') fa-sort-amount-up ml-2 @endif'></i> {{ __('Type de réclamation') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('titre')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'titre') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'titre') fa-sort-amount-up ml-2 @endif'></i> {{ __('Titre réclamation') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('nom_prenom')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'nom_prenom') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'nom_prenom') fa-sort-amount-up ml-2 @endif'></i> {{ __('Nom et Prénom') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('email')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'email') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'email') fa-sort-amount-up ml-2 @endif'></i> {{ __('Mail') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('telephone')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'telephone') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'telephone') fa-sort-amount-up ml-2 @endif'></i> {{ __('N° de téléphone') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('Region_id')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'Region_id') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'Region_id') fa-sort-amount-up ml-2 @endif'></i> {{ __('Région') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('Province_id')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'Province_id') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'Province_id') fa-sort-amount-up ml-2 @endif'></i> {{ __('Préfecture/Province') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('descriptif')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'descriptif') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'descriptif') fa-sort-amount-up ml-2 @endif'></i> {{ __('Descriptif') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('date_reclamation')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'date_reclamation') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'date_reclamation') fa-sort-amount-up ml-2 @endif'></i> {{ __('Date de reclamation') }} </th>

                            @if(getCrudConfig('Reclamation')->delete or getCrudConfig('Reclamation')->update)
                                <th scope="col">{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reclamations as $reclamation)
                            @livewire('admin.reclamation.single', [$reclamation], key($reclamation->id))
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $reclamations->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
