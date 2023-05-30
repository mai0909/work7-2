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
<?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<form method="post" action="<?php echo e(route('update-complete',['id'=>$house->id])); ?>" enctype="multipart/form-data" novalidate>
    <?php echo csrf_field(); ?>
    <div class="form-content">
        <p class="cost-p">■空家物件を登録する</p>
        <p class="form-question">下記の項目をご記入の上登録ボタンを押してください。</p>

        

        <div class="register-item">
            <div class="register-content">
                <p class="form-item">物件までの交通手段<span class="red-point">*</span></p>
                <input  class="long-input" type="text" name="access" value="<?php echo e(old('access', $house->access)); ?>" placeholder="(例)〇〇駅から徒歩20分" required>
            </div>
            <?php if($errors->has('access')): ?>
                <p class="error-msg"><?php echo e($errors->first('access')); ?></p>
            <?php endif; ?>
        </div>

        <div class="register-item">
            <div class="register-content">
                <p class="form-item">間取り<span class="red-point">*</span></p>
                <input type="text" name="floor" value="<?php echo e(old('floor', $house->floor)); ?>" placeholder="(例)3LDK" required>
            </div>
            <?php if($errors->has('floor')): ?>
                <p class="error-msg"><?php echo e($errors->first('floor')); ?></p>
            <?php endif; ?>
        </div>

        <div class="register-item">
            <div class="register-content">
                <p class="form-item">建物面積<span class="red-point">*</span></p>
                <input type="text" name="bulding_area" value="<?php echo e(old('bulding_area', $house->bulding_area)); ?>" placeholder="(例)70">㎡
            </div>
            <?php if($errors->has('bulding_area')): ?>
                <p class="error-msg"><?php echo e($errors->first('bulding_area')); ?></p>
            <?php endif; ?>
        </div>

        <div class="register-item">
            <div class="register-content">
                <p class="form-item">土地面積</p>
                <input type="text" name="land_area" value="<?php echo e(old('land_area', $house->land_area)); ?>" placeholder="(例)100" required>㎡
            </div>
            <?php if($errors->has('land_area')): ?>
                <p class="error-msg"><?php echo e($errors->first('land_area')); ?></p>
            <?php endif; ?>
        </div>

        <div class="register-item">
            <div class="register-content">
                <p class="form-item">築年数<span class="red-point">*</span></p>
                <input type="text" name="bulding_date" value="<?php echo e(old('bulding_date', $house->bulding_date)); ?>" placeholder="(例)30" required>年    
            </div>
            <?php if($errors->has('bulding_date')): ?>
                <p class="error-msg"><?php echo e($errors->first('bulding_date')); ?></p>
            <?php endif; ?>
        </div>

        <div class="register-item">
            <div class="register-content">
                <p class="form-item">所在地<span class="red-point">*</span></p>
                <input  class="long-input" type="text" name="address" value="<?php echo e(old('address', $house->address)); ?>" placeholder="(例)神奈川県小田原市〇〇町1-1-1" required>
            </div>
            <?php if($errors->has('address')): ?>
                <p class="error-msg"><?php echo e($errors->first('address')); ?></p>
            <?php endif; ?>
        </div>

        <div class="register-item">
            <div class="register-content">
                <p class="form-item">駐車場</p>
                <input type="radio" name="parking" value="有" <?php echo e(old('parking',$house->parking) == '有' ? 'checked' : ''); ?> required>有
                <input type="radio" name="parking" value="無" <?php echo e(old('parking', $house->parking) ==  '無' ? 'checked' : ''); ?> required>無    
            </div>
            <?php if($errors->has('parking')): ?>
                <p class="error-msg"><?php echo e($errors->first('parking')); ?></p>
            <?php endif; ?>
        </div>

        <div class="register-content">
            <p class="form-item">備考欄</p>
            <input type="text" name="remark" value="<?php echo e(old('remark', $house->remark)); ?>" placeholder="" required>    
        </div>
        
        <div>
            <button class="normal-button register-button regi-button"  type="submit" name="submit" value="更新">物件内容を更新する</button>
        </div>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/sample/resources/views/update-house.blade.php ENDPATH**/ ?>