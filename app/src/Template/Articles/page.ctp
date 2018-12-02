<div>
<a href="<?php print $url; ?>/articles/lists">トップページへ</a>
</div>
<div>
<ul>
<?php

$i = 0;
foreach($story as $story_list):
$i++;
?>
<li>
<h3>タイトル：<?php echo h($story_list->story_title); ?></h3>
<p><?php echo nl2br($story_list->content); ?></p>
</li>
<?php
endforeach;
//var_dump($post,$author);
?>
</ul>
    <div class="paginator">
        <ul class="pagination">
            <?=$this->Paginator->first(' << first') ?>            
            <?=$this->Paginator->prev(' < prev ') ?>
            <?=$this->Paginator->numbers() ?>
            <?=$this->Paginator->next(' next > ') ?>
            <?=$this->Paginator->last(' last >> ') ?>            
        </ul>
    </div>
</div>
