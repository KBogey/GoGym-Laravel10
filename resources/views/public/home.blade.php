@extends('public.base')

@section('title', ' Bienvenue ')

@section('intro')
    <div class="text-justify text-dark p-5" style="background-color: #f67337">
        <h1 class="mx-5 mt-2">Go Gym, tous les conseils de pro pour un entrainement efficace !</h1>
        <p class="mx-5 pt-2 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, beatae consequatur dolor dolorem doloribus eum ex, expedita facere illum impedit iure minus nobis non obcaecati qui, quia quidem quis quo rerum sed sint ut veritatis? Atque impedit optio quibusdam totam voluptas! Aut, doloremque dolores praesentium quibusdam similique vel. Deleniti eos facere facilis inventore libero reprehenderit, sed similique sit? Aspernatur consectetur cupiditate earum explicabo minus nobis qui, quia recusandae sit! Accusamus dicta ipsa iste maiores officiis perferendis reprehenderit. A eligendi ipsa necessitatibus non perferendis porro praesentium quis unde? Accusamus atque eligendi ex fuga iure laudantium, nesciunt quibusdam sint. A asperiores aut, commodi consequatur, cumque dolore ducimus eius expedita facere hic id inventore magnam nam nihil odio perspiciatis quaerat quam quas quod quos tempora totam unde ut voluptatem voluptatibus? Accusantium et facilis impedit inventore iste laudantium magni nulla quisquam tempore velit? Ab error fuga id libero nemo odio, quae quaerat veritatis voluptatum.</p>
    </div>
@endsection

@section('content')
    <div class="row mt-5">
    <h2 class="text-dark">Les dernières news</h2>
    <div class="row p-5">
        @foreach($postsNews as $post)
            <div class="col">
                @include('public.posts.card')
            </div>
        @endforeach
    </div>
    </div>
    <div class="row mt-5">
    <h2 class="text-dark">Les derniers conseils nutrition</h2>
    <div class="row p-5">
        @foreach($postsNutri as $post)
            <div class="col">
                @include('public.posts.card')
            </div>
        @endforeach
    </div>
    </div>
@endsection
