<div>
<a href="<?php print $url; ?>/users/mypage">トップページへ</a>
</div>
<div>
<?php
foreach($posts as $post):
?>
<?=$this->Form->create('Stories', ['type' => 'post', 'url' => ['controller' => 'Posts', 'action' => 'storySave']])?>
<?=$this->Form->control('story_title', ['label' => 'タイトル', 'value' => $post->story_title]);?>
<?=$this->Form->control('content', ['type' => 'textarea', 'rows' => '10', 'cols' => '10', 'label' => '内容','value' => $post->content]);?>
<?=$this->Form->control('post_type', ['label' => 'シリーズジャンル', 'value' => $post->post_type]);?>
<?=$this->Form->label('ステータス'); ?>
<?=$this->Form->select('content_status', ['public' => '公開', 'private' => '非公開'], ['default' => $post->content_status]);?>
<?=$this->Form->hidden('user_id',['value' => $post->user_id]);?>
<?=$this->Form->hidden('story_id',['value' => $post->story_id]);?>
<?=$this->Form->submit('ストーリーの内容を更新する')?>
<?=$this->Form->end()?>
<br>
<?=$this->Form->create('Stories', ['type' => 'post', 'url' => ['controller' => 'Posts', 'action' => 'storyDelete']])?>
<?=$this->Form->hidden('story_id',['value' => $post->story_id]);?>
<?=$this->Form->submit('シリーズ内容を削除する')?>
<?=$this->Form->end()?>
<?php
endforeach;
?>
</div>
