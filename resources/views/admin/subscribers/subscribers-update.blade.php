<x-master-modal functionName="submit" modalId="updateModal" modalTitle="تعديل المشترك">
    <div class="row g-2">
        <div class="col mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input wire:model="name" type="text" id="name" class="form-control" placeholder="ادهل الاسم">
            <x-error-message property="name" />
        </div>
        <div class="col mb-0">
            <label for="phone" class="form-label">رقم الجوال</label>
            <input wire:model="phone" type="number" id="phone" class="form-control" placeholder="رقم الدوال">
            <x-error-message property="phone" />
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label for="image" class="form-label">الصورة</label>
            <input wire:model="image" type="file" id="image" class="form-control" placeholder="الصورة">
            <x-error-message property="image" />
        </div>
        <div>
            @if ($image)
                <img class="img-fluid" src="{{ $image->temporaryUrl() }}" alt="tutor image 1">
                {{-- <img src="{{ $image->temporaryUrl() }}"> --}}
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col mb-0">
            <label for="gender" class="form-label">النوع</label>
            <select wire:model="gender" id="gender" class="form-control">
                <option value="" selected>اختر النوع</option>
                <option value="male">ذكر</option>
                <option value="female">أنثى</option>
            </select>
            <x-error-message property="gender" />
        </div>
    </div>
</x-master-modal>
