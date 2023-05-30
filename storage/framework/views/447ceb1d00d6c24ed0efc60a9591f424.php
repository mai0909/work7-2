<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>0円空家からリノベーション</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/index.css')); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const likeButton = document.getElementById('like-button');
        const likeCount = document.getElementById('like-count');
        let count = 0;
        likeButton.addEventListener('click', () => {
            count++;
            likeCount.textContent = count;
        });
    });
</script>


<?php $__env->startSection('content'); ?>
<div class="body">
    <div class="my-page" >
        <a href="<?php echo e(route('home')); ?>">マイページ</a>
    </div>
    
    <div class="list-of-house">
        <p>■空家物件一覧</p>
        <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table class="house-list">
                    <thead class="top-img">
                        <th></th>
                        <tr>
                            <td class="table-text1"><!-- トップ画像 -->
                                <div><img class="top-house" src="<?php echo e(asset('storage/image/'.$house->top_img)); ?>"></div>
                            </td>
                        </tr>
                    </thead>
                <tbody>
                        <tr>
                            <td class="list-title">アクセス</td>
                            <td class="table-text2"><!-- アクセス -->
                                <div><?php echo e($house->access); ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="list-title">住所</td>
                            <td class="table-text6"><!-- 住所 -->
                                <div><?php echo e($house->address); ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="list-title">間取り</td>
                            <td class="table-text3"><!-- 間取り -->
                                <div><?php echo e($house->floor); ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="list-title">建物面積</td>
                            <td class="table-text4"><!-- 建物面積 -->
                                <div><?php echo e($house->bulding_area); ?>㎡</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="list-title">築年数</td>
                            <td class="table-text5"><!-- 築年数 -->
                                <div><?php echo e($house->bulding_date); ?>年</div>
                            </td>
                        </tr>
                    </tbody>
        </table>
        <div class="list-button">
            <div class="like-container">
                <button id="like-button" class="good-button">検討中 </button>
                <div class="like-content">
                    <span id="like-count">0</span>
                    <p>人</p>
                </div>
            </div>
            <div class="detail-button">
                <a class="detail-button" href="<?php echo e(route('house-detail', ['id'=>$house->id])); ?>">詳細を見る</a>
            </div>
            <div class="delete-button">
                <?php if(Auth::user()->manage == 3): ?>
                <a class="delete-button" href="<?php echo e(route('house-delete', ['id'=>$house->id])); ?>" onclick="return confirm('削除してよろしいですか？')" >削除する</a>
                <?php endif; ?>
            </div>
        </div>

        
        
        




        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>




        
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/sample/resources/views/list-of-house.blade.php ENDPATH**/ ?>