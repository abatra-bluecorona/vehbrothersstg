<?php
$assvariationIsset = $args['asset_variation'];
$asset_variation  = $args['asset_variation_isset'];
$selectedFolder = $args['asset_variation'];
$img1x = get_exist_image_url('landing-page', 'hero-img-gbp');
$img2x = get_exist_image_url('landing-page', 'hero-img-gbp@2x');
$img3x = get_exist_image_url('landing-page', 'm-hero-img-gbp@3x');

if ($asset_variation) {
    $img1x = get_exist_image_url('landing-page/' . $selectedFolder, 'hero-img-gbp');
    $img2x = get_exist_image_url('landing-page/' . $selectedFolder, 'hero-img-gbp@2x');
    $img3x = get_exist_image_url('landing-page/' . $selectedFolder, 'm-hero-img-gbp@3x');
}

$img1x = implode(',', (array) $img1x);
$img2x = implode(',', (array) $img2x);
$img3x = implode(',', (array) $img3x);
 
echo do_shortcode('[custom-bg-srcset class="landing_banner" img1x="'.$img1x.'" img2x="'.$img2x.'" img3x="'.$img3x.'" size1x="cover" size2x="cover" size3x="cover"]'); ?> 
<div class="container-fluid landing_banner landing_banner_img py-0 position-relative h-613">
    <div class="position-relative">
        <div class=" py-0">
            <div class="row pb-lg-0 pb-2 align-items-lg-center  h-613">
                <div class="col-md-8 d-none d-lg-block">
				<div class="landing-banner-left">
                    <h1 class="true_black text_36 sm_text_23 sm_line_height_24 line_height_64 text_normal text-capitalize"><?php echo $args['page_templates']['landing_page']['banner']['subheading']; ?></<?= $subheading_tag; ?>></h1>
                    <h2 class="color_tertiary  pb-lg-3 text_43 sm_text_30 sm_line_height_36 line_height_53 text_bold  text-capitalize"><?php echo $args['page_templates']['landing_page']['banner']['heading']; ?></<?= $heading_tag; ?>></h2>
                    <span class="display_3 pt-lg-3 true_black   pb-lg-3 mb-lg-1 pb-2 text-capitalize font_alt_2"><?php echo $args['page_templates']['landing_page']['banner']['content']; ?></span>
                    <a href="<?php echo  $args['page_templates']['landing_page']['banner']['button_link']; ?>" class="btn btn-primary mw-234 mh-43"><?php echo $args['page_templates']['landing_page']['banner']['button_text']; ?><i class="icon-chevron-right2 ms-2 me-0 bc_text_18 bc_line_height_18 transform_lg position-relative top_n2"></i> 
                    </a>
	</div>
                </div>
                <div class="sidebar landing-form col-lg-7 d-none"><div class="shadow-xl d-lg-block d-none pt-lg-3 pb-lg-4 color_secondary_bg shadow-lg border_form border_form_light  order-lg-1 order-1">
    
    <span class="d-block pt-lg-1 p-alt text-center font_default text_normal text_26 line_height_31 pb-1"><?php echo $args['page_templates']['landing_page']['banner']['form_heading']; ?></span>
   
     <?php 
                                    $form_id = $args['page_templates']['landing_page']['banner']['gravity_form_id']; 
                                    echo do_shortcode('[gravityforms id='.$form_id.' ajax=true]');?> 
</div></div>
            </div>
        </div>
    </div>

</div>
	                <div class=" d-block d-lg-none color_tertiary_bg">
				<div class="m-landing-banner-left ">
                    <span class="true_white text_29 sm_text_23 sm_line_height_24 line_height_24 text_bold text-capitalize"><?php echo $args['page_templates']['landing_page']['banner']['subheading']; ?></<?= $subheading_tag; ?>></span>
                    <span class="true_white  pb-lg-3 text_50 sm_text_30 sm_line_height_36 line_height_60 text_bold text-uppercase"><?php echo $args['page_templates']['landing_page']['banner']['heading']; ?></<?= $heading_tag; ?>></span>
                    <span class="display_3 pt-lg-3 true_black   pb-lg-3 mb-lg-1 pb-2 text-capitalize font_alt_2"><?php echo $args['page_templates']['landing_page']['banner']['content']; ?></span>
                    <a href="#" onclick="_scheduler.show({ schedulerId: 'sched_bm83yz6bi0823ifztx0jn3oc' })" class="btn btn-primary mw-227 mh-53"><?php echo $args['page_templates']['landing_page']['banner']['button_text']; ?><i class="icon-chevron-right ms-2 me-0 bc_text_18 bc_line_height_18 transform_lg position-relative top_n2"></i> 
                    </a>
	</div>
                </div>


<style>
.landing_banner .landing-form .gform_wrapper ul li.gfield .large , .landing_banner .border_form.border_form_light .floating_labels_wrapper .floating_labels label{
    color:#fff!important;
}
.landing_banner .border_form.border_form_light .gform_wrapper .gfield_checkbox .gchoice .gfield-choice-input{
    background-color:#fff!important;
}
    @media only screen and (max-width: 767px) {
        .landing_banner {
            background-image: url('<?php echo $img3x; ?>')!important;
            background-size: <?php echo $size3x; ?>;
            background-repeat: no-repeat;
            background-position: center center !important;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 1024px) {
        .landing_banner {
            background-image: url('<?php echo $img1x; ?>')!important;

            background-size: <?php echo $size2x; ?>;
            background-repeat: no-repeat;
            background-position: center center !important;
        }
    }
</style>