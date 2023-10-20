<div class="row mb-4" id="sortable-cards">
    <div class="col-lg-3 col-md-6 col-sm-12" draggable="false" style="">
        <div class="card drag-item cursor-move mb-lg-0 mb-4">
            <div class="card-body text-center">
                <h2>
                    <i class="ti ti-currency-shekel text-info display-6 bold"></i>
                </h2>
                <h4>اجمالي الايرادات</h4>
                <h5>{{ $total }} </h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12" draggable="false" style="">
        <div class="card drag-item cursor-move mb-lg-0 mb-4">
            <div class="card-body text-center">
                <h2>
                    <i class="ti ti-user-x text-danger display-6 bold"></i>
                </h2>
                <h4>عدد المشتركي المنتهين</h4>
                <h5>{{ $expired_subscribers }} </h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12" draggable="false" style="">
        <div class="card drag-item cursor-move mb-lg-0 mb-4">
            <div class="card-body text-center">
                <h2>
                    <i class="ti ti-user-check text-success display-6"></i>
                </h2>
                <h4>عدد المشتركي النشطين</h4>
                <h5>{{ $active_subscribers }} </h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12" draggable="false" style="">
        <div class="card drag-item cursor-move mb-lg-0 mb-4">
            <div class="card-body text-center">
                <h2>
                    <i class="ti ti-user text-primary display-6"></i>
                </h2>
                <h4>عدد المشتركين</h4>
                <h5>{{ $total_subscribers }}</h5>
            </div>
        </div>
    </div>

</div>
