<div>
<a href="../../lists">トップページへ</a>
</div>
<div>
<ul>
<?php
foreach($posts as $post):
?>
<li>
<h3>タイトル：<?php echo h($post->title); ?></h3>
<p>説明：<?php echo h($post->description); ?></p>
<p>作者：
<?php
	echo h($post->user['username']);
?>
</p>
</li>
<?php
endforeach;
//var_dump($post,$author);
?>
</ul>
<ul>
<?php
$i = 0;
foreach($story as $story_list):
$i++;
?>
<li>
<a href="http://www.c-oasis.jp/app/articles/page/<?php echo $post_id."/".$story_list->story_id; ?>">
<h3>第<?php echo $i; ?>話：<?php echo h($story_list->story_title); ?></h3>
</a>
</li>
<?php
endforeach;
//var_dump($post,$author);
?>
</ul>
</div>
