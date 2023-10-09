<div class="card-body">
    <div class="ml-20">
        <input wire:model.live="search" type="text" class="form-control w-20" placeholder="البحث">
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th width="10%">الرقم</th>
                    <th>الاسم</th>
                    <th>النوع</th>
                    <th>الرياضة</th>
                    <th>السعر</th>
                    <th>الأمر</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if (count($data) > 0)
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td>
                                <span class="fw-medium">{{ $item->name }}</span>
                            </td>
                            <td>
                                @if ($item->gender == 'male')
                                    رجال
                                @else
                                    نساء
                                @endif
                            </td>
                            <td>
                                @if ($item->sport_type == 'body_building')
                                    كمال أجسام
                                @else
                                    لياقة بدنية
                                @endif
                            </td>
                            <td>{{ $item->price }} شيكل</td>
                            <td>
                                <div class="d-inline dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a wire:click="$dispatch('planUpdate',{id:{{ $item->id }}})"
                                            class="dropdown-item" href="javascript:void(0);"><i
                                                class="ti ti-pencil me-1"></i>
                                            تعديل</a>
                                        <a wire:click="$dispatch('planDelete',{id:{{ $item->id }}})"
                                            class="dropdown-item" href="javascript:void(0);"><i
                                                class="ti ti-trash me-1"></i>
                                            حذف</a>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
</div>
