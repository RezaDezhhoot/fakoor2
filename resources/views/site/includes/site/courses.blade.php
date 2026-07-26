<section class="course-types-section py-5">
    <div class="container">
        
        {{-- هدر سکشن --}}
        <div class="section-header text-center mb-5">
            <h2 class="section-title fw-bold">دوره‌های ما</h2>
            <p class="text-muted mt-2">آموزش حضوری یا آنلاین؟ انتخاب با شماست</p>
        </div>

        {{-- شبکه کارت‌ها --}}
        <div class="course-types-grid">

            {{-- کارت دوم: دوره‌های آنلاین --}}
            <div class="course-type-card online-card shadow-md radius-lg overflow-hidden">
                <div class="course-type-card__body">

                    {{-- محتوای متنی --}}
                    <div class="course-type-card__content">
                        <h3 class="course-type-card__title">دوره های آنلاین</h3>
                        <p class="text-teal course-type-card__subtitle">یادگیری از هرجا در هر زمان</p>
                        
                        <ul class="course-type-card__list">
                            <li class="course-type-card__item">
                                <span class="course-type-card__icon-wrapper bg-teal-light text-teal">
                                    <svg class="course-type-card__icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </span>
                                <span class="course-type-card__text">دسترسی دائمی به ویدیوها</span>
                            </li>
                            <li class="course-type-card__item">
                                <span class="course-type-card__icon-wrapper bg-teal-light text-teal">
                                    <svg class="course-type-card__icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </span>
                                <span class="course-type-card__text">صرفه جویی در زمان و هزینه</span>
                            </li>
                            <li class="course-type-card__item">
                                <span class="course-type-card__icon-wrapper bg-teal-light text-teal">
                                    <svg class="course-type-card__icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </span>
                                <span class="course-type-card__text">پشتیبانی آنلاین</span>
                            </li>
                            <li class="course-type-card__item">
                                <span class="course-type-card__icon-wrapper bg-teal-light text-teal">
                                    <svg class="course-type-card__icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </span>
                                <span class="course-type-card__text">مناسب برای شاغلین و دانشجویان</span>
                            </li>
                        </ul>

                        <a href="/courses?category=&property=online" class="course-type-card__btn bg-teal text-white radius-lg shadow-md">
                            <svg class="course-type-card__btn-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" /></svg>
                            <span>مشاهده دوره های آنلاین</span>
                        </a>
                    </div>
                    {{-- تصویر کارت --}}
                    <div class="course-type-card__media">
                        <img src="{{ asset('site/images/online-class.png') }}" alt="دوره‌های آنلاین" class="course-type-card__img" loading="lazy">
                    </div>

                </div>
            </div>
            
            {{-- کارت اول: دوره‌های حضوری --}}
            <div class="course-type-card visit-card shadow-md radius-lg overflow-hidden">
                <div class="course-type-card__body">
                    {{-- محتوای متنی --}}
                    <div class="course-type-card__content">
                        <h3 class="course-type-card__title">دوره های حضوری</h3>
                        <p class="text-teal course-type-card__subtitle">یادگیری عمیق در کلاس های مجهز</p>
                        
                        <ul class="course-type-card__list">
                            <li class="course-type-card__item">
                                <span class="course-type-card__icon-wrapper bg-primary-light text-primary">
                                    <svg class="course-type-card__icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </span>
                                <span class="course-type-card__text">تعامل مستقیم با استاد</span>
                            </li>
                            <li class="course-type-card__item">
                                <span class="course-type-card__icon-wrapper bg-primary-light text-primary">
                                    <svg class="course-type-card__icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </span>
                                <span class="course-type-card__text">پشتیبانی و رفع اشکال حضوری</span>
                            </li>
                            <li class="course-type-card__item">
                                <span class="course-type-card__icon-wrapper bg-primary-light text-primary">
                                    <svg class="course-type-card__icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </span>
                                <span class="course-type-card__text">امکان کار گروهی و پروژه های عملی</span>
                            </li>
                            <li class="course-type-card__item">
                                <span class="course-type-card__icon-wrapper bg-primary-light text-primary">
                                    <svg class="course-type-card__icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                </span>
                                <span class="course-type-card__text">مناسب برای یادگیری حرفه ای</span>
                            </li>
                        </ul>

                        <a href="/courses?category=&property=in_person" class="course-type-card__btn bg-primary text-white radius-lg shadow-md">
                            <svg class="course-type-card__btn-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" /></svg>
                            <span>مشاهده دوره های حضوری</span>
                        </a>
                    </div>

                    {{-- تصویر کارت --}}
                    <div class="course-type-card__media">
                        <img src="{{ asset('site/images/in-person-class.png') }}" alt="دوره‌های حضوری" class="course-type-card__img" loading="lazy">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
