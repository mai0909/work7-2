<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>0円空家からリノベーション</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/index.css')); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>


<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('購入申請完了')); ?></div>
    
                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
    
                        <?php echo e(__('購入申請を受け付けました。')); ?> <br>
                        <?php echo e(('担当者よりご登録いただいたメールアドレスにてご連絡いたします。')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="to-cost-button">
        <a href="<?php echo e(route('list-of-house')); ?>">空家物件一覧へ戻る</a>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/sample/resources/views/buy-complete.blade.php ENDPATH**/ ?>