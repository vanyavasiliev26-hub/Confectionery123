@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('images/' . $catalogss->image) }}" 
                     class="card-img-top" 
                     alt="{{ $catalogss->title }}"
                     style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><a href="{{ route('catalog.one', $catalogss->id) }}">{{ $catalogss->title }}</a></h5>
                    <p class="card-text flex-grow-1">{{ $catalogss->description }}</p>
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="h5 text-primary">{{ number_format($catalogss->price, 0, ',', ' ') }} ₽</span>
                        <span class="badge {{ $catalogss->quantity > 0 ? 'bg-success' : 'bg-danger' }}">
                            {{ $catalogss->quantity > 0 ? 'В наличии: ' . $catalogss->quantity . ' шт' : 'Нет в наличии' }}
                        </span>
                    </div>
                    
                    <button class="btn btn-primary w-100 mt-3" 
                            {{ $catalogss->quantity == 0 ? 'disabled' : '' }}>
                        <i class="bi bi-cart-plus"></i> Добавить в корзину
                    </button>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

