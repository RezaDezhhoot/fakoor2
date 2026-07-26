<div>
    @section('title','درخواست مشاوره')
    <x-admin.form-control deleteAble="true" deleteContent="حذف درخواست" mode="{{$mode}}" title="درخواست مشاوره" />
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $header }}</h3>
        </div>
        <x-admin.forms.validation-errors/>
        <div class="card-body">
            <x-admin.form-section label="اطلاعات درخواست">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th>نام و نام خانوادگی</th>
                                <td>{{ $consultation->full_name }}</td>
                            </tr>
                            <tr>
                                <th>شماره تماس</th>
                                <td>{{ $consultation->phone }}</td>
                            </tr>
                            <tr>
                                <th>ایمیل</th>
                                <td>{{ $consultation->email ?: '-' }}</td>
                            </tr>
                            <tr>
                                <th>تاریخ</th>
                                <td>{{ $consultation->date }}</td>
                            </tr>
                            <tr>
                                <th>توضیحات</th>
                                <td>{{ $consultation->description ?: '-' }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </x-admin.form-section>

            <div class="row">
                <x-admin.forms.checkbox value="1" id="checked" label="بررسی شده" wire:model.defer="checked" />
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteItem() {
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
                    @this.call('deleteItem')
                }
            })
        }
    </script>
@endpush
