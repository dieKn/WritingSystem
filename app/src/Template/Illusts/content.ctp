<div>
<a href="<?php print $url; ?>articles/lists">トップページへ</a>
</div>
<div>
<ul>
<?php
foreach($posts as $post):
?>
<li>
<h3>タイトル：<?php echo h($post->illust_title); ?></h3>
<p>説明：<?php echo h($post->post_type); ?></p>
<p>作者：
<?php
	echo h($post->user['username']);
?>
</p>
<div><?php echo "<img src=\"".$url.$post->illust_url."\">"; ?></div>
</li>
<?php
endforeach;
?>
</ul>
</div>
