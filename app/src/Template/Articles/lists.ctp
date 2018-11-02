<div id="main">
<div class="container">
<div id="main_pr">
<img src="https://ferret.akamaized.net/images/5af3abebfafbd84bd8000032/original.png?1525918699">
</div><!-- #main_pr -->
<div id="main_content">
<section id="novel_content"class="py-5">
<h2 class="text-left mb-5">人気小説</h2>
<ul class="novel_list">
<?php
foreach($posts as $post):
?>
<li>
<a href="content/<?php echo h($post->series_id);?>/<?php echo h($post->article_id); ?>">
<h3><?php echo h($post->title); ?></h3>
</a>
<img src="https://vignette.wikia.nocookie.net/jaconan/images/a/a8/Edogawa_Conan_Profile.png/revision/latest/scale-to-width-down/350?cb=20160429072131&path-prefix=ja">
  <br><br>
<a href="content/<?php echo h($post->series_id);?>/<?php echo h($post->article_id); ?>">
<?php
        echo h($post->description);
?>
</a>
<div>作者：<?php echo h($post->user['username']);?></div>
</li>
<?php
endforeach;
//var_dump($posts);
?>
</ul>
</section>
<hr>
<section id="comic_content"class="py-5">
  <h2 class="text-left mb-5">漫画</h2>
  <ul class="comic_list">
<?php for($i = 0; $i < 6; $i++){ ?>
    <li>
    <img src="https://vignette.wikia.nocookie.net/jaconan/images/a/a8/Edogawa_Conan_Profile.png/revision/latest/scale-to-width-down/350?cb=20160429072131&path-prefix=ja">
    <h3>test2</h3>
<?php } ?>
  </ul>
</section>
  <hr>
<section id="novel_content"class="py-5">
<h2 class="text-left mb-5">イラスト</h2>
<ul class="img_list">
<?php for($i = 0; $i < 6; $i++){ ?>
  <li>
  <h3>test2</h3>
  <img src="https://iwiz-chie.c.yimg.jp/im_siggqr6W3d_dLCyrs0XAOWje7A---x320-y320-exp5m-n1/d/iwiz-chie/que-13128029003">
  </li> <?php } ?>
</ul>
</section>
<hr>

<section class="py-5">
        <h2 class="text-center mb-5">Features</h2>
        <div class="container">
          <div class="mb-5">
            <h3>Awesome</h3>
            <p>Hello. Hello. Hello. Hello. Hello. Hello. Hello. Hello. Hello. Hello. Hello. Hello.</p>
            <img src="img/phone.png" class="w-100 rounded-circle">
          </div>
          <div>
            <h3>Awesome</h3>
            <p>Hello. Hello. Hello. Hello. Hello. Hello. Hello. Hello. Hello. Hello. Hello. Hello.</p>
            <img src="img/movie.png" class="w-100 rounded-circle">
          </div>
        </div>
      </section>
</div><!-- #main_content -->
</div><!-- .container -->
</div><!-- #main -->
