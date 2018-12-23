<div>
    <div><a href="<?php print $url; ?>/users/mypage">MyPageへ</a></div>
</div>
<div>
<?=$this->Form->create('Series', ['type' => 'post', 'url' => ['controller' => 'Posts', 'action' => 'seriesSave']])?>
<?=$this->Form->control('title', ['label' => 'タイトル']);?>
<?=$this->Form->control('description', ['type' => 'textarea', 'rows' => '10', 'cols' => '10', 'label' => 'あらすじ']);?>
<?=$this->Form->control('catch_copy', ['label' => 'キャッチコピー']);?>
<?=$this->Form->control('genre', ['label' => 'シリーズジャンル']);?>
<?=$this->Form->label('ステータス'); ?>
<?=$this->Form->select('content_status', ['public' => '公開', 'private' => '非公開']);?>
<?=$this->Form->label('執筆状況'); ?>
<?=$this->Form->select('writing_status', ['continue' => '執筆中', 'finish' => '完結済']);?>
<?=$this->Form->label('短編/長編'); ?>
<?=$this->Form->select('series_type', ['short' => '短編', 'long' => '長編']);?>
<?=$this->Form->hidden('user_id',['value' => $user_id]);?>
<?=$this->Form->submit('シリーズ作成')?>
<?=$this->Form->end()?>
</div>
