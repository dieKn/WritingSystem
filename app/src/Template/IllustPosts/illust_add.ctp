<div>
イラストページ
</div>
<div>
    <div><a href="<?php print $url; ?>/users/mypage">MyPageへ</a></div>
</div>
<div>
<?=$this->Form->create('Illusts', ['type' => 'file', 'url' => ['controller' => 'IllustPosts', 'action' => 'illustsSave']])?>
<?=$this->Form->control('illust_title', ['label' => 'タイトル']);?>
<?=$this->Form->control('file',["type"=>"file", "label"=>"ファイル", "required"]);?>
<?=$this->Form->control('post_type', ['label' => 'シリーズジャンル']);?>
<?=$this->Form->label('ステータス'); ?>
<?=$this->Form->select('content_status', ['public' => '公開', 'private' => '非公開']);?>
<?=$this->Form->hidden('user_id',['value' => $user_id]);?>
<?=$this->Form->submit('シリーズ作成')?>
<?=$this->Form->end()?>


</div>

