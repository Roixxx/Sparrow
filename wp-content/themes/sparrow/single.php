<?php get_header() ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <!-- Content
    ================================================== -->
    <div class="content-outer">

        <div id="page-content" class="row">

            <div id="primary" class="eight columns">


                <?php get_template_part( 'post-templates/post', get_post_format())?>


            </div> 

            <div id="secondary" class="four columns end">
                <?php get_sidebar()?> 
            </div> 
        </div>

    </div> 
<?php endwhile; else: ?>
<h2><?php esc_html_e( '404 Error', 'practicwp' ); ?></h2>
<p><?php esc_html_e( 'Sorry, content not found.', 'practicwp' ); ?></p>
<?php endif; ?>


<?php get_footer()?>