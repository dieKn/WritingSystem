<div>
<a href="http://www.c-oasis.jp/app/users/mypage">トップページへ</a>
</div>
<div>
<?php
foreach($posts as $post):
?>
<?=$this->Form->create('Stories', ['type' => 'post', 'url' => ['controller' => 'Posts', 'action' => 'storySave']])?>
<?=$this->Form->control('story_title', ['label' => 'タイトル', 'value' => $post->story_title]);?>
<?=$this->Form->control('content', ['label' => '説明文', 'value' => $post->content]);?>
<?=$this->Form->control('post_type', ['label' => 'シリーズジャンル', 'value' => $post->post_type]);?>
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
