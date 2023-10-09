<form wire:submit.prevent="register" class="mb-3">
    <div class="mb-3">
        <label for="name" class="form-label">الاسم</label>
        <input wire:model="name" type="text" class="form-control" id="name"
               placeholder="الاسم" autofocus/>
        <x-error-message property="name"/>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">الايميل</label>
        <input wire:model="email" type="text" class="form-control" id="email"
               placeholder="الايميل"/>
        <x-error-message property="email"/>
    </div>
    <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password">كلمة المرور</label>
        <div class="input-group input-group-merge">
            <input wire:model="password" type="password" id="password" class="form-control"
                   placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                   aria-describedby="password"/>
            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
        </div>
        <x-error-message property="password"/>
    </div>
    <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password_confirmation">تأكيد كلمة المرور</label>
        <div class="input-group input-group-merge">
            <input wire:model="password_confirmation" type="password"
                   id="password_confirmation" class="form-control"
                   placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                   aria-describedby="password_confirmation"/>
            <x-error-message property="password_confirmation"/>
        </div>
    </div>
    <button type="submit" class="btn btn-primary d-grid w-100">
        <x-loading-state buttonName="تسجيل" target="register"/>
    </button>
</form>
