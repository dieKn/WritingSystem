<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
<fieldset>
<legend>アカウント名とパスワードを入力してください</legend>
<?= $this->Form->control('username') ?>
<?= $this->Form->control('password') ?>
</fieldset>

<?= $this->Form->button(_('ログイン')) ?>
<?= $this->Form->end() ?>
</div>
