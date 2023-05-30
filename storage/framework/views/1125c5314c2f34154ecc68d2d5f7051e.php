<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>0円空家からリノベーション</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/index.css')); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>


<?php $__env->startSection('content'); ?>

<form method="post" action="<?php echo e(route('house-complete')); ?>">
    <?php echo csrf_field(); ?>
    <p class="detail-p">■空家物件登録内容</p>
    <div class="form-content">
        <p class="form-text">下記の下記の内容をご確認の上登録ボタンを押してください<br>内容を訂正する場合は戻るを押してください。</p>
    <div>
        
    <div class="detail-img">
        <div class="top-img">
            <img src=" <?php echo e($data['read_top_path']); ?>" width="200" height="130">
            <input name="top_img" value="<?php echo e($inputs['top_img']); ?>" type="hidden">
            <input name="top_img" value="<?php echo e($data['top_path']); ?>" type="hidden">
        </div>
        <div class="sub-img">
            <div class="sub-img1">
                
                <img src="<?php echo e($data['read_sub1_path']); ?>" width="200" height="130">
                <input name="sub_img1" value="<?php echo e($inputs['sub_img1']); ?>" type="hidden">
                <input name="sub_img1" value="<?php echo e($data['sub1_path']); ?>" type="hidden">
        
                
                <img src="<?php echo e($data['read_sub2_path']); ?>" width="200" height="130">
                <input name="sub_img2" value="<?php echo e($inputs['sub_img2']); ?>" type="hidden">
                <input name="sub_img2" value="<?php echo e($data['sub2_path']); ?>" type="hidden">
        
                
                <img src="<?php echo e($data['read_sub3_path']); ?>" width="200" height="130">
                <input name="sub_img3" value="<?php echo e($inputs['sub_img3']); ?>" type="hidden">
                <input name="sub_img3" value="<?php echo e($data['sub3_path']); ?>" type="hidden">
            </div>
            <div class="sub-img2">
                
                <img src="<?php echo e($data['read_sub4_path']); ?>" width="200" height="130">
                <input name="sub_img4" value="<?php echo e($inputs['sub_img4']); ?>" type="hidden">
                <input name="sub_img4" value="<?php echo e($data['sub4_path']); ?>" type="hidden">
        
                
                <img src="<?php echo e($data['read_sub5_path']); ?>" width="200" height="130">
                <input name="sub_img5" value="<?php echo e($inputs['sub_img5']); ?>" type="hidden">
                <input name="sub_img5" value="<?php echo e($data['sub5_path']); ?>" type="hidden">
            </div>
        </div>
    </div>

    <div class="detail-text">
        <table class=detail-table>
            <tr>
                <td class="detail-title">アクセス</td>
                <td>
                    <?php echo e($inputs['access']); ?>

                    <input name="access" value="<?php echo e($inputs['access']); ?>" type="hidden">
                </td>
            </tr>
            <tr>
                <td class="detail-title">住所</td>
                <td>
                    <?php echo e($inputs['address']); ?>

                    <input name="address" value="<?php echo e($inputs['address']); ?>" type="hidden">
                </td>
            </tr>
            <tr>
                <td class="detail-title">間取り</td>
                <td>
                    <?php echo e($inputs['floor']); ?>

                    <input name="floor" value="<?php echo e($inputs['floor']); ?>" type="hidden">
                </td>
                <td class="detail-title">築年数</td>
                <td>
                    <?php echo e($inputs['bulding_date']); ?>

                    <input name="bulding_date" value="<?php echo e($inputs['bulding_date']); ?>" type="hidden">
                    年</td>
                <td class="detail-title">駐車場</td>
                <td>
                    <?php echo e($inputs['parking']); ?>

                    <input name="parking" value="<?php echo e($inputs['parking']); ?>" type="hidden">
                </td>
            </tr>
            <tr>
                <td class="detail-title">建物面積</td>
                <td>
                    <?php echo e($inputs['bulding_area']); ?>

                    <input name="bulding_area" value="<?php echo e($inputs['bulding_area']); ?>" type="hidden">
                ㎡</td>
                <td class="detail-title">土地面積</td>
                <td>
                    <?php echo e($inputs['land_area']); ?>

                    <input name="land_area" value="<?php echo e($inputs['land_area']); ?>" type="hidden">
                ㎡</td>
            </tr>
        </table>
    </div>
    <div class="check-button">
        <button class="normal-button check1" type="submit" name="action" value="send">登 &nbsp; 録</button>
        <button class="normal-button check2" type="submit" name="action" value="back" >戻 &nbsp; る</button>
    </div>
</div>


</div>

<?php $__env->stopSection(); ?>









<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/sample/resources/views/house-check.blade.php ENDPATH**/ ?>