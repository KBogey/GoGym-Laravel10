@extends('admin.base')

@section('title', ' Au boulot ! ')

@section('intro')
    <div class="text-justify text-dark p-5" style="background-color: #52d7ff">
        <h1 class="mx-5 mt-2">N´hésitez pas à ajouter vos billets !</h1>
    </div>
@endsection

@section('content')
    <h2 class="text-dark">Les derniers posts ajoutés</h2>
    <div class="container mx-2">
    <div class="row my-2 pb-2">
        <h4 class="text-dark">Posts actualités</h4>
        @foreach($postsNews as $post)
            <div class="col-3">
                <div class="card my-2 h-100">

                    <img src="/img/goGymLogoOr.png" alt="" class="w-100" style="height: 70px; object-fit: cover;">

                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="text-info">{{ $post->title }}</a>
                        </h5>
                        <span>Catégorie : <strong>{{ $post->category->label }}</strong></span>
                        <p class="card-text text-primary-emphasis">{{ substr($post->content, 0, 50) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row my-2 pb-2">
        <h4 class="text-dark">Posts nutrition</h4>
        @foreach($postsNutri as $post)
            <div class="col-3">
                <div class="card my-2 h-100">

                    <img src="/img/goGymLogoBl.png" alt="" class="w-100" style="height: 70px; object-fit: cover;">

                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="text-info">{{ $post->title }}</a>
                        </h5>
                        <span>Catégorie : <strong>{{ $post->category->label }}</strong></span>
                        <p class="card-text text-primary-emphasis">{{ substr($post->content, 0, 50) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
