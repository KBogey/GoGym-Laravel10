@extends('public.base')

@section('title', 'Se connecter')

@section('intro')

    <div class="py-4 d-flex justify-content-center" style="background-color: #f67337">
        <div class="p-3 rounded border-0">
            <h4>@yield('title')</h4>
            @include('shared.flash')
            <form action="{{ route('login') }}" method="post" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', [ 'type' => 'email', 'class' => 'col', 'name' => 'email',  'label' => 'Email', 'value' => 'john@doe.fr'])
                </div>
                <div class="row">
                    @include('shared.input', [ 'type' => 'password', 'class' => 'col', 'name' => 'password',  'label' => 'Mot de passe', 'value' => '**********' ])
                </div>
                <div class="text-end">
                    <button class="btn btn-outline-light">
                        Se connecter
                    </button>
                </div>
            </form>
        </div>

    </div>

@endsection
