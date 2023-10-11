<div class="card my-2">
    @if($post->getImage())
        <img src="{{ $post->getImage()->getImageUrl(360, 230) }}" alt="" class="w-100">
    @else
        <img src="/img/goGymLogoOr.png" alt="" class="w-100" style="width: 360px; height: 190px; object-fit: cover;">
    @endif
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('post.show', ['slug' => $post->getSlug(), 'post' => $post]) }}" class="text-info-emphasis">{{ $post->title }}</a>
        </h5>
        <div class="card-text text-dark" style="font-size: 1.4rem">
           <p>{{ $post->content }}</p>
        </div>
    </div>
</div>
