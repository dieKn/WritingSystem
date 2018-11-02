<div>
    <div><a href="http://www.c-oasis.jp/app/users/mypage">MyPageへ</a></div>
</div>
<div>
<?=$this->Form->create('Series', ['type' => 'post', 'url' => ['controller' => 'Posts', 'action' => 'seriesSave']])?>
<?=$this->Form->control('title', ['label' => 'タイトル']);?>
<?=$this->Form->control('description', ['label' => '説明文']);?>
<?=$this->Form->control('post_type', ['label' => 'シリーズジャンル']);?>
<?=$this->Form->hidden('user_id',['value' => $user_id]);?>
<?=$this->Form->submit('シリーズ作成')?>
<?=$this->Form->end()?>
</div>
