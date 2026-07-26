<div>
    <x-site.breadcrumbs :data="$page_address" title="مشاوره رایگان" />

    <section class="contact-area position-relative py-5">
        <span class="ring-shape ring-shape-1"></span>
        <span class="ring-shape ring-shape-2"></span>
        <span class="ring-shape ring-shape-3"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card card-item">
                        <div class="card-body p-4 p-lg-5">
                            <div class="section-heading mb-4">
                                <h2 class="section__title fs-28">درخواست مشاوره رایگان</h2>
                                <p class="section__desc mt-2">اطلاعات خود را ثبت کنید تا کارشناسان ما برای مشاوره با شما تماس بگیرند.</p>
                            </div>

                            <form wire:submit.prevent="store" class="contact-form">
                                <div class="input-box">
                                    <label class="label-text">نام و نام خانوادگی*</label>
                                    <div class="form-group">
                                        <input wire:model.defer="full_name" class="form-control form--control" type="text" placeholder="نام و نام خانوادگی" />
                                        <span class="la la-user input-icon"></span>
                                    </div>
                                    @error('full_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="input-box">
                                    <label class="label-text">شماره تماس*</label>
                                    <div class="form-group">
                                        <input wire:model.defer="phone" class="form-control form--control" type="text" placeholder="شماره تماس" />
                                        <span class="la la-phone input-icon"></span>
                                    </div>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="input-box">
                                    <label class="label-text">ایمیل</label>
                                    <div class="form-group">
                                        <input wire:model.defer="email" class="form-control form--control" type="email" placeholder="ایمیل" />
                                        <span class="la la-envelope input-icon"></span>
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="input-box">
                                    <label class="label-text">توضیحات درباره موضوع مشاوره</label>
                                    <div class="form-group">
                                        <textarea wire:model.defer="description" class="form-control form--control pl-4" rows="5" placeholder="موضوع یا سوال خود را بنویسید"></textarea>
                                    </div>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="btn-box">
                                    <button class="btn theme-btn" type="submit">ثبت درخواست مشاوره</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
