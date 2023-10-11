@extends('admin.base')

@section('title', $category->exists ? "Editer une catégorie" : "Créer une catégorie")

@section('content')
    <h1>@yield('title')</h1>
    <form action="{{ route($category->exists ? 'admin.category.update' : 'admin.category.store', ['category' => $category] ) }}" method="post">

        @csrf
        @method($category->exists ? 'put' : 'post')

        <div class="row">
            <div class="col" style="flex: 100">
                <div class="row">
                    @include('shared.input', ['class' => 'col my-2', 'name' => 'label', 'value' => $category->label])
                </div>
                <div>
                    <button class="btn btn-primary">
                        @if($category->exists)
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
