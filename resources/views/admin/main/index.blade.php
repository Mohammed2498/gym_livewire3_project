@section('main-active', 'active')
<x-layouts.admin.admin-layout title="Home">
    @livewire('admin.main.statistics-component')

{{--    <div class="card">--}}
{{--        <h5 class="card-header">المشتركين النشطين</h5>--}}
{{--        @livewire('admin.main.active-subscribers-table')--}}
{{--    </div>--}}
{{--    <br>--}}
{{--    <div class="card">--}}
{{--        <h5 class="card-header">المشتركين المنتهين</h5>--}}
{{--        @livewire('admin.main.expired-subscribers-table')--}}
{{--    </div>--}}
</x-layouts.admin.admin-layout>
