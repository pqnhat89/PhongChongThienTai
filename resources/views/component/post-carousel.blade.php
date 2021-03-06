@php $post = [] @endphp

<div class="owl-carousel">
    @foreach ($post as $v)
        <div class="post-slide">
            <div class="post-img">
                <img src="{{ $v->image }}" alt="">
                <div class="post-info">
                    <ul class="category">
                        <li>in <a href="#">{{ $v->type }}</a></li>
                    </ul>
                    <span class="post-date">
                        {{ \Carbon\Carbon::parse($v->updated_at)->toFormattedDateString() }}
                    </span>
                </div>
            </div>
            <div class="post-review">
                {{-- <span class="icons">
                    <img src="/" alt="">
                </span> --}}
                <h3 class="post-title"><a href="#">{{ $v->title }}</a></h3>
                <p class="post-description">
                    {{ substr(strip_tags($v->content), 0, 200) }}  . . .
                </p>
                <a href="#" class="read">read more</a>
            </div>
        </div>
    @endforeach
</div>
