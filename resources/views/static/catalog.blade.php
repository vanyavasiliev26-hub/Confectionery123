@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Заголовок страницы -->
    <div class="page-header">
        <h1>Наши <span>сладкие творения</span></h1>
        <div class="decoration-line"></div>
        <p class="text-muted" style="font-size: 1.1rem; font-weight: 300; margin-top: 1rem;">
            Выберите свой идеальный десерт
        </p>
    </div>

    <!-- Декоративные элементы -->
    <div class="catalog-decoration text-center mb-4">
        <span style="font-size: 2rem; opacity: 0.3; margin: 0 0.5rem;">🧁</span>
        <span style="font-size: 2rem; opacity: 0.3; margin: 0 0.5rem;">🍰</span>
        <span style="font-size: 2rem; opacity: 0.3; margin: 0 0.5rem;">🍪</span>
    </div>

    @if($catalog->isEmpty())
        <div class="empty-catalog">
            <i class="bi bi-cupcake"></i>
            <h3>Каталог пополняется</h3>
            <p>Скоро здесь появятся наши новые десерты</p>
            <a href="{{ route('home') }}" class="add-to-cart-btn" style="width: auto; padding: 0.8rem 2rem; display: inline-flex;">
                Вернуться на главную
            </a>
        </div>
    @else
        <div class="row g-4">
            @foreach ($catalog as $el)
            <div class="col-lg-4 col-md-6">
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <img src="{{ asset('images/' . $el->image) }}" 
                             class="product-image" 
                             alt="{{ $el->title }}">
                        @if($loop->index < 3)
                            <span class="product-badge">Новинка</span>
                        @endif
                    </div>
                    
                    <div class="product-info">
                        <h5 class="product-title">
                            <a href="{{ route('catalog.one', $el->id) }}">{{ $el->title }}</a>
                        </h5>
                        
                        <p class="product-description">
                            {{ Str::limit($el->description, 100) }}
                        </p>
                        
                        <div class="product-meta">
                            <span class="product-price">
                                {{ number_format($el->price, 0, ',', ' ') }} <small>₽</small>
                            </span>
                            <span class="product-stock {{ $el->quantity > 0 ? 'in-stock' : 'out-of-stock' }}">
                                <i class="bi {{ $el->quantity > 0 ? 'bi-check-circle' : 'bi-x-circle' }}"></i>
                                {{ $el->quantity > 0 ? 'В наличии' : 'Нет' }}
                            </span>
                        </div>
                        
                        <form action="{{ route('cart.add', $el->id) }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="add-to-cart-btn" 
                                    {{ $el->quantity == 0 ? 'disabled' : '' }}>
                                <i class="bi bi-cart-plus"></i> 
                                {{ $el->quantity > 0 ? 'В корзину' : 'Нет в наличии' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush