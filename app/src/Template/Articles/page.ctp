<div>
<a href="http://www.c-oasis.jp/app/articles/lists">トップページへ</a>
</div>
<div>
<ul>
<?php
$i = 0;
foreach($story as $story_list):
$i++;
?>
<li>
<h3>タイトル：<?php echo h($story_list->story_title); ?></h3>
<p><?php echo h($story_list->content); ?></p>
</li>
<?php
endforeach;
//var_dump($post,$author);
?>
</ul>
</div>
