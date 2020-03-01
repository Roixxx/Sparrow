

<article class="post">
    <div class="entry-header cf">
        <h1><a href="<?php the_permalink()?>" title=""><?php the_title() ?></a></h1>
        <h2>Aside post</h2>
        <p class="post-meta">
        <time class="date"><?php the_time('F jS, Y')?></time>
        <?php the_category( '/')?>
        </p>
    </div>

    <div class="post-thumb">
        <a href="<?php the_permalink()?>" title=""><?php the_post_thumbnail('post_thumb')?></a>
    </div>

    <div class="post-content">
        <?php the_content() ?>
    </div>

</article> 