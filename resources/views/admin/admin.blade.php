@extends('admin.base')

@section('title', ' Au boulot ! ')

@section('intro')
    <div class="text-justify text-dark p-5" style="background-color: #52d7ff">
        <h1 class="mx-5 mt-2">N´hésitez pas à ajouter vos billets !</h1>
    </div>
@endsection

@section('content')
    <h2 class="text-dark">Les dernières actus ajoutées</h2>
    <div class="row my-2">
        @foreach($posts as $post)
            <div class="col">
                @include('post.card')
            </div>
        @endforeach
    </div>
    <div class="row my-2">

    </div>
@endsection
