<h2>MyPage</h2>
<div><?= $this->Html->link(__('新しいシリーズを作成する'), '/posts/series_add') ?></div>
<h3>すでにあなたが作成したシリーズ</h3>
<?php 
    $i= 1;
    foreach($posts as $post){ ?>
    <a href="http://www.c-oasis.jp/app/posts/series_list/<?php echo h($post->series_id);?>">
<?php    
    echo $i."：";
    echo h($post->title);
    echo "<br>";
    $i++;
} ?>
<div><?= $this->Html->link(__('ログアウト'), ['action' => 'logout']) ?></div>
