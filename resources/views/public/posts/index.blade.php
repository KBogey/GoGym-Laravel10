@extends('public.base')

@section('title', 'Tous les billets')

@section('intro')
    <div class="container-fluid" style="background-color: #f67337">
        <div class="py-4"></div>
    </div>
@endsection

@section('content')
    <style>
        ::placeholder {
            color: rgb(102, 77, 3, 0.8) !important;
        }
    </style>

    <div class="container">
            <div class="row justify-content-center ms-4">

                @forelse($posts as $post)
                    <div class="col-4 mb-5">
                        @include('public.posts.card')
                    </div>
                @empty
                    <div class="col text-center">
                        Aucun billet ne correspond à votre recherche.
                    </div>
                @endforelse
            </div>
    </div>
    <div class="container my-4">
        {{ $posts->links() }}
    </div>

@endsection
