<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */
// Exit if accessed directly.
defined("ABSPATH") || exit();
get_header();
$get_rds_template_data_array = RDS_TEMPLATE_DATA;
?>
<main>
    <!-- Subpage banner starts -->
    <?php get_template_part(
    	"global-templates/subpage-hero/subpage-banner-section"
    ); ?>
    <!-- subpage banner ends -->
    <div class="w-100 d-block">
        <div class="d-flex flex-column">
            <div class="d-block">
                <!-- Subpage content area starts -->
                <div class="container-fluid pt-4  order-1 order-lg-1 pb-lg-5 pb-4 my-2  px-lg-3 px-0">
                    <div class="container pt-lg-3 subpage_full_content pb-lg-5 px-lg-3 px-0">
                        <div class="row pb-lg-5 ">
                            <div class="col-lg-12 ">
                                <a name="back to CAREER" href="<?php echo wp_get_referer(); ?>" class="no_hover_underline d-inline-flex align-items-center text_semibold text_semibold_hover text-uppercase text_18 line_height_23 font_alt_1 mb-3 ">
                                    <i class=" bc_text_18 bc_line_height_18 icon-chevron-left2 me-1 position-relative "></i> 
                                    back to CAREERs
                                </a>
                            </div>
                            <?php if (have_posts()):
                            	while (have_posts()):
                            		the_post();
                            		get_template_part(
                            			"loop-templates/content",
                            			"position"
                            		);
                            	endwhile;
                            endif; ?>
                        </div>
                    </div>
                </div>
                <!-- Subpage content area ends -->
            </div>
            <?php
//echo do_shortcode('[bc-blog-slider]');
?>
            <?php
            if (
                $get_rds_template_data_array["globals"]["request_service"][
                    "variation"
                ] == "b"
            ) {
                get_template_part(
                    "global-templates/request-service/b",
                    null,
                    $get_rds_template_data_array
                );
            }  
            if ($get_rds_template_data_array["globals"]["company_services"]) {
                get_template_part(
                    "global-templates/company-services/a",
                    null,
                    $get_rds_template_data_array
                );
            }
            ?>
        </div>
    </div>
</main>
<style>
.contact_form .gform_wrapper ul.gfield_checkbox li label {
    color: #3d3d3d !important;
}
</style>
<?php get_footer();

