<div>
<a href="<?php print $url; ?>/users/mypage">トップページへ</a>
</div>
<div>
<?php
foreach($posts as $post):
?>
<h3>シリーズ編集ページ</h3>
<?=$this->Form->create('Series', ['type' => 'post', 'url' => ['controller' => 'Posts', 'action' => 'seriesSave']])?>
<?=$this->Form->control('title', ['label' => 'タイトル', 'value' => $post->title]);?>
<?=$this->Form->control('description', ['type' => 'textarea', 'rows' => '10', 'cols' => '10', 'label' => 'あらすじ','value' => $post->description]);?>
<?=$this->Form->control('catch_copy', ['label' => 'キャッチコピー', 'value' => $post->catch_copy]);?>
<?=$this->Form->control('genre', ['label' => 'シリーズジャンル', 'value' => $post->genre]);?>
<?=$this->Form->label('ステータス'); ?>
<?=$this->Form->select('content_status', ['public' => '公開', 'private' => '非公開'], ['default' => $post->content_status]);?>
<?=$this->Form->label('執筆状況'); ?>
<?=$this->Form->select('writing_status', ['continue' => '執筆中', 'finish' => '完結済'], ['default' => $post->writing_status]);?>
<?=$this->Form->label('短編/長編'); ?>
<?=$this->Form->select('series_type', ['short' => '短編', 'long' => '長編'], ['default' => $post->series_type]);?>
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
<a href="<?php print $url; ?>posts/story_single/<?php echo $post_id."/".h($story->story_id);?>">
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
