<div class="card my-2 h-100">

    <img src="{{ asset('img/goGymLogoOr.png') }}" alt="" class="w-100" style="height: 70px; object-fit: cover;">

    <div class="card-body">
        <h5 class="card-title">
            <a href="{{route('public.post.show', ['slug' => $post->getSlug(), 'post' => $post])}}" class="text-info">{{ $post->title }}</a>
        </h5>
        <span>Catégorie : <strong>{{ $post->category->label }}</strong></span>
        <p class="card-text text-primary-emphasis">{{ substr($post->content, 0, 50) }}</p>
    </div>
</div>
