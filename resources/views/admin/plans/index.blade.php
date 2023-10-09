@section('plans-active', 'active')
<x-layouts.admin.admin-layout title="Plans">
    <div class="mb-3 ">
        <h4 class="py-3 mb-4">خطط الاشتراك</h4>
        <button type="button" class="btn btn-md btn-primary mb-2 text-left" data-bs-toggle="modal"
            data-bs-target="#createModal">
            خطة اشتراك جديدة
        </button>
    </div>
    @livewire('admin.plans.plans-create')
    <div class="card">
        <h5 class="card-header">خطط الاشتراك</h5>
        @livewire('admin.plans.plans-data')
    </div>
    @livewire('admin.plans.plans-update')
    @livewire('admin.plans.plans-delete')
</x-layouts.admin.admin-layout>
