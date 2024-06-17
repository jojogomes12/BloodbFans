@extends('Layout.main')

@section('title', 'Dashboard')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-left mb-4 mt-4"> 
                @if($search)
                    <h1 class="first-text">Buscando por: {{ $search }}</h1>
                   
                @else
                <h1 class="mb-4">História</h1>
                @endif

                @if(count($stories) == 0 && $search)
                    <p>Não foi possível localizar histórias com o termo <strong>{{ $search }}</strong>. <a href="{{ route('Welcome') }}">Voltar</a></p>
                @endif
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        @foreach ($stories as $s)
            @php
            $formattedDate = date('d/m/Y', strtotime($s->created_at));
            @endphp
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="/img/stories/{{ $s->image }}" alt="Imagem de Capa">
                    <div class="card-body">
                        <h5 class="card-title">{{ $s->title }}</h5>
                        <p class="card-text">{{ $s->subtitle }}</p>
                        <a href="{{ route('story.show', ['id' => $s->id]) }}" class="btn btn-primary">Saber Mais</a>
                        <p class="card-text"><small class="text-muted">Publicado em {{ $formattedDate }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
