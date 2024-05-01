<div class="col-xl-12">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="clearfix">
                <div class="float-end">
                    <div class="input-group input-group-sm">
                        <select wire:model='param_month' class="form-select form-select-sm">
                            <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($loop->iteration); ?>">
                                    <?php echo e($month); ?>

                                </option>                                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <select wire:model='year' class="form-select form-select-sm">
                            <?php $__currentLoopData = range(0, $range); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iteration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($first_year + $iteration); ?>">
                                    <?php echo e($first_year + $iteration); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <h4 class="card-title">Taux de lecture par moi</h4>
            </div>
            <hr>
            <div class="apex-charts">
                <?php echo $readingChart->container(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('script'); ?>
    <?php if (! $__env->hasRenderedOnce('c10e2f5a-3ebc-4d5b-85b3-317be6db5bc3')): $__env->markAsRenderedOnce('c10e2f5a-3ebc-4d5b-85b3-317be6db5bc3'); ?>
     <script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" defer charset="utf-8"></script>
            <?php echo $readingChart->script(); ?>

     </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?><?php /**PATH D:\www\ismatech\safetyapp_web\resources\views/livewire/chart-reading.blade.php ENDPATH**/ ?>