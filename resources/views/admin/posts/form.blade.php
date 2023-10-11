@extends('admin.base')

@section('title', $post->exists ? "Editer un post" : "Créer un post")

@section('content')
    <h1>@yield('title')</h1>
    <form action="{{ route($post->exists ? 'admin.post.update' : 'admin.post.store', ['post' => $post] ) }}" method="post">

        @csrf
        @method($post->exists ? 'put' : 'post')

        <div class="row">
            <div class="col" style="flex: 100">
                <div class="row">
                    @include('shared.input', [ 'class' => 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $post->title ])
                </div>
                <div class="row">
                    @include('shared.input', [ 'type'=> 'textarea', 'label' => 'Contenu du post', 'class' => 'col', 'name' => 'content', 'value' => $post->content ])
                </div>
                <div class="row">
                    <div class="form-group my-2">
                        <label class="pb-2" for="category">Catégorie</label>
                        <select class="form-control" name="category_id" id="category">
                                <option value="">Sélectionner une catégorie</option>
                            @foreach($categories as $category)
                                <option @selected(old('category_id', $post->category_id) == $category->id ) value="{{ $category->id }}">{{ $category->label }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div>
                    <button class="my-4 btn btn-outline-primary">
                        @if($post->exists)
                            Modifier
                        @else
                            Créer
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
