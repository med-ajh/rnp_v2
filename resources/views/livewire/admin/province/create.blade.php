    <div class="card">
        <div class="card-header p-0">
            <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Province') ]) }}</h3>
            <div class="px-2 mt-4">
                <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                    <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="@route(getRouteName().'.province.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Province')) }}</a></li>
                    <li class="breadcrumb-item active">{{ __('Create') }}</li>
                </ul>
            </div>
        </div>

        <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

            <div class="card-body">
                <!-- Name Input -->
                <div class='form-group'>
                    <label for='input-name' class='col-sm-2 control-label '> {{ __('Name') }}</label>
                    <input type='text' id='input-name' wire:model.lazy='name' class="form-control  @error('name') is-invalid @enderror" placeholder='' autocomplete='on'>
                    @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>

                <!-- Region_id Input -->
                <div class='form-group'>
                    <label for='input-region_id' class='col-sm-2 control-label'>{{ __('Region') }}</label>
                    <select id='input-region_id' wire:model.lazy='region_id' class="form-control @error('region_id') is-invalid @enderror">
                        <option value="">{{ __('Sélectionner une région') }}</option> <!-- Default message -->
                        @foreach(\App\Models\Region::pluck('name', 'id') as $key => $value)
                            <option value='{{ $key }}'>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('region_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
                <a href="@route(getRouteName().'.province.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
