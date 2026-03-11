

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <!-- Заголовок -->
    <div class="border-bottom pb-3 mb-4">
        <h1 class="h3 fw-normal mb-0">Корзина</h1>
    </div>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 bg-light" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show border-0 bg-light" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>
            <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(empty($cart)): ?>
        <div class="text-center py-5 my-5">
            <i class="bi bi-cart3 display-1 text-secondary opacity-50"></i>
            <h3 class="h4 fw-normal mt-4">Корзина пуста</h3>
            <p class="text-secondary mb-4">Добавьте десерты из каталога</p>
            <a href="<?php echo e(route('catalog')); ?>" class="btn btn-outline-secondary px-4">
                <i class="bi bi-arrow-left me-2"></i> В каталог
            </a>
        </div>
    <?php else: ?>
        <div class="card border-0 bg-transparent">
            <div class="card-body p-0">
                <!-- Мобильная версия (скрыта на десктопе) -->
                <div class="d-md-none">
                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card mb-3 border">
                        <div class="card-body p-3">
                            <div class="d-flex gap-3">
                                <img src="<?php echo e(asset('images/' . $item['image'])); ?>" 
                                     alt="<?php echo e($item['title']); ?>"
                                     style="width: 70px; height: 70px; object-fit: cover;"
                                     class="border">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1"><?php echo e($item['title']); ?></h6>
                                    <div class="text-secondary small mb-2"><?php echo e(number_format($item['price'], 0, ',', ' ')); ?> ₽</div>
                                    
                                    <div class="d-flex align-items-center justify-content-between">
                                        <form action="<?php echo e(route('cart.update', $item['id'])); ?>" method="POST" class="d-flex align-items-center gap-2">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <input type="number" 
                                                   name="quantity" 
                                                   value="<?php echo e($item['quantity']); ?>" 
                                                   min="1" 
                                                   max="<?php echo e($item['max_quantity']); ?>"
                                                   class="form-control form-control-sm"
                                                   style="width: 60px;">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-arrow-repeat"></i>
                                            </button>
                                        </form>
                                        
                                        <form action="<?php echo e(route('cart.remove', $item['id'])); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    
                                    <div class="small mt-2">
                                        <span class="fw-medium">Итого: <?php echo e(number_format($item['price'] * $item['quantity'], 0, ',', ' ')); ?> ₽</span>
                                        <span class="text-secondary ms-2">(<?php echo e($item['quantity']); ?> шт)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Десктопная версия (таблица) -->
                <div class="d-none d-md-block">
                    <table class="table align-middle">
                        <thead class="table-light border-bottom">
                            <tr>
                                <th class="fw-normal ps-0">Товар</th>
                                <th class="fw-normal">Цена</th>
                                <th class="fw-normal">Количество</th>
                                <th class="fw-normal">Сумма</th>
                                <th class="fw-normal"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="ps-0">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="<?php echo e(asset('images/' . $item['image'])); ?>" 
                                             alt="<?php echo e($item['title']); ?>"
                                             style="width: 60px; height: 60px; object-fit: cover;"
                                             class="border">
                                        <div>
                                            <div class="fw-medium"><?php echo e($item['title']); ?></div>
                                            <small class="text-secondary">Арт. <?php echo e($item['id']); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo e(number_format($item['price'], 0, ',', ' ')); ?> ₽</td>
                                <td style="width: 200px;">
                                    <form action="<?php echo e(route('cart.update', $item['id'])); ?>" method="POST" class="d-flex align-items-center gap-2">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <input type="number" 
                                               name="quantity" 
                                               value="<?php echo e($item['quantity']); ?>" 
                                               min="1" 
                                               max="<?php echo e($item['max_quantity']); ?>"
                                               class="form-control form-control-sm"
                                               style="width: 70px;">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-arrow-repeat"></i>
                                        </button>
                                        <span class="text-secondary small ms-1">(<?php echo e($item['max_quantity']); ?> шт)</span>
                                    </form>
                                </td>
                                <td class="fw-medium"><?php echo e(number_format($item['price'] * $item['quantity'], 0, ',', ' ')); ?> ₽</td>
                                <td class="text-end">
                                    <form action="<?php echo e(route('cart.remove', $item['id'])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger border-0">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot class="border-top">
                            <tr>
                                <td colspan="3" class="text-end border-0"><strong>Итого:</strong></td>
                                <td class="border-0"><strong class="h5 fw-normal"><?php echo e(number_format($total, 0, ',', ' ')); ?> ₽</strong></td>
                                <td class="border-0"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Кнопки действий -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mt-4 pt-3 border-top">
                    <form action="<?php echo e(route('cart.clear')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-link text-secondary text-decoration-none p-0" 
                                onclick="return confirm('Очистить корзину?')">
                            <i class="bi bi-cart-x me-1"></i> Очистить корзину
                        </button>
                    </form>
                    
                    <div class="d-flex gap-2">
                        <a href="<?php echo e(route('catalog')); ?>" class="btn btn-outline-secondary px-4">
                            <i class="bi bi-arrow-left me-2"></i> Назад
                        </a>
                        <a href="#" class="btn btn-dark px-4">
                            Оформить заказ <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* Минимальные кастомные стили */
    .table th {
        font-weight: 400;
        color: #6c757d;
        border-bottom-width: 1px;
    }
    
    .table td {
        border-bottom: 1px solid #dee2e6;
    }
    
    .table tfoot td {
        border-top: 1px solid #dee2e6;
    }
    
    .btn-outline-secondary {
        border-color: #dee2e6;
    }
    
    .btn-outline-secondary:hover {
        background-color: #f8f9fa;
        color: #000;
        border-color: #dee2e6;
    }
    
    /* Адаптивные корректировки */
    @media (max-width: 768px) {
        .container {
            padding-left: 12px;
            padding-right: 12px;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/cart/index.blade.php ENDPATH**/ ?>