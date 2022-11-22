<div class="col-xl-12">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="clearfix">
                <div class="float-end">
                    <div class="input-group input-group-sm">
                        <select wire:model='year' id="select-year" class="form-select form-select-sm">
                            <?php $__currentLoopData = range(0, $range); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iteration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($first_year + $iteration); ?>">
                                    <?php echo e($first_year + $iteration); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <label class="input-group-text">Années</label>
                    </div>
                </div>
                <h4 class="card-title mb-4">Taux de lecture par moi</h4>
            </div>
            <hr>
            <div class="apex-charts">
            <?php echo $readingChart->container(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('script'); ?>
    <?php if (! $__env->hasRenderedOnce('5692a738-211f-4a06-b79d-ffad08a4ac2a')): $__env->markAsRenderedOnce('5692a738-211f-4a06-b79d-ffad08a4ac2a'); ?>
    <?php echo $readingChart->script(); ?>

    <?php endif; ?>
<?php $__env->stopPush(); ?><?php /**PATH C:\laragon\www\safetyapp_web\resources\views/livewire/chart-reading.blade.php ENDPATH**/ ?>