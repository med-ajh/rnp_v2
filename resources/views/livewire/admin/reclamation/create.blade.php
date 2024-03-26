<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Reclamation') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.reclamation.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Reclamation')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">

            <div>
                <label for="type">{{ __('Type de réclamation') }}</label>
                <select class="form-control" id="type" wire:model.defer="type">
                     <option value=""></option>
                     <option value="option1">Probléme de pré-inscription</option>
                     <option value="option1">Problème d'inscription</option>
                     <option value="option3">Problème d'authentification</option>
                    </select> @error('type') <span class="error">{{ $message }}</span> @enderror </div>

            <div class="form-group">
                <label for="titre">{{ __('Titre réclamation') }}</label>
                <input type="text" class="form-control" id="titre" wire:model.defer="titre">
                @error('titre') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nom_prenom">{{ __('Nom et Prénom') }}</label>
                <input type="text" class="form-control" id="nom_prenom" wire:model.defer="nom_prenom">
                @error('nom_prenom') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="email">{{ __('Mail') }}</label>
                <input type="email" class="form-control" id="email" wire:model.defer="email">
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="telephone">{{ __('N° de téléphone') }}</label>
                <input type="text" class="form-control" id="telephone" wire:model.defer="telephone">
                @error('telephone') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="input-region" class="col-sm-2 control-label">{{ __('Région') }}</label>
                <select id="input-region" wire:model.lazy="region_id" wire:change="filterProvinces" class="form-control @error('region_id') is-invalid @enderror">
                    <option value="">{{ __('') }}</option>
                    @foreach(\App\Models\Region::pluck('name', 'id') as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('region_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="input-province" class="col-sm-2 control-label">{{ __('Préfecture/Province') }}</label>
                <select id="input-province" wire:model="province_id" class="form-control @error('province_id') is-invalid @enderror">
                    <option value="">{{ __('') }}</option>
                    @foreach($provinces as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('province_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>


            <div class="form-group">
                <label for="descriptif">{{ __('Descriptif') }}</label>
                <textarea class="form-control" id="descriptif" wire:model.defer="descriptif"></textarea>
                @error('descriptif') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.reclamation.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
