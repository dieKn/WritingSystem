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
    <div>
    <h3>関連作品</h3>
        <ul class="relation_list">
            <?php 
                foreach($relation_series as $relation):
                    echo "<li><a href=\"".$url."articles/content/".$relation->series_id."\">";
                    echo $relation->title;
                    echo "</a></li>";
                endforeach;
            ?>
        </ul>
    </div>
    <div>
    <h3>ランキング</h3>
        <ul class="ranking_list">
            <?php 
                $i = 1;
                foreach($ranking_series as $ranking):
                    echo "<li><a href=\"".$url."articles/content/".$ranking->series_id."\">";
                    echo "第".$i."位：";
                    echo $ranking->series['title'];
                    echo "</a></li>";
                    $i++;
                endforeach;
            ?>
        </ul>
    </div>
</div>
