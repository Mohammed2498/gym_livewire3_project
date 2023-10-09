<form wire:submit.prevent="login">
    <div class="mb-3">
        <label for="email" class="form-label">الايميل</label>
        <input
            wire:model="email"
            type="text"
            class="form-control"
            id="email"
            placeholder="Enter your email or username"
            autofocus/>
    </div>
    <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
            <label class="form-label" for="password">كلمة المرور</label>
        </div>
        <div class="input-group input-group-merge">
            <input
                wire:model="password"
                type="password"
                id="password"
                class="form-control"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"/>
            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input wire:model="remember" class="form-check-input" type="checkbox" id="remember-me"/>
            <label class="form-check-label" for="remember-me">تذكرني</label>
        </div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">
            <x-loading-state buttonName="تسجيل الدحول" target="login"/>
        </button>
    </div>
</form>
