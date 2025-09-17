<?php
if (function_exists("get_promotion_query")) {
	$query = get_promotion_query(1);
	if ($query->have_posts()) {
		while ($query->have_posts()):
			$query->the_post();
			$promotion_type = get_post_meta(
				get_the_ID(),
				"promotion_type",
				true
			);
			$noexpiry = get_post_meta(get_the_ID(), "promotion_noexpiry", true);
			$colorCode = get_post_meta(get_the_ID(), "promotion_color", true);
			$date = get_post_meta(get_the_ID(), "promotion_expiry_date1", true);
			$open_new_tab = get_post_meta(
				get_the_ID(),
				"promotion_open_new_tab",
				true
			);
			if (
				strtotime($date) >= strtotime(current_time("m/d/Y")) ||
				$noexpiry == 1
			) {

				$title = get_post_meta(get_the_ID(), "promotion_title1", true);
				$color = get_post_meta(get_the_ID(), "promotion_color", true);
				$subheading = get_post_meta(
					get_the_ID(),
					"promotion_subheading",
					true
				);
				$heading = get_post_meta(
					get_the_ID(),
					"promotion_heading",
					true
				);
				$footer_heading = get_post_meta(
					get_the_ID(),
					"promotion_footer_heading",
					true
				);
				$more_info = get_post_meta(
					get_the_ID(),
					"promotion_more_info",
					true
				);
				$requestButtonLink = get_post_meta(
					$post->ID,
					"request_button_link",
					true
				);
				$requestButtonTitle = get_post_meta(
					$post->ID,
					"request_button_title",
					true
				);
				?>

<div class="col-lg-6 px-0 px-lg-3">
    <div class="h-100 border-primary-dashed p-2">
        <div class="coupon_name promotion_c h-100 text-center p-1">
            <!-- Check if $color and $title are not empty before rendering -->
            <?php if (!empty($color) && !empty($title)): ?>
                <div class="color_quaternary_bg mb-2 w-100 h-100">

                    <h4 class="mb-0 pt-lg-3 pt-3 coupon_title coupon_offer"><?php echo $title; ?></h4>
                    
                    <!-- Check if $noexpiry is not set to 1 before rendering -->
                    <?php if ($noexpiry != 1 && !empty($date)): ?>
                        <span class="pt-lg-3 pt-2 d-block coupon_expiry mh-50">expires <?php echo $date; ?></span>
                    <?php endif; ?>

                    <div class="collapse bg-transparent border-0" id="collapseExample21">
                        <div class="card card-body bg-transparent border-0 py-0">

                            <!-- Check if $heading is not empty before rendering -->
                            <?php if (!empty($heading)): ?>
                                <span class="d-lg-block d-none  text-center py-2 px-lg-0 px-2 pt-2 my-lg-1 coupon_subtitle coupon_heading"><?php echo $heading; ?></span>
                            <?php endif; ?>
                            
                            <!-- Check if $subheading is not empty before rendering -->
                            <?php if (!empty($subheading)): ?>
                                <span class="d-block text-center  py-2 px-lg-0 px-2 coupon_sub_heading"><?php echo $subheading; ?></span>
                            <?php endif; ?>

                            <?php if (!empty($footer_heading)): ?>
                                <span class="d-block coupon_disclaimer mb-2">
                                    <?php echo $footer_heading; ?>
                                </span>
                            <?php endif; ?>
                            
                            <!-- Check if $more_info is not empty before rendering -->
                            <?php if (!empty($more_info)): ?>
                                <span class="d-block text-center  px-lg-0 px-3 pt-lg-0 pt-2 coupon_disclaimer"><?php echo $more_info; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <a class="w-166 text-uppercase font_alt_1 text_18 line_height_23 mh-33 text_semibold d-inline-flex align-items-center justify-content-center no_hover_underline mb-4 promotionC_icon more-info-button cursor-pointer" data-bs-toggle="collapse" href="#collapseExample21" role="button" aria-expanded="false" aria-controls="collapseExample21">More info <i class="icon-plus1 ms-4"></i></a>
                </div>
            <?php endif; ?>

            <!-- Check if $requestButtonLink is not empty before rendering -->
            <?php if (!empty($requestButtonLink) || !empty($requestButtonTitle)): ?>
                <a data-bs-toggle="<?php echo empty($requestButtonLink) ? "modal" : ""; ?>" 
                   data-bs-target="<?php echo empty($requestButtonLink) ? "#thank_you_request_coupon_form" : ""; ?>" 
                   <?php echo empty($requestButtonLink) ? 'onclick="couponButtonThankyouClick(this);"' : 'href="' . $requestButtonLink . '"'; ?>
                   <?php echo empty($requestButtonTitle) ? 'aria-label="Request Service"' : 'aria-label="' . $requestButtonTitle . '"'; ?>
                   class="btn btn-secondary w-100 btn-border request_service_button"
                   <?php echo $open_new_tab == 1 ? 'target="_blank"' : ""; ?>>
                   <?php echo empty($requestButtonTitle) ? "Request Service" : $requestButtonTitle; ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

            <?php
			}
		endwhile;
	}
} ?> 

<script type="text/javascript">
    jQuery(document).ready(function () {
	    jQuery('.promotionC_icon').each(function () {
	        jQuery(this).click(function () {
	            var text = jQuery(this).html().trim();
	            var currentText = jQuery(this).text();
	            if (currentText == "More info ") {
	                jQuery(this).html(text.replace('More info ', 'Less info '));   
	            } else {
	                jQuery(this).html(text.replace('Less info ', 'More info '));  
	            }
	        });
	    });
    });
</script>