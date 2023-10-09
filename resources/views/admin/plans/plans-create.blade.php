<x-master-modal functionName="submit" modalId="createModal" modalTitle="اضافة خطة اشتراك">
    <div class="row g-2">
        <div class="col mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input wire:model="name" type="text" id="name" class="form-control" placeholder="ادهل الاسم">
            <x-error-message property="name" />
        </div>
        <div class="col mb-0">
            <label for="price" class="form-label">سعر الاشتراك الشهري</label>
            <input wire:model="price" type="number" id="price" class="form-control" placeholder="سعر الخطة">
            <x-error-message property="price" />
        </div>
    </div>
    <div class="row g-2">
        <div class="col mb-3">
            <label for="gender" class="form-label">النوع</label>
            <select wire:model="gender" class="form-select" id="gender" aria-label="Default select example">
                <option value="" selected>اختر النوع</option>
                <option value="female">اناث</option>
                <option value="male">رجال</option>
            </select>
            <x-error-message property="gender" />
        </div>
        <div class="col mb-3">
            <label for="sport_type" class="form-label">الرياضة</label>
            <select wire:model="sport_type" class="form-select" id="sport_type" aria-label="Default select example">
                <option value="" selected>اختر نوع الرياضة</option>
                <option value="body_building">كمال أجسام</option>
                <option value="fitness">لياقة بدنية</option>
            </select>
            <x-error-message property="sport_type" />
        </div>
    </div>
</x-master-modal>
