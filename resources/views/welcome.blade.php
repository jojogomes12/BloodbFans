@extends('Layout.main')

@section('title', 'Home')

@section('content')

<div class="container mt-5">
    <div class="row">
        @foreach ($stories as $s)
        @php
        $date = date_format($s->created_at, 'd/m/Y');
        @endphp
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/img/stories/{{ $s->image }}" alt="Imagem de Capa">
                <div class="card-body">
                    <h5 class="card-title">{{ $s->title }}</h5>
                    <p class="card-text">{{ $s->subtitle }}</p>
                    <a href="{{ route('story.show', ['id' => $s->id]) }}" class="btn btn-primary">Saber Mais</a>
                    <p class="card-text">{{ $date }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
