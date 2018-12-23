<div>
    <div><a href="http://www.c-oasis.jp/app/users/mypage">MyPageへ</a></div>
</div>
<div>
<?=$this->Form->create('Posts', ['url' => ['action' => 'save', 'type' => 'post']])?>
<?=$this->Form->control('title', ['label' => 'タイトル']);?>
<?=$this->Form->control('content', ['label' => 'コンテンツ']);?>
<?=$this->Form->hidden('article_id',['value' => 1]);?>
<?=$this->Form->hidden('user_id',['value' => $user_id]);?>
<?=$this->Form->submit('投稿する')?>
<?=$this->Form->end()?>
</div>
