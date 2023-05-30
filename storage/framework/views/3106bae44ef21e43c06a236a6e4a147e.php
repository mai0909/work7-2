<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>0円空家からリノベーション</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/index.css')); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>


<?php $__env->startSection('content'); ?>
<div class="home-top">
    <div>
        <a class="home-a" href="<?php echo e(route('list-of-house')); ?>">空家物件一覧を見る</a>
    </div>
    <div>
        <h2>My Page</h2>
    </div>
</div>

<?php if(Auth::user()->manage == 3): ?>
<div class="buy-content home-content">
    <p class="cost-p">■空家物件購入者一覧</p>
    <table  class="buy-table">
        <tr class="table-title">
            <th>購入者名</th>
            <th>購入物件ID</th>
            <th>リノベーション費用</th>
            <th>購入者詳細</th>
            <th>購入者削除</th>
        </tr>
        <?php $__currentLoopData = $costs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="table-item">
            <th><?php echo e($cost->name); ?></th>
            <th><?php echo e($cost->house_id); ?></th>
            <th><?php echo e($cost->cost); ?>万</th>
            <th><a href="">確認</a></th>
            <th><a href="">削除</a></th>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    
</div>
<?php endif; ?>


<?php if(Auth::user()->manage == 1): ?>
<div class="home-content">
    <div>
        <p>■あなたが登録中の空家物件</p>
        
        <?php if(!isset($house)): ?>
        <p>登録中の空家物件はありません。</p>
        <?php endif; ?>

        
        <?php if(isset($houses)): ?>
        <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="page-register">
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
                <table class="detail-table radius-table">
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
            <div class="home-button">
                <a href="<?php echo e(route('update-house', ['id'=>$house->id])); ?>"><button class="normal-button">登録物件を編集する</button></a>
                <a class="home-button2" href="<?php echo e(route('house-delete-home', ['id'=>$house->id])); ?>" type='submit' name='id' value="<?php echo e($house->id); ?>" onclick="return confirm('削除してよろしいですか？')" class="delete-show"><button class="normal-button"> 登録物件を削除する</button></a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </div>
    <div class="button-content">
        <a class="" href="<?php echo e(route('register-house')); ?>"><button class="normal-button register-button">空家物件を登録する</button></a>
    </div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>









<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/sample/resources/views/home.blade.php ENDPATH**/ ?>