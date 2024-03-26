<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('CentreInscription') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="{{ route(getRouteName().'.home') }}" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route(getRouteName().'.centreinscription.read') }}" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('CentreInscription')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">
            <!-- Name Input -->
            <div class="form-group">
                <label for="input-name" class="col-sm-2 control-label">{{ __('Name') }}</label>
                <input type="text" id="input-name" wire:model.lazy="centreinscription.name" class="form-control @error('centreinscription.name') is-invalid @enderror" placeholder="" autocomplete="on">
                @error('centreinscription.name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Region Input -->
            <div class="form-group">
                <label for="input-region" class="col-sm-2 control-label">{{ __('Region') }}</label>
                <select id="input-region" wire:model.lazy="centreinscription.region_id" class="form-control @error('centreinscription.region_id') is-invalid @enderror">
                    <option value="">{{ __('Select a Region') }}</option>
                    @foreach(\App\Models\Region::pluck('name', 'id') as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('centreinscription.region_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Province Input -->
            <div class="form-group">
                <label for="input-province" class="col-sm-2 control-label">{{ __('Province') }}</label>
                <select id="input-province" wire:model.lazy="centreinscription.province_id" class="form-control @error('centreinscription.province_id') is-invalid @enderror">
                    <option value="">{{ __('Select a Province') }}</option>
                    @foreach($provinces as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('centreinscription.province_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Pachalik Input -->
            <div class="form-group">
                <label for="input-pachalik" class="col-sm-2 control-label">{{ __('Pachalik') }}</label>
                <select id="input-pachalik" wire:model.lazy="centreinscription.pachalik_id" class="form-control @error('centreinscription.pachalik_id') is-invalid @enderror">
                    <option value="">{{ __('Select a Pachalik') }}</option>
                    @foreach($pachaliks as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('centreinscription.pachalik_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Quartier Input -->
            <div class="form-group">
                <label for="input-quartier" class="col-sm-2 control-label">{{ __('Quartier') }}</label>
                <select id="input-quartier" wire:model.lazy="centreinscription.quartier_id" class="form-control @error('centreinscription.quartier_id') is-invalid @enderror">
                    <option value="">{{ __('Select a Quartier') }}</option>
                    @foreach($quartiers as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('centreinscription.quartier_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Avenue Input -->
            <div class="form-group">
                <label for="input-avenue" class="col-sm-2 control-label">{{ __('Avenue') }}</label>
                <select id="input-avenue" wire:model.lazy="centreinscription.avenue_id" class="form-control @error('centreinscription.avenue_id') is-invalid @enderror">
                    <option value="">{{ __('Select an Avenue') }}</option>
                    @foreach($avenues as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('centreinscription.avenue_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="{{ route(getRouteName().'.centreinscription.read') }}" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>

    </form>
</div>
