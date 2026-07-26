<div>
    <livewire:site.includes.site.slider />
    @include("site.includes.site.courses")
    <div class="row">
        @foreach($content as $item)
        @if($item['category'] == 'quizzes' || $item['title'] == 'آزمون')
            @continue
        @endif
        <div class="col-lg-{{$item['width']}} col-12 px-4">
            @switch($item['category'])
            @case('categories')
            {{-- @if($item['type'] == 'slider')
            <x-site.categories.category-slider :data="$item" />
            @else
            <x-site.categories.category-grid :data="$item" />
            @endif
            @break
            --}}
            @case('organizations')
            @if($item['type'] == 'slider')
            <x-site.organizations.organization-slider :data="$item" />
            @else
            <x-site.organizations.organization-grid :data="$item" />
            @endif
            @break
            @case('courses')
            @if($item['type'] == 'slider')
            <x-site.courses.course-slider :data="$item" :popular="true" />
            @else
            <x-site.courses.course-grid :data="$item" />
            @endif
            @break
            @case('articles')
            @if($item['type'] == 'slider')
            @include("site.includes.site.testimonials")
            <x-site.articles.articles-slider :data="$item" />
            @else
            <x-site.articles.articles-grid :data="$item" />
            @endif
            @break
            @case('banners')
            <x-site.banners.banner :data="$item" />
            @break 
            @endswitch
        </div>
        @endforeach
    </div>
    @include("site.includes.site.cta-section")
    @include("site.includes.site.gallery-section")
</div>