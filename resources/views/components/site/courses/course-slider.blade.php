@props(['data', 'popular'])
<section class="course-area py-5 popular-courses-section">
    <div class="container">
        <!-- اضافه کردن Header اختصاصی برای حالت محبوب‌ترین دوره‌ها -->
        <div class="d-flex justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="section__title">{{$data['title']}}</h2>
                <span class="section-divider"></span>
            </div>
            @if($popular)
            <a href="{{ route('courses') }}" class="btn-text">
                مشاهده همه دوره ها <i class="la la-arrow-left"></i>
            </a>
            @endif
        </div>

        <div class="course-carousel owl-action-styled mt-30px">
            @foreach($data['content'] as $item)
                {{-- کلاس popular-course-item را برای استایل‌دهی خاص اضافه می‌کنیم --}}
                <x-site.courses.course-box :item="$item" class="popular-course-item" />
            @endforeach
        </div>
    </div>
</section>
