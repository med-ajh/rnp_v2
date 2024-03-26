<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Citoyen') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.citoyen.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Citoyen')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
            <div class="form-group row">
                <label for="email_insc" class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control @error('email_insc') is-invalid @enderror" id="email_insc" wire:model.lazy="email_insc" placeholder="{{ __('Email') }}">
                    @error('email_insc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <h1 color style="color:#fff;background-color:#6076E8;text-align:center;">Informations Personnelles</h1>

            <div class="form-group row">
                <label for="nom" class="col-sm-2 col-form-label">{{ __('Nom') }}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" wire:model.lazy="nom" placeholder="{{ __('Nom') }}">
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="prenom" class="col-sm-2 col-form-label">{{ __('Prenom') }}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" wire:model.lazy="prenom" placeholder="{{ __('Prenom') }}">
                    @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="Cnie" class="col-sm-2 col-form-label">{{ __('Cnie') }}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('Cnie') is-invalid @enderror" id="Cnie" wire:model.lazy="Cnie" placeholder="{{ __('Cnie') }}">
                    @error('Cnie')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="date_naissance" class="col-sm-2 col-form-label">{{ __('Date Naissance') }}</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control @error('date_naissance') is-invalid @enderror" id="date_naissance" wire:model.lazy="date_naissance" placeholder="{{ __('Date Naissance') }}">
                    @error('date_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ "La date de naissance doit être une date supérieure ou égale à 18 ans !!!" }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="age" class="col-sm-2 col-form-label">{{ __('Age') }}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="age" wire:model.lazy="age" readonly>
                    @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>



            <div class="form-group row">
                <label for="genre" class="col-sm-2 col-form-label">{{ __('Genre') }}</label>
                <div class="col-sm-10">
                    <INPUT TYPE="Radio" Name="Gender" wire:model.lazy="genre" Value="Homme">Homme
                    <INPUT TYPE="Radio" Name="Gender" wire:model.lazy="genre" Value="Femme">Femme

                    @error('genre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>






            <div class="form-group row">
                <label for="status_de_residence" class="col-sm-2 col-form-label">{{ __('Status De Residence ') }}</label>
                <div class="col-sm-10">
                    <INPUT TYPE="Radio" Name="status_de_residence" wire:model.lazy="status_de_residence" Value="Citoyen Marocain">Citoyen Marocain
                    <INPUT TYPE="Radio" Name="status_de_residence" wire:model.lazy="status_de_residence" Value="Etranger Résident">Etranger Résident
                    @error('status_de_residence')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="ne_au_maroc" class="col-sm-2 col-form-label">{{ __('Je suis né(e) au maroc *     : ') }}</label>
                <div class="col-sm-10">
                    <INPUT TYPE="Radio" Name="ne_au_maroc" wire:model.lazy="ne_au_maroc" Value="Non">Non
                    <INPUT TYPE="Radio" Name="ne_au_maroc" wire:model.lazy="ne_au_maroc" Value="Oui">Oui
                    @error('ne_au_maroc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="nationalite" class="col-sm-2 col-form-label">{{ __('Nationalite') }}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nationalite') is-invalid @enderror" id="nationalite" wire:model.lazy="nationalite" placeholder="{{ __('Nationalite') }}">
                    @error('nationalite')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <h1 color style="color:#fff;background-color:#6076E8;text-align:center;">Adresse Personnelle</h1>



            <div class="form-group">
                <select id="input-region" wire:model.lazy="region_id" wire:change="filterProvinces" class="form-control @error('region_id') is-invalid @enderror">
                    <option value="">{{ __('Select a Region') }}</option>
                    @foreach(\App\Models\Region::pluck('name', 'id') as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('region_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>


            <div class="form-group">
                <select id="input-province" wire:model="province_id" class="form-control @error('province_id') is-invalid @enderror">
                    <option value="">{{ __('Select a Province') }}</option>
                    @foreach($provinces as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('province_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>



 <!-- Pachalik Input -->
 <div class="form-group">
    <select id="input-pachalik" wire:model.lazy="pachalik_id" wire:change="filterQuartiers" class="form-control @error('pachalik_id') is-invalid @enderror">
        <option value="">{{ __('Select a Pachalik') }}</option>
        @foreach($pachaliks as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
    @error('pachalik_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>


<div class="form-group">
    <select id="input-quartier" wire:model.lazy="quartier_id" wire:change="filterAvenues" class="form-control @error('quartier_id') is-invalid @enderror">
        <option value="">{{ __('Select a Quartier') }}</option>
        @foreach($quartiers as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
    @error('quartier_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>




<div class="form-group">
    <select id="input-avenue" wire:model.lazy="avenue_id" class="form-control @error('avenue_id') is-invalid @enderror">
        <option value="">{{ __('Select an Avenue') }}</option>
        @foreach($avenues as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
    @error('avenue_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>








<h1 color style="color:#fff;background-color:#6076E8;text-align:center;">Données d'identité</h1>


            <div class="form-group row">
                <label for="type_dhabitat" class="col-sm-2 col-form-label">{{ __("Type d'habitat *     : ") }}</label>
                <div class="col-sm-10">
                    <INPUT TYPE="Radio" Name="type_dhabitat" wire:model.lazy="type_dhabitat" Value="Individuel">Individuel
                    <INPUT TYPE="Radio" Name="type_dhabitat" wire:model.lazy="type_dhabitat" Value="collectif">collectif
                    @error('type_dhabitat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="n_de_porte" class="col-sm-2 col-form-label">{{ __('N De Porte') }}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('n_de_porte') is-invalid @enderror" id="n_de_porte" wire:model.lazy="n_de_porte" placeholder="{{ __('N De Porte') }}">
                    @error('n_de_porte')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="adresse" class="col-sm-2 col-form-label">{{ __('Adresse') }}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" wire:model.lazy="adresse" placeholder="{{ __('Adresse') }}">
                    @error('adresse')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="code_postal" class="col-sm-2 col-form-label">{{ __('Code Postal') }}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('code_postal') is-invalid @enderror" id="code_postal" wire:model.lazy="code_postal" placeholder="{{ __('Code Postal') }}">
                    @error('code_postal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <h1 color style="color:#fff;background-color:#6076E8;text-align:center;">Contacts</h1>


            <div class="form-group row">
                <label for="telephone" class="col-sm-2 col-form-label">{{ __('Telephone') }}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" wire:model.lazy="telephone" placeholder="{{ __('Telephone') }}">
                    @error('telephone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>






            <div class="form-group row">
                <label for="je_dipose_idcs" class="col-sm-2 col-form-label">{{ __("Je dispose d'un IDCS *   ") }}</label>
                <div class="col-sm-10">
                    <INPUT TYPE="Radio" Name="je_dipose_idcs" wire:model="je_dipose_idcs" Value="Nom">Non
                    <INPUT TYPE="Radio" Name="je_dipose_idcs" wire:model="je_dipose_idcs" Value="Oui">Oui
                    @error('je_dipose_idcs')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.citoyen.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
