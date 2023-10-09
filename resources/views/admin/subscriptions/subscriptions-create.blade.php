<x-master-modal functionName="submit" modalId="createSubscriptionModal" modalTitle="اضافة اشتراك جديد">
    <div class="row g-2">
        <div class="col mb-2">
            <label for="subtype" class="form-label">نوع الاشتراك</label>
            <select wire:model.live="subtype" id="subtype" class="form-control">
                <option value="" selected>اختر نوع الاشتراك</option>
                <option value="specified">خطة اشتراك</option>
                <option value="custom">اشتراك مخصص</option>
            </select>
            <x-error-message property="subtype" />
        </div>
    </div>
    @if ($subtype === 'specified')
        <div class="col mb-2">
            <label for="plan_id" class="form-label">خطة الاشتراك</label>
            <select wire:change="calculateTotalPrice" wire:model="plan_id" id="plan_id" class="form-control">
                <option value="" selected>اختر خطة الاشتراك</option>
                @if (count($plans) > 0)
                    @foreach ($plans as $plan)
                        <option value="{{ $plan->id }}" wire:key="plan-{{ $plan->id }}">{{ $plan->name }}
                        </option>
                    @endforeach
                @endif
            </select>
            <x-error-message property="plan_id" />
        </div>
        <div class="col mb-2">
            <label for="duration" class="form-label">مدة الاشتراك</label>
            <select wire:change="calculateTotalPrice" wire:model="duration" id="duration" class="form-control">
                <option value="" selected>اختر مدة الاشتراك</option>
                <option value="1">شهر</option>
                <option value="2">شهرين</option>
                <option value="3">3أشهر</option>
                <option value="4">4أشهر</option>
                <option value="5">5أشهر</option>
                <option value="6">6أشهر</option>
                <option value="7">7أشهر</option>
                <option value="8">8أشهر</option>
                <option value="9">9أشهر</option>
                <option value="10">10أشهر</option>
                <option value="11">11أشهر</option>
                <option value="12">سنة</option>
            </select>
            <x-error-message property="duration" />
        </div>
        <div class="col mb-0">
            <label for="subscription_price" class="form-label">المبلغ الكلي</label>
            <input wire:model="subscription_price" type="number" id="subscription_price" class="form-control" readonly>
            <x-error-message property="subscription_price" />
        </div>
    @endif
    @if ($subtype === 'custom')
        <div class="col mb-3">
            <label for="sport_type" class="form-label">الرياضة</label>
            <select wire:model="sport_type" class="form-select" id="sport_type" aria-label="Default select example">
                <option value="" selected>اختر نوع الرياضة</option>
                <option value="body_building">كمال أجسام</option>
                <option value="fitness">لياقة بدنية</option>
            </select>
            <x-error-message property="sport_type" />
        </div>
        <div class="row g-2">
            <div class="col mb-3">
                <label for="custom_start_date" class="form-label">تاريخ الاشتراك</label>
                <input wire:model="custom_start_date" class="form-control" type="date" id="custom_start_date">
                <x-error-message property="custom_start_date" />
            </div>
            <div class="col mb-3">
                <label for="custom_end_date" class="form-label">تاريخ الانتهاء</label>
                <input wire:model="custom_end_date" class="form-control" type="date" id="custom_end_date">
                <x-error-message property="custom_end_date" />
            </div>
        </div>
        <div class="col mb-0">
            <label for="custom_subscription_price" class="form-label">السعر</label>
            <input wire:model="custom_subscription_price" type="number" id="custom_subscription_price"
                class="form-control">
            <x-error-message property="custom_subscription_price" />
        </div>
    @endif
    <div class="col mb-3">
        <label for="payment_status" class="form-label">طريقةالدفع</label>
        <select wire:model.live="payment_status" class="form-select" id="payment_status" aria-label="Default select example">
            <option value="" selected>اختر طريقةالدفع</option>
            <option value="full">كامل</option>
            <option value="partial">جزئي</option>
            <option value="not_paid">لاحقا</option>
        </select>
        <x-error-message property="payment_status" />
    </div>
    @if($payment_status ==="partial")
    <div class="col mb-0">
        <label for="manual_payment_amount" class="form-label">الدفعة</label>
        <input wire:model="manual_payment_amount" type="number" id="manual_payment_amount"
               class="form-control">
        <x-error-message property="manual_payment_amount" />
    </div>
    @endif
</x-master-modal>
