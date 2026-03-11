

<?php $__env->startSection('content'); ?>
<div class="container">
    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Управление каталогом</h1>
        <a href="<?php echo e(route('admin.catalog.create')); ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Добавить товар
        </a>
    </div>

    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $catalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="<?php echo e(asset('images/' . $el->image)); ?>" 
                     class="card-img-top" 
                     alt="<?php echo e($el->title); ?>"
                     style="height: 200px; object-fit: cover;">
                
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo e($el->title); ?></h5>
                    <p class="card-text flex-grow-1"><?php echo e($el->description); ?></p>
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="h5 text-primary"><?php echo e(number_format($el->price, 0, ',', ' ')); ?> ₽</span>
                        <span class="badge <?php echo e($el->quantity > 0 ? 'bg-success' : 'bg-danger'); ?>">
                            <?php echo e($el->quantity > 0 ? 'В наличии: ' . $el->quantity . ' шт' : 'Нет в наличии'); ?>

                        </span>
                    </div>
                    
                    <div class="d-flex gap-2 mt-3">
                        <a href="<?php echo e(route('admin.catalog.edit', $el->id)); ?>" 
                           class="btn btn-warning flex-fill">
                            <i class="bi bi-pencil"></i> Редактировать
                        </a>
                        
                        <form action="<?php echo e(route('admin.catalog.destroy', $el->id)); ?>" 
                              method="POST" 
                              class="flex-fill"
                              onsubmit="return confirm('Вы уверены, что хотите удалить товар?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="bi bi-trash"></i> Удалить
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12">
            <div class="alert alert-info text-center">
                В каталоге пока нет товаров. 
                <a href="<?php echo e(route('admin.catalog.create')); ?>" class="alert-link">Добавить первый товар</a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\localhost\resources\views/admin/catalog.blade.php ENDPATH**/ ?>