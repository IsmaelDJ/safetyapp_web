<div class="row">
    <div class="col-xl-12">
        <div class="card">
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
                            <select wire:model='year' id="select-year" class="form-select form-select-sm">
                                <?php $__currentLoopData = range(0, $range); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iteration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($first_year + $iteration); ?>">
                                        <?php echo e($first_year + $iteration); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <h4 class="card-title mb-4">Présence</h4>
                </div>
                
                <div class="row">
                    <div>
                        <?php echo $presenceChart->container(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('script'); ?>
    <?php if (! $__env->hasRenderedOnce('f5e33b3a-645e-4f9d-a3a3-80d84608d7fc')): $__env->markAsRenderedOnce('f5e33b3a-645e-4f9d-a3a3-80d84608d7fc'); ?>
        <script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            <?php echo $presenceChart->script(); ?>

        </script>
    <?php endif; ?>    
<?php $__env->stopPush(); ?>
<?php /**PATH C:\laragon\www\safetyapp_web\resources\views/livewire/chart-presence.blade.php ENDPATH**/ ?>