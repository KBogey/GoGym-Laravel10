@extends('public.base')

@section('title', 'Contact')

@section('intro')

    <div class="py-4 d-flex justify-content-center" style="background-color: #f67337">
        <div class="p-3 rounded border-0">
            <h4>Une question ? Une remarque ? Vos retours seront toujours appréciés.</h4>
            @include('shared.flash')
            <form action="{{ route('public.contact.emails') }}" method="post" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', [ 'class' => 'col', 'name' => 'firstname',  'label' => 'Prénom', 'value' => 'John' ])
                    @include('shared.input', [ 'class' => 'col', 'name' => 'lastname',  'label' => 'Nom', 'value' => 'Doe' ])
                </div>
                <div class="row">
                    @include('shared.input', [ 'class' => 'col', 'name' => 'phone',  'label' => 'Téléphone', 'value' => '06 00 00 00 00' ])
                    @include('shared.input', [ 'type' => 'email', 'class' => 'col', 'name' => 'email',  'label' => 'Email', 'value' => 'john@doepublic.fr' ])
                </div>
                @include('shared.input', [ 'type' => 'textarea', 'class' => 'col', 'name' => 'message',  'label' => 'Votre message', 'value' => 'Votre message' ])
                <div class="text-end">
                    <button class="btn btn-outline-light">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
