@props(['item','show_details'=>true])

<div {{ $attributes->class(['popular-course-item' => $attributes->has('class')]) }}>
    <div class="card card-item card-preview course-card-fixed">
        <div class="card-image course-card-fixed__image">
            <a href="{{ route('course',$item['slug']) }}" class="d-block course-card-fixed__image-link">
                <img class="card-img-top course-card-fixed__img" src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" />
            </a>

            <div class="course-badge-labels course-card-fixed__badges">
                <div class="course-badge">{{ $item->status_label }}</div>

                @if($item['has_reduction'] && $item['base_price'] > 0)
                    <div class="course-badge blue">٪{{ $item->reduction_percent }}-</div>
                @endif

                <div class="course-badge green">{{ $item->type_label }}</div>
            </div>
        </div>

        <div class="card-body course-card-fixed__body">
            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3 course-card-fixed__category">
                <a href="{{ route('courses',['category'=>$item->category?->slug]) }}">
                    {{ $item->category?->title }}
                </a>
            </h6>

            <h5 class="card-title course-card-fixed__title">
                <a href="{{ route('course',$item['slug']) }}" title="{{ $item['title'] }}">
                    {{ $item['title'] }}
                </a>
            </h5>

            <div class="star-inline course-card-fixed__meta">
                @if(!is_null($item->teacher))
                    <p class="card-text course-card-fixed__teacher">
                        <a>{{ $item->teacher->user->name ?? '' }}</a>
                    </p>
                @endif

                <div class="rating-wrap d-flex align-items-center py-2 course-card-fixed__rating">
                    <div class="review-stars">
                        @for($i=1; $i<=5; $i++)
                            @if($i <= $item->score)
                                <span class="la la-star"></span>
                            @else
                                <span class="la la-star-o"></span>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center course-card-fixed__price-wrap">
                @if($item['has_reduction'] && $item['base_price'] > 0)
                    <p class="card-price text-black font-weight-bold course-card-fixed__price">
                        {{ number_format($item['price']) }} تومان
                        <br/>
                        <span class="before-price font-weight-medium">{{ number_format($item['base_price']) }} تومان</span>
                    </p>
                @elseif($item['base_price'] == 0 || $item['price'] == 0)
                    <p class="card-price text-black font-weight-bold course-card-fixed__price">
                        رایگان
                    </p>
                @else
                    <p class="card-price text-black font-weight-bold course-card-fixed__price">
                        {{ number_format($item['price']) }} تومان
                    </p>
                @endif
            </div>
        </div>

        @if($show_details)
            <div class="tooltip_templates">
                <div id="{{$item['slug'].$item['id']}}" wire:ignore>
                    <div class="card card-item">
                        <div class="card-body">
                            @if(!is_null($item->teacher))
                                <p class="card-text pb-2">مدرس <a>{{ $item->teacher->user->name ?? '' }}</a></p>
                            @endif
                            <h5 class="card-title pb-1">
                                <a href="{{ route('course',$item['slug']) }}">{{ $item['title'] }}</a>
                            </h5>
                            <div class="d-flex align-items-center pb-1">
                                <h6 class="ribbon fs-14 mr-2">{{ $item->status_label }}</h6>
                                <p class="text-success fs-14 font-weight-medium">
                                    <span class="font-weight-bold pl-1">{{ $item->updated_at->diffForHumans() }}</span>
                                    به روز
                                    <span class="font-weight-bold pl-1">شد</span>
                                </p>
                            </div>
                            <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center fs-14">
                                <li>{{ $item->hours }} ساعت در کل</li>
                                <li>همه مراحل</li>
                            </ul>
                            <p class="card-text pt-1 fs-14 lh-22">
                                {!! $item->short_body !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
