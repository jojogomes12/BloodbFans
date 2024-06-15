@extends('Layout.main')
@section('title', 'História')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">História</h1>
    
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card show-card">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img class="card-img" src="/img/stories/{{$story->image}}" alt="Imagem de Capa">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $story->title }}</h5>
                            <p class="card-text">{{ $story->Content }}</p>
                            <p class="card-text mt-2 text-muted">Autor: {{ $story->user->name }} </p>
                            <a href="{{ route('Welcome') }}" class="btn btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>
@endsection
