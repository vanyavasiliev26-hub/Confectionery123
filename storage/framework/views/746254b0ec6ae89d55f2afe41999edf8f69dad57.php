

<?php $__env->startSection('content'); ?>
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

    <?php if($catalog->isEmpty()): ?>
        <div class="empty-catalog">
            <i class="bi bi-cupcake"></i>
            <h3>Каталог пополняется</h3>
            <p>Скоро здесь появятся наши новые десерты</p>
            <a href="<?php echo e(route('home')); ?>" class="add-to-cart-btn" style="width: auto; padding: 0.8rem 2rem; display: inline-flex;">
                Вернуться на главную
            </a>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <?php $__currentLoopData = $catalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6">
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <img src="<?php echo e(asset('images/' . $el->image)); ?>" 
                             class="product-image" 
                             alt="<?php echo e($el->title); ?>">
                        <?php if($loop->index < 3): ?>
                            <span class="product-badge">Новинка</span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="product-info">
                        <h5 class="product-title">
                            <a href="<?php echo e(route('catalog.one', $el->id)); ?>"><?php echo e($el->title); ?></a>
                        </h5>
                        
                        <p class="product-description">
                            <?php echo e(Str::limit($el->description, 100)); ?>

                        </p>
                        
                        <div class="product-meta">
                            <span class="product-price">
                                <?php echo e(number_format($el->price, 0, ',', ' ')); ?> <small>₽</small>
                            </span>
                            <span class="product-stock <?php echo e($el->quantity > 0 ? 'in-stock' : 'out-of-stock'); ?>">
                                <i class="bi <?php echo e($el->quantity > 0 ? 'bi-check-circle' : 'bi-x-circle'); ?>"></i>
                                <?php echo e($el->quantity > 0 ? 'В наличии' : 'Нет'); ?>

                            </span>
                        </div>
                        
                        <form action="<?php echo e(route('cart.add', $el->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" 
                                    class="add-to-cart-btn" 
                                    <?php echo e($el->quantity == 0 ? 'disabled' : ''); ?>>
                                <i class="bi bi-cart-plus"></i> 
                                <?php echo e($el->quantity > 0 ? 'В корзину' : 'Нет в наличии'); ?>

                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/catalog.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/static/catalog.blade.php ENDPATH**/ ?>