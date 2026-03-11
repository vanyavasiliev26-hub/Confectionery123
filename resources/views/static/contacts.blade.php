@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row g-5">
        <!-- Левая колонка с контактной информацией -->
        <div class="col-md-5 col-lg-4">
            <div class="pe-md-4">
                <h2 class="h4 fw-normal mb-4 pb-2 border-bottom">Контактная информация</h2>
                
                <div class="d-flex flex-column gap-4">
                    <div class="d-flex gap-3">
                        <span class="fs-4 opacity-50">📞</span>
                        <div>
                            <div class="small text-secondary text-uppercase mb-1">Телефон</div>
                            <div class="fw-medium">+7 (999) 123-45-67</div>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-3">
                        <span class="fs-4 opacity-50">✉️</span>
                        <div>
                            <div class="small text-secondary text-uppercase mb-1">Email</div>
                            <div class="fw-medium">info@kusochek.ru</div>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-3">
                        <span class="fs-4 opacity-50">📍</span>
                        <div>
                            <div class="small text-secondary text-uppercase mb-1">Адрес</div>
                            <div class="fw-medium">г. Москва, ул. Сладкая, д. 1</div>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-3">
                        <span class="fs-4 opacity-50">🕒</span>
                        <div>
                            <div class="small text-secondary text-uppercase mb-1">Режим работы</div>
                            <div class="fw-medium">Пн-Пт: 9:00 - 20:00</div>
                            <div class="fw-medium">Сб-Вс: 10:00 - 18:00</div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-5 pt-3">
                    <h3 class="h6 fw-normal text-secondary text-uppercase mb-3">Мы в соцсетях</h3>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-dark text-decoration-none opacity-50 hover-opacity-100 fs-4">📷</a>
                        <a href="#" class="text-dark text-decoration-none opacity-50 hover-opacity-100 fs-4">📘</a>
                        <a href="#" class="text-dark text-decoration-none opacity-50 hover-opacity-100 fs-4">📱</a>
                        <a href="#" class="text-dark text-decoration-none opacity-50 hover-opacity-100 fs-4">💬</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Правая колонка с формой -->
        <div class="col-md-7 col-lg-8">
            <div class="ps-md-4">
                <h1 class="h3 fw-normal mb-4 pb-2 border-bottom">Напишите нам</h1>
                
                @if($errors->any())
                    <div class="alert alert-light border rounded-0 py-3 mb-4" role="alert">
                        <ul class="list-unstyled mb-0 small text-secondary">
                            @foreach ($errors->all() as $err)
                                <li class="d-flex align-items-center gap-2">
                                    <span class="opacity-50">•</span>
                                    {{ $err }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.post') }}" method="POST">
                    @csrf

                    <div class="row g-4">
                        <div class="col-sm-6">
                            <div>
                                <label for="name" class="form-label small text-secondary text-uppercase mb-1">Имя</label>
                                <input type="text" 
                                       class="form-control form-control-sm rounded-0 border-secondary border-opacity-25" 
                                       id="name" 
                                       name="name" 
                                       placeholder="Введите имя"
                                       value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div>
                                <label for="email" class="form-label small text-secondary text-uppercase mb-1">Email</label>
                                <input type="email" 
                                       class="form-control form-control-sm rounded-0 border-secondary border-opacity-25" 
                                       id="email" 
                                       name="email" 
                                       placeholder="Введите email"
                                       value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div>
                                <label for="subject" class="form-label small text-secondary text-uppercase mb-1">Тема сообщения</label>
                                <input type="text" 
                                       class="form-control form-control-sm rounded-0 border-secondary border-opacity-25" 
                                       id="subject" 
                                       name="subject" 
                                       placeholder="Введите тему"
                                       value="{{ old('subject') }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div>
                                <label for="message" class="form-label small text-secondary text-uppercase mb-1">Сообщение</label>
                                <textarea class="form-control form-control-sm rounded-0 border-secondary border-opacity-25" 
                                          id="message" 
                                          name="message" 
                                          rows="5" 
                                          placeholder="Введите сообщение">{{ old('message') }}</textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-link text-dark text-decoration-none p-0 border-0">
                                Отправить сообщение
                                <span class="ms-2 opacity-50">→</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-opacity-100:hover {
        opacity: 1 !important;
    }
    .form-control:focus {
        border-color: #000;
        box-shadow: none;
    }
    .border-bottom {
        border-color: rgba(0,0,0,0.1) !important;
    }
</style>
@endsection