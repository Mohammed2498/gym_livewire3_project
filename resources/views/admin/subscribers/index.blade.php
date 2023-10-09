@section('subscribers-active', 'active')
<x-layouts.admin.admin-layout title="Subscribes">
    <div class="mb-3 ">
        <h4 class="py-3 mb-4">المشتركين</h4>
        <button type="button" class="btn btn-md btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#createModal">
            اضافة مشترك جديد
        </button>
    </div>
    @livewire('admin.subscribers.subscribers-create')
    <div class="card">
        <h5 class="card-header">المشتركين</h5>
        @livewire('admin.subscribers.subscribers-data')
    </div>
    @livewire('admin.subscribers.subscribers-update')
    @livewire('admin.subscribers.subscribers-delete')
    @livewire('admin.subscriptions.subscriptions-create')
    @livewire('admin.subscriptions.subscriptions-update-payment')
</x-layouts.admin.admin-layout>
