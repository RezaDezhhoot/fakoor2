@php
    $defaultSliderImage = 'site/images/slider-img1.jpg';
    $sliderImagePath = trim((string) $sliderImage);
    $sliderImageUrl = asset($sliderImagePath);

    if ($sliderImagePath !== '') {
        $normalizedSliderImage = ltrim($sliderImagePath, '/');

        if (filter_var($sliderImagePath, FILTER_VALIDATE_URL)) {
            $sliderImageUrl = $sliderImagePath;
        } elseif (file_exists(public_path($normalizedSliderImage))) {
            $sliderImageUrl = asset($normalizedSliderImage);
        }
    }

    $sliderUrl = !empty($sliderLink) ? $sliderLink : route('courses');
@endphp

<div>
<div>
    {{-- بخش هیرو اصلی --}}
    <section class="hero-section py-10">
        <div class="container">
            <div class="hero-grid">
                
                {{-- محتوای متنی --}}
                <div class="hero-content">
                    <div class="hero-badge mb-4">
                        <span class="hero-badge-dot"></span>
                        <span class="text-muted">با مجوز رسمی از سازمان فنی و حرفه‌ای کشور</span>
                    </div>

                    <div class="hero-text-area">
                        
                            <h1 class="hero-title">آموزشگاه کامپیوتر <span class="text-primary">فکور</span></h1>
                            <h2 class="hero-subtitle">مرکز تخصصی آموزش کامپیوتر در بجنورد</h2>
                            <p class="text-muted hero-desc">
                                آموزش مهارت‌های کاربردی و بازارمحور در محیطی حرفه‌ای با اساتید مجرب، تجهیزات به‌روز و پشتیبانی مستمر.
                            </p>
                    </div>

                    <div class="hero-actions d-flex flex-column flex-md-row gap-3 mt-4">
                        <a href="{{ route('courses') }}" class="justify-content-center btn-custom bg-primary text-white radius-lg shadow-md">
                            <i class="la la-eye"></i>
                            <span>مشاهده دوره‌ها</span>
                        </a>
                        <a href="{{ $sliderUrl }}" class="ml-md-2 btn-custom justify-content-center border-primary text-primary radius-lg">
                            <i class="la la-comments"></i>
                            <span>مشاوره رایگان</span>
                        </a>
                    </div>
                </div>

                {{-- بخش تصویر با المان‌های تزئینی مطابق عکس --}}
                <div class="hero-media-wrapper">
                    <div class="dot-pattern top-left"></div>
                    <div class="dot-pattern bottom-right"></div>
                    <div class="hero-image-frame shadow-md radius-lg bg-white p-3">
                        <img src="{{ $sliderImageUrl }}" alt="آموزشگاه فکور" class="img-fluid radius-lg">
                    </div>
                </div>
            </div>
        </div>

    {{-- بخش ویژگی‌های زیر هیرو (Reusable Cards) --}}
    <section class="hero-features pt-5 pb-5">
        <div class="container">
            <div class="features-row">
                {{-- کارت ۱ --}}
                <div class="feature-item bg-white shadow-md radius-lg p-4">
                    <div class="feature-icon bg-primary-light text-primary">
                        <i class="la la-certificate"></i>
                    </div>
                    <span class="feature-label">مدرک معتبر فنی و حرفه‌ای</span>
                </div>
                
                {{-- کارت ۲ --}}
                <div class="feature-item bg-white shadow-md radius-lg p-4">
                    <div class="feature-icon bg-teal-light text-teal">
                        <i class="la la-project-diagram"></i>
                    </div>
                    <span class="feature-label">آموزش عملی و پروژه محور</span>
                </div>

                {{-- کارت ۳ --}}
                <div class="feature-item bg-white shadow-md radius-lg p-4">
                    <div class="feature-icon bg-primary-light text-primary">
                        <i class="la la-user-tie"></i>
                    </div>
                    <span class="feature-label">آموزش مهارتی و اشتغال علمی فکور</span>
                </div>

                {{-- کارت ۴ --}}
                <div class="feature-item bg-white shadow-md radius-lg p-4">
                    <div class="feature-icon bg-teal-light text-teal">
                        <i class="la la-headset"></i>
                    </div>
                    <span class="feature-label">پشتیبانی و مشاوره</span>
                </div>
            </div>
        </div>
    </section>
    </section>
</div>

</div>
