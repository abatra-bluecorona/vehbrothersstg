<div class="container-fluid pt-lg-5 pt-4 color_quaternary_bg finance_page_form pb-lg-5 pb-3">
    <div class="container pt-lg-5 pt-3">
        <div class="row">
            <div class="col-lg-12 free_estimate_form">
                <?php if (!empty($args["page_templates"]["finance_page"]["gravity_form_heading"])): ?>
                    <h4 class="pb-4 mb-0 text-center"><?php echo $args["page_templates"]["finance_page"]["gravity_form_heading"]; ?></h4>
                <?php endif; ?>
                
                <?php if (!empty($args["page_templates"]["finance_page"]["gravity_form_id"])): ?>
                    <?php
                    $form_id = $args["page_templates"]["finance_page"]["gravity_form_id"];
                    echo do_shortcode("[gravityforms id=" . $form_id . " ajax=true]");
                    ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
