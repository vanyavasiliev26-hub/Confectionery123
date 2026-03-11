@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Вывод сообщений об успехе --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Управление каталогом</h1>
        <a href="{{ route('admin.catalog.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Добавить товар
        </a>
    </div>

    <div class="row">
        @forelse ($catalog as $el)
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/' . $el->image) }}" 
                     class="card-img-top" 
                     alt="{{ $el->title }}"
                     style="height: 200px; object-fit: cover;">
                
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $el->title }}</h5>
                    <p class="card-text flex-grow-1">{{ $el->description }}</p>
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="h5 text-primary">{{ number_format($el->price, 0, ',', ' ') }} ₽</span>
                        <span class="badge {{ $el->quantity > 0 ? 'bg-success' : 'bg-danger' }}">
                            {{ $el->quantity > 0 ? 'В наличии: ' . $el->quantity . ' шт' : 'Нет в наличии' }}
                        </span>
                    </div>
                    
                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('admin.catalog.edit', $el->id) }}" 
                           class="btn btn-warning flex-fill">
                            <i class="bi bi-pencil"></i> Редактировать
                        </a>
                        
                        <form action="{{ route('admin.catalog.destroy', $el->id) }}" 
                              method="POST" 
                              class="flex-fill"
                              onsubmit="return confirm('Вы уверены, что хотите удалить товар?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="bi bi-trash"></i> Удалить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                В каталоге пока нет товаров. 
                <a href="{{ route('admin.catalog.create') }}" class="alert-link">Добавить первый товар</a>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection