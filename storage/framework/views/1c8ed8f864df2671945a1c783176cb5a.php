<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>0円空家からリノベーション</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/index.css')); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>


<?php $__env->startSection('content'); ?>

<div class="body">
    <p class="detail-p">■空家物件詳細</p>
        <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <div class="detail-img">
                <div class="top-img">
                    <img src="<?php echo e(asset('storage/image/'.$house->top_img)); ?>">
                </div>
                <div class="sub-img">
                    <div class="sub-img1">
                        <img src="<?php echo e(asset('storage/image/'.$house->sub_img1)); ?>">
                        <img src="<?php echo e(asset('storage/image/'.$house->sub_img2)); ?>">
                        <img src="<?php echo e(asset('storage/image/'.$house->sub_img3)); ?>">
                    </div>
                    <div class="sub-img2">
                        <img src="<?php echo e(asset('storage/image/'.$house->sub_img4)); ?>">
                        <img src="<?php echo e(asset('storage/image/'.$house->sub_img5)); ?>">
                    </div>
                </div>
            </div>
            <div class="detail-text">
                <table class=detail-table>
                    <tr>
                        <td class="detail-title">アクセス</td>
                        <td><?php echo e($house->access); ?></td>
                    </tr>
                    <tr>
                        <td class="detail-title">住所</td>
                        <td><?php echo e($house->address); ?></td>
                    </tr>
                    <tr>
                        <td class="detail-title">間取り</td>
                        <td><?php echo e($house->floor); ?></td>
                        <td class="detail-title">築年数</td>
                        <td><?php echo e($house->bulding_date); ?>年</td>
                        <td class="detail-title">駐車場</td>
                        <td><?php echo e($house->parking); ?></td>
                    </tr>
                    <tr>
                        <td class="detail-title">建物面積</td>
                        <td><?php echo e($house->bulding_area); ?>㎡</td>
                        <td class="detail-title">土地面積</td>
                        <td><?php echo e($house->land_area); ?>㎡</td>
                    </tr>
                </table>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="to-cost-button">
    <a href="<?php echo e(route('cost')); ?>"><button class="normal-button register-button">リノベーション費用の見積もりを行う</button></a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/sample/resources/views/house-detail.blade.php ENDPATH**/ ?>