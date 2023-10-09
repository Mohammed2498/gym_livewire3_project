<form wire:submit.prevent="update" class="card-body">
    <div class="row">
        @if (session()->has('success'))
            <div class="alert alert-success me-gengiiii d-flex align-items-center" role="alert">
                <span class="alert-icon text-success me-2">
                    <i class="ti ti-check ti-xs"></i>
                </span>
                {{ session('success') }}
            </div>
        @endif
        <div class="col mb-3">
            <label class="form-label" for="settings.body_building_male_price">كمال أجسام رجال</label>
            <input wire:model="settings.body_building_male_price" type="number" class="form-control"
                id="settings.body_building_male_price" placeholder="السعر">
        </div>
        <div class="col mb-3">
            <label class="form-label" for="settings.fitness_male_price">لياقة بدنية رجال</label>
            <input wire:model="settings.fitness_male_price" type="number" class="form-control"
                id="settings.fitness_male_price" placeholder="السعر">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label" for="settings.body_building_female_price">كمال أجسام نساء</label>
            <input wire:model="settings.body_building_female_price" type="number" class="form-control"
                id="settings.body_building_female_price" placeholder="السعر">
        </div>
        <div class="col mb-3">
            <label class="form-label" for="settings.fitness_female_price"> لياقة بدنية نساء</label>
            <input wire:model="settings.fitness_female_price" type="number" class="form-control"
                id="settings.fitness_female_price" placeholder="السعر">
        </div>
    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light">
        <x-loading-state buttonName="تحديث" target="update" />
    </button>
</form>
