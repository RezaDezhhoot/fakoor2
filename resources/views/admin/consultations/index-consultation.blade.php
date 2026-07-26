<div>
    @section('title','درخواست های مشاوره')
    <x-admin.form-control store="{{false}}" title="درخواست های مشاوره"/>
    <div class="card card-custom">
        <div class="card-body">
            <x-admin.forms.dropdown id="checked" :data="$data['checked']" label="وضعیت بررسی" wire:model="checked"/>
            @include('admin.layouts.advance-table')
            <div class="row">
                <div class="col-lg-12 table-responsive">
                    <table class="table table-striped table-bordered" id="kt_datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام و نام خانوادگی</th>
                            <th>شماره تماس</th>
                            <th>ایمیل</th>
                            <th>تاریخ</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($consultations as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email ?: '-' }}</td>
                                <td>{{ $item->date }}</td>
                                <td>
                                    <button type="button" wire:click="toggleChecked({{ $item->id }})" class="btn btn-sm {{ $item->checked ? 'btn-light-success' : 'btn-light-warning' }}">
                                        {{ $item->checked_label }}
                                    </button>
                                </td>
                                <td>
                                    <x-admin.edit-btn href="{{ route('admin.store.consultation',['edit', $item->id]) }}" />
                                    <x-admin.delete-btn onclick="deleteItem({{$item->id}})" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="7">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $consultations->links('admin.layouts.paginate') }}
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف درخواست!',
                text: 'آیا از حذف این درخواست اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                    @this.call('delete', id)
                }
            })
        }
    </script>
@endpush
