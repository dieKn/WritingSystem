<div>
    <div><a href="<?php print $url; ?>/users/mypage">MyPageへ</a></div>
</div>
<div>
<?=$this->Form->create('Series', ['type' => 'post', 'url' => ['controller' => 'Posts', 'action' => 'storySave']])?>
<?=$this->Form->control('story_title', ['label' => 'タイトル']);?>
<?=$this->Form->control('content', ['type' => 'textarea', 'rows' => '10', 'cols' => '10', 'label' => '内容']);?>
<?=$this->Form->control('post_type', ['label' => 'シリーズジャンル']);?>
<?=$this->Form->label('ステータス'); ?>
<?=$this->Form->select('content_status', ['public' => '公開', 'private' => '非公開']);?>
<?=$this->Form->hidden('user_id',['value' => $user_id]);?>
<?=$this->Form->hidden('series_id',['value' => $post_id]);?>
<?=$this->Form->submit('ストーリー作成')?>
<?=$this->Form->end()?>
</div>
