<?php
/**
 * Created by themeroad.
 * User: user
 * Date: 4/14/2015
 * Time: 6:53 PM
 */

add_theme_support('post-thumbnails');
add_image_size('portfolio_small_image', 300, 300, true);

function projects_shortcode(){
    ob_start();

    ?>

    <?php
    $terms = get_terms('tr_portfolio_taxonomy');
    $count = count($terms);
    if ( $count > 0 ){
        echo '<ul id="projects-filter">';
        echo '<li><a href="#" data-filter="*">All</a></li>';
        foreach ( $terms as $term ) {
            $termname = strtolower($term->name);
            $termname = str_replace(' ', '-', $termname);
            echo '<li><a href="#" data-filter="' . '.' . $termname . '">' . $term->name . '</a></li>';
        }
        echo '</ul>';
    }
    ?>

    <?php
    $loop = new WP_Query(array('post_type' => 'tr_portfolio', 'posts_per_page' => -1));
    $count =0;
    ?>

    <div id="project-wrapper">
        <div id="projects">

            <?php if ( $loop ) :

                while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <?php


                    $terms = get_the_terms( $post->ID, 'tr_portfolio_taxonomy' );

                    if ( $terms && ! is_wp_error( $terms ) ) :
                        $links = array();

                        foreach ( $terms as $term )
                        {
                            $links[] = $term->name;
                        }
                        $links = str_replace(' ', '-', $links);
                        $tax = join( " ", $links );
                    else :
                        $tax = '';
                    endif;
                    ?>

                    <?php $infos = get_post_custom_values('wpcf-proj_url'); ?>

                    <div class="project-item <?php echo strtolower($tax); ?>">
                        <div class="thumb"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'portfolio_small_image' ); ?></a></div>
                  
                    </div>

                <?php endwhile; else: ?>

                <div class="error-not-found">Sorry, no portfolio entries for while.</div>

            <?php endif; ?>


        </div>

        <div class="clearboth"></div>

    </div> <!-- end #project-wrapper-->


    <?php


    return ob_get_clean();

}
add_shortcode('project','projects_shortcode');



function inc_js_shortcode(){
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            var mycontainer = jQuery('#projects');
            mycontainer.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'liniar',
                    queue: false,
                }
            });

            jQuery('#projects-filter a').click(function(){
                var selector = jQuery(this).attr('data-filter');
                mycontainer.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'liniar',
                        queue: false,
                    }
                });
                return false;
            });
        });
    </script>

<?php
}

add_action('wp_footer','inc_js_shortcode');
