<div>
<a href="http://www.c-oasis.jp/app/users/mypage">トップページへ</a>
</div>
<div>
<?php
foreach($posts as $post):
?>
<h3>シリーズ編集ページ</h3>
<?=$this->Form->create('Series', ['type' => 'post', 'url' => ['controller' => 'Posts', 'action' => 'seriesSave']])?>
<?=$this->Form->control('title', ['label' => 'タイトル', 'value' => $post->title]);?>
<?=$this->Form->control('description', ['label' => '説明文', 'value' => $post->description]);?>
<?=$this->Form->control('post_type', ['label' => 'シリーズジャンル', 'value' => $post->post_type]);?>
<?=$this->Form->control('genre', ['label' => 'シリーズジャンル', 'value' => $post->genre]);?>
<?=$this->Form->hidden('user_id',['value' => $post->user_id]);?>
<?=$this->Form->hidden('series_id',['value' => $post->series_id]);?>
<?=$this->Form->submit('シリーズ内容を更新する')?>
<?=$this->Form->end()?>
<br>
<?=$this->Form->create('Series', ['type' => 'post', 'url' => ['controller' => 'Posts', 'action' => 'seriesDelete']])?>
<?=$this->Form->hidden('series_id',['value' => $post->series_id]);?>
<?=$this->Form->submit('シリーズ内容を削除する')?>
<?=$this->Form->end()?>
<?php
endforeach;
?>
</ul>
<ul>
<h4>このシリーズの話一覧</h4>
<?php
foreach($story_list as $story):
?>
<a href="http://www.c-oasis.jp/app/posts/story_single/<?php echo $post_id."/".h($story->story_id);?>">
<li>
<p>タイトル：<?php echo h($story->story_title); ?></p>
</li>
</a>
<?php
endforeach;
?>
</ul>
<div><?= $this->Html->link(__('新しいストーリーを投稿する'), '/posts/story_add/'.$post_id) ?></div>
</div>
