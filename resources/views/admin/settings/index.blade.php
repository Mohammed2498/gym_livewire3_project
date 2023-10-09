@section('settings-active', 'active')
<x-layouts.admin.admin-layout title="Settings">
    <h4 class="py-3 mb-4">الاعدادات</h4>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">الاعدادات</h5>
        </div>
        @livewire('admin.settings.settings-update')
    </div>
</x-layouts.admin.admin-layout>
