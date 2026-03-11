<?php $__env->startSection('content'); ?>
<div class="welcome-container">
    <!-- Декоративные элементы -->
    <div class="dessert-decoration">
        <span class="decoration-item" style="top: 10%; left: 5%;">🍪</span>
        <span class="decoration-item" style="top: 70%; right: 5%; animation-delay: -2s;">🧁</span>
        <span class="decoration-item" style="bottom: 10%; left: 10%; animation-delay: -4s;">🍰</span>
        <span class="decoration-item" style="top: 30%; right: 15%; animation-delay: -1s;">🥐</span>
        <span class="decoration-item" style="top: 50%; left: 20%; animation-delay: -3s;">🍫</span>
        <span class="decoration-item" style="bottom: 20%; right: 20%; animation-delay: -5s;">🍭</span>
    </div>

    <div class="container">
        <div class="hero-section">
            <div class="cupcake-icon">🧁</div>
            <div class="candy-icon">🍬</div>
            
            <h1 class="sweet-title">
                Добро пожаловать в 
                <span>"Кусочек"</span>
                <span>счастья</span>
                <span>!</span>
            </h1>
            
            <h2 class="sweet-subtitle">
                Кондитерская, где сбываются мечты
            </h2>
            
            <p class="sweet-description">
                Мы создаем не просто десерты, а настоящие произведения искусства, 
                которые дарят радость и сладкие моменты счастья. 
                Каждое наше пирожное — это маленькая история любви.
            </p>

            <a href="<?php echo e(route('catalog')); ?>" class="sweet-button">
                Перейти в каталог сладостей
                <i class="bi bi-arrow-right"></i>
            </a>

            <!-- Секция с преимуществами -->
            <div class="features-section">
                <div class="feature-card">
                    <div class="feature-icon">🍰</div>
                    <h3 class="feature-title">Только свежая выпечка</h3>
                    <p class="feature-text">Готовим каждый день с 5 утра, чтобы вы наслаждались свежестью</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🎨</div>
                    <h3 class="feature-title">Авторский дизайн</h3>
                    <p class="feature-text">Каждый десерт уникален и создается с душой</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🌿</div>
                    <h3 class="feature-title">Натуральные ингредиенты</h3>
                    <p class="feature-text">Только качественные продукты без искусственных добавок</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="/css/welcome.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/welcome.blade.php ENDPATH**/ ?>