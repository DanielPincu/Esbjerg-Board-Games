<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php
    $args = array(
        'post_type' => 'testimonial',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $testimonials_query = new WP_Query($args);
    if ($testimonials_query->have_posts()) :
        while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
            ?>
            <article class="testimonial orange">
                <figcaption class="flex flex-col h-full">
                    <blockquote class="flex-grow">
                        <?php the_content(); ?>
                    </blockquote>
                    <h3 class="text-2xl font-bold text-gray-800"><?php the_title(); ?></h3>
                    <h4 class="text-sm text-gray-600">Attendant</h4>
                </figcaption>
            </article>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No testimonials found.</p>';
    endif;
    ?>
</section>