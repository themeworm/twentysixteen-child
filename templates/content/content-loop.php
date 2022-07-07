<?php
$property_photos_count = (function_exists('get_field') && get_field('property_photos') && is_array(get_field('property_photos'))) ? sizeof(get_field('property_photos')) : 0;
$property_area = (function_exists('get_field') && get_field('property_area')) ? get_field('property_area') : 0; 
$property_price = (function_exists('get_field') && get_field('property_price')) ? get_field('property_price') : 0; 
$property_floor = (function_exists('get_field') && get_field('property_floor')) ? get_field('property_floor') : 0;
$thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
$thumbnail_url = (is_array($thumbnail_data)) ? esc_url($thumbnail_data[0]) : "default";
$rand = rand (0, 5000);
$count = get_query_var( "counter_var" ); 
$counter_class = ($count === 0) ? "first-item col-12 col-md-12" : "col-12 col-md-6"; ?>
	    
<div class="property-item p-2 <?php echo esc_html($counter_class); ?>" >
		    
    <div class="property-background p-6 col h-100 overflow-hidden position-relative rounded-4" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);">
		        
	    <?php echo "<a class='position-absolute start-0 end-0 top-0 bottom-0' href='" . esc_url($thumbnail_url) . "' data-fancybox='group-" . $rand . "'><img class='d-none' src='" . esc_url($thumbnail_url) . "' width='50' height='50' /></a>"; ?>
		    
        <h5 class="property-title position-absolute top-0 start-0 p-2 px-3 fs-6 m-3 rounded-pill bg-dark text-white"><?php the_title(); ?></h5>
    		    
        <div class="property-info position-absolute bottom-0 end-0 m-2 d-flex justify-content-end flex-wrap flex-column align-items-end">
            
    	    <div class="property-floor rounded-pill bg-light text-dark fs-6 p-2 m-2"><span class="fw-bold"><i class="bi bi-layers"></i> <?php echo esc_html($property_floor); ?></span> эт</div>
            <div class="property-area rounded-pill bg-light text-dark fs-6 p-2 m-2"><span class="fw-bold"><i class="bi bi-textarea-resize"></i> <?php echo esc_html($property_area); ?></span> м<sup>2</sup></div>
        	<div class="property-price shadow-lg rounded-pill bg-light text-white fs-6 p-2 px-3 me-2 m-2"><span class="fs-5 fw-bold"><?php echo esc_html(number_format($property_price, 0, " ", " ")); ?></span> руб</div>

    	</div>
    		    
    	<div class="property-photos-container position-absolute bottom-0 start-0 m-2">
    	
    	    <div class="property-photos-count shadow-lg rounded-circle bg-light text-dark fs-6 p-1 px-2 ms-2 mb-2 fw-bold"><i class="bi bi-camera"> </i>
    		    <span class="photos-number position-absolute top-0 start-100 translate-middle badge rounded-pill fw-normal">
                    <?php echo esc_html($property_photos_count) + 1; ?>
                </span>
    		</div>
    		        
    	</div>
    		    
        <?php 
        if ( function_exists('get_field') && $property_photos_count > 0 ) {
            		    
            $photos = is_array(get_field('property_photos')) ? array_reverse(get_field('property_photos')) : array();
            $rotate = 0;
            $i = 1;
            		    
            foreach ( $photos as $photo => $value ) {
            			    
                $hidden = ($i > 5) ? "d-none" : ""; $i++;
            	echo "<div class='property-image position-absolute bottom-0 p-1 bg-white ms-3 mb-5 shadow " . $hidden . "' style='transform: rotate(" . $rotate . "deg);'>
            	    <a href='" . esc_url( $value['url']) . "' data-fancybox='group-" . $rand . "'><img src='" . esc_url( $value['sizes']['thumbnail'] ) . "' width='50' height='50' /></a>
            	</div>";
            	
            	$rotate = $rotate + 8;
            }
        } ?>
		    
	</div>
		    
</div>
				
