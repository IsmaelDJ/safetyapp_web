<div class="col-xl-12">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="clearfix">
                <div class="float-end">
                    <div class="input-group input-group-sm">
                        <select wire:model='year' class="form-select form-select-sm">
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
    <?php if (! $__env->hasRenderedOnce('899d9a83-a9e6-40e0-b431-e1ba2f18faf5')): $__env->markAsRenderedOnce('899d9a83-a9e6-40e0-b431-e1ba2f18faf5'); ?>
     <script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
        <?php echo $readingChart->script(); ?>

     </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/livewire/chart-reading.blade.php ENDPATH**/ ?>