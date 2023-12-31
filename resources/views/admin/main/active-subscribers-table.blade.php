<div class="card-body">
    <div class="mb-3">
        <input wire:model.live="search" type="text" class="form-control w-20" placeholder="البحث">
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
            <tr>
                <th width="10%">الرقم</th>
                <th>الاسم</th>
                <th>الصورة</th>
                <th>رقم الجوال</th>
                <th>سعر الاشتراك</th>
                <th>حالة الدفعة</th>
                <th> تاريخ الاشتراك</th>
                <th>تاريخ الانتهاء</th>
                <th>حالة الاشتراك</th>
                <th>الأمر</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @if (count($active_subscribers) > 0)
                @foreach ($active_subscribers as $key => $subscriber)
                    <tr>
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td>
                            <span class="fw-medium">{{ $subscriber->name }}</span>
                        </td>
                        <td>
                            <div class="avatar avatar-lg me-2">
                                <img src="{{ asset($subscriber->image) }}" alt="Avatar" class="rounded-circle">
                            </div>
                        </td>
                        <td>{{ $subscriber->phone }}</td>
                        @if ($subscriber->subscriptions)
                            <td>{{ $subscriber->subscriptions->subscription_price  }} <i
                                    class="fa-solid fa-shekel-sign"></i></td>
                        @endif
                        <td>
                            @if ($subscriber->subscriptions)
                                @if($subscriber->subscriptions->payment->payment_status=="full")
                                    <span class="badge bg-label-success">
                                        كامل</span>
                                @elseif($subscriber->subscriptions->payment->payment_status=="partial")
                                    <span class="badge bg-label-warning">متبقي  {{  $subscriber->subscriptions->payment->remaining_payment }} <i
                                            class="fa-solid fa-shekel-sign"></i>     </span>
                                @elseif($subscriber->subscriptions->payment->payment_status=="not_paid")
                                    <span class="badge bg-label-danger">
                                       لم يتم الدفع</span>
                                @endif
                            @endif
                        </td>
                        <td>{{ $subscriber->subscriptions->start_date ?? '' }}</td>
                        <td>{{ $subscriber->subscriptions->end_date ?? '' }}</td>
                        <td>
                            @if ($subscriber->subscriptions)
                                @if ($subscriber->subscriptions->status == 'active' ?? '')
                                    <span class="badge bg-label-info">
                                            فعال</span>
                                @elseif($subscriber->subscriptions->status == 'expired' ?? '')
                                    <span class="badge bg-label-danger">
                                            منتهي</span>
                                @endif
                            @endif
                        </td>
                        <td>

                            <div class="d-inline">
                                @if ($subscriber->subscriptions)
                                    @if ($subscriber->subscriptions->status == 'active')
                                        <!-- Hide the "Subscribe" button -->
                                    @elseif($subscriber->subscriptions->status=="expired")
                                        <button wire:click="$dispatch('subscriptionCreate',{id:{{ $subscriber->id }}})"
                                                type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                                            اضافة
                                            اشتراك
                                        </button>
                                    @endif
                                @else
                                    <button wire:click="$dispatch('subscriptionCreate',{id:{{ $subscriber->id }}})"
                                            type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                                        اضافة
                                        اشتراك
                                    </button>
                                @endif
                                <div class="d-inline dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a wire:click="$dispatch('subscriberUpdate',{id:{{ $subscriber->id }}})"
                                           class="dropdown-item" href="javascript:void(0);"><i
                                                class="ti ti-pencil me-1"></i>
                                            تعديل</a>
                                        <a wire:click="$dispatch('subscriberDelete',{id:{{ $subscriber->id }}})"
                                           class="dropdown-item" href="javascript:void(0);"><i
                                                class="ti ti-trash me-1"></i>
                                            حذف</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{ $active_subscribers->links() }}
    </div>
</div>
