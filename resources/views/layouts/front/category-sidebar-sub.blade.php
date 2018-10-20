<a href="{{ route('front.category.slug', $category->slug) }}">{{ $category->name }}</a>
@if($subs)
    <ul class="list-unstyled sidebar-category-sub">
    @foreach($subs as $sub)
        <li @if(request()->segment(2) == $sub->slug) class="active" @endif ><a href="{{ route('front.category.slug', $sub->slug) }}">{{ $sub->name }}</a></li>
    @endforeach
    </ul>
@endif
