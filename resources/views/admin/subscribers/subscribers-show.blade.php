<x-master-modal functionName="submit" modalId="showModal" modalTitle="عرض تفاصيل المشترك">
    @if($subscriber)
        <div class="card mb-4">
            <div class="card-body">
                <div class="user-avatar-section">
                    <div class="d-flex align-items-center flex-column">
                        <img class="img-fluid rounded mb-3 pt-1 mt-4" src="{{ asset($subscriber->image) }}" height="100"
                             width="100" alt="User avatar">
                        <div class="user-info text-center">
                            <h4 class="mb-2">{{$subscriber->name}}</h4>
                            <span class="badge bg-label-secondary mt-1">{{$subscriber->gender}}</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
                    <div class="d-flex align-items-start me-4 mt-3 gap-2">
                        <span class="badge bg-label-primary p-2 rounded"><i class="fa-solid fa-shekel-sign ti-sm"></i></span>
                        <div>
                                <p class="mb-0 fw-medium">{{$subscriber->subscriptions->last()->subscription_price}}</p>
                                <small>سعر الاشتراك</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mt-3 gap-2">
                        <span class="badge bg-label-primary p-2 rounded"><i class="ti ti-briefcase ti-sm"></i></span>
                        <div>
                            <p class="mb-0 fw-medium">568</p>
                            <small>Projects Done</small>
                        </div>
                    </div>
                </div>
                <p class="mt-4 small text-uppercase text-muted">التفاصيل</p>
                <div class="info-container">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <span class="fw-medium me-1">تاريخ الاشتراك:</span>
                            <span>{{$subscriber->subscriptions->last()->start_date}}</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-medium me-1">تاريخ انتهاء الاشتراك:</span>
                            <span>{{$subscriber->subscriptions->last()->end_date}}</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-medium me-1">حالةالاشتراك:</span>
                            <span class="badge bg-label-success">{{$subscriber->subscriptions->last()->status}}</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-medium me-1">:مدة الاشتراك</span>
                            <span> {{$subscriber->subscriptions->last()->duration ?? ''}}  شهر</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-medium me-1">المبلغ المدفوع:</span>
                            <span>{{$subscriber->subscriptions->last()->payment->payment_amount }} شيكل</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-medium me-1">المبلغ المتبقي:</span>
                            <span>{{$subscriber->subscriptions->last()->payment->remaining_payment }} شيكل</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-medium me-1">Languages:</span>
                            <span>French</span>
                        </li>
                        <li class="pt-1">
                            <span class="fw-medium me-1">Country:</span>
                            <span>England</span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    @endif
</x-master-modal>
