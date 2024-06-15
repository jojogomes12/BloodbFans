@extends('Layout.main')
@section('title', 'Create Story')

@section('content')

<div class="container mt-5">
    <div id="story-create-container" class="col-md-8 offset-md-2">
        <h1 class="text-center mb-4">Crie a Sua História</h1>

        <form action="/story" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Título da História" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="subtitle">Subtítulo:</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Digite o Subtítulo da História" value="{{ old('subtitle') }}">
            </div>

            <div class="form-group">
                <label for="content">Descrição:</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror" placeholder="Digite a História" required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="subtitle">Adicione categorias:</label>
               <div class="from-group">
                <input type="checkbox" name="categories[]" value="Acao">Ação
               </div>
               <div class="from-group">
                <input type="checkbox" name="categories[]" value="Terror">Terror
               </div>
               <div class="from-group">
                <input type="checkbox" name="categories[]" value="Romance">Romance
                <div class="from-group">
                    <input type="checkbox" name="categories[]" value="Aventura">Aventura
                   </div>
                   <div class="from-group">
                    <input type="checkbox" name="categories[]" value="Sci-fi">Sci-fi
                   </div>     
            </div>
            </div>

            <div class="form-group">
                <label for="image">Imagem:</label>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <small id="imageHelp" class="form-text text-muted">A imagem deve ter tamanho mínimo para não distorcer a visualização.</small>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Criar História</button>
            </div>
        </form>
    </div>
</div>

@endsection
