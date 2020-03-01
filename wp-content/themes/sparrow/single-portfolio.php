
<?php the_post()?>
<?php get_header()?>
<!-- Page Title
================================================== -->
<div id="page-title">

    <div class="row">

        <div class="ten columns centered text-center">
        <h1>Our Amazing Works<span>.</span></h1>

        <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
        enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
        </div>

    </div>

</div> <!-- Page Title End-->

<!-- Content
================================================== -->
<div class="content-outer">

    <div id="page-content" class="row portfolio">

        <section class="entry cf">

        <div id="secondary"  class="four columns entry-details">

                <h1><?php the_title()?></h1>

                <div class="entry-description">

                    <p><?php the_content()?></p>

                </div>

                <ul class="portfolio-meta-list">
                        <li><span>Date: </span><?php the_field('Date')?></li>
                        <li><span>Client </span><?php the_field('Client')?></li>
                        <li><span>Skills: </span><?php the_terms( get_the_ID(), 'skills', '', ', ', '')?></li>
                    </ul>

                <a class="button" href="<?php the_field('view-link')?>">View project</a>
        </div> <!-- secondary End-->

        <div id="primary" class="eight columns">

            <div class="entry-media">
                <img src="<?php the_field('photo-1')?>" alt="">
                <img src="<?php the_field('photo-2')?>" alt="">
            </div>

            <div class="entry-excerpt">

                <p><?php the_excerpt()?></p>

            </div>

        </div> <!-- primary end-->

        </section> <!-- end section -->

    </div>

</div> <!-- content End-->

<!-- Tweets Section
================================================== -->
<section id="tweets">

    <div class="row">

        <div class="tweeter-icon align-center">
        <i class="fa fa-twitter"></i>
        </div>

        <ul id="twitter" class="align-center">
        <li>
            <span>
            This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
            <a href="#">http://t.co/CGIrdxIlI3</a>
            </span>
            <b><a href="#">2 Days Ago</a></b>
        </li>
        <!--
        <li>
            <span>
            This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
            <a href="#">http://t.co/CGIrdxIlI3</a>
            </span>
            <b><a href="#">3 Days Ago</a></b>
        </li>
        -->
        </ul>

        <p class="align-center"><a href="#" class="button">Follow us</a></p>

    </div>

</section> <!-- Tweet Section End-->
<?php get_footer()?>