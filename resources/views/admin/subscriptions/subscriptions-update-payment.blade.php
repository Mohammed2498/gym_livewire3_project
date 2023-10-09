<x-master-modal functionName="submit" modalId="completeRemainingPayment" modalTitle="اكمال المبلغ المتبقي">
    {{-- <div class="col mb-3">
        <label for="manual_payment_amount" class="form-label">اكمال الدفعة</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon11"><i class="fa-solid fa-shekel-sign"></i></span>
            <input wire:model="remaining_payment" type="text" class="form-control" placeholder="Username"
                aria-label="Username" aria-describedby="basic-addon11" readonly>
        </div>
    </div> --}}
    <div class="col mb-2">
        <label for="updatedPayment" class="form-label">اكمال الدفعة</label>
        <input wire:model="updatedPayment" type="number" id="updatedPayment" class="form-control">
        <x-error-message property="updatedPayment" />
    </div>
</x-master-modal>
