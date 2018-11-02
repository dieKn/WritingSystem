<div>
    <div><a href="http://www.c-oasis.jp/app/users/mypage">MyPageへ</a></div>
</div>
<div>
<?=$this->Form->create('Series', ['type' => 'post', 'url' => ['controller' => 'Posts', 'action' => 'storySave']])?>
<?=$this->Form->control('story_title', ['label' => 'タイトル']);?>
<?=$this->Form->control('content', ['label' => '説明文']);?>
<?=$this->Form->control('post_type', ['label' => 'シリーズジャンル']);?>
<?=$this->Form->label('コンテンツステータス'); ?>
<?=$this->Form->select('content_status', ['public' => '公開', 'private' => '非公開'],['label' => '']);?>
<?=$this->Form->hidden('user_id',['value' => $user_id]);?>
<?=$this->Form->hidden('series_id',['value' => $post_id]);?>
<?=$this->Form->submit('ストーリー作成')?>
<?=$this->Form->end()?>
</div>
