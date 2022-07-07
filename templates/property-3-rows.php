<?php
/**
 * Template Name: Property 3 Rows
 *
 * Iya:) Custom template.
*/

get_header(); ?>

<section class="property-list">
    
    <?php if ( have_rows('property_content_position') ):
        
        while( have_rows('property_content_position') ) : the_row();
    
            $section_title = get_sub_field('section_title');
            $property_type = get_sub_field('property_type'); ?>
    
    
            <h2 class="m-2"><?php echo esc_html($section_title); ?></h2>
        
            <div class="d-flex flex-wrap position-relative pb-5">
    
    
                <?php $filters = ( function_exists('get_field') && get_field('categories_filters') ) ? get_field('categories_filters') : [$property_type];
                $taxonomy = ( !empty($filters) ) ? array( array('taxonomy' => 'filters', 'field' => 'id', 'terms' => $filters, 'operator' => 'IN', 'include_children' => false)) : '';
            
            	query_posts(array (
            		'post_type' => 'property',
            		'orderby' => 'date',
            		'order'   => 'DESC',
            		'paged' => 1,
            		'tax_query' => $taxonomy,
            		'posts_per_page' => 5
            	)); 
            	
            	$count = 0;
    	
                if ( have_posts() ) { while (have_posts()) : the_post();
    
                	if (!post_password_required()) {
                	    
                	    set_query_var( "counter_var", $count); 
                	    get_template_part( '/templates/content/content', 'loop' );
                	    $count++;
                	    
                	}
    
                endwhile; } 
                
                wp_reset_query(); ?>
    
            </div>
    
        <?php endwhile;
    
    endif; ?>

</section>

<?php get_footer(); ?>
