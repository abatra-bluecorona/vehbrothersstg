<div class="container-fluid pt-4 pt-lg-5 pb-lg-5 pb-4 my-2">
    <div class="container pb-lg-5">
        <div class="row pb-lg-5">
            <div class="col-12 col-lg-8">
                <h1><?php the_title(); ?></h1>
                <?php if (!empty($args["page_templates"]["contact_page"]["content"])): ?>
                    <?php echo $args["page_templates"]["contact_page"]["content"]; ?>
                <?php endif; ?>
                <div class="contact_form contact_page mb-lg-5">
                    <?php
                    if (!empty($args["page_templates"]["contact_page"]["gravity_form_id"])) {
                        $form_id = $args["page_templates"]["contact_page"]["gravity_form_id"];
                        echo do_shortcode("[gravityforms id=" . $form_id . " ajax=true]");
                    }
                    ?>
                </div>
            </div>  
            
            <div class="col-sm-12 col-lg-4 pt-lg-0 pt-3 ps-lg-5">
                <div class="mb-4 pb-1">
                    <?php if (!empty($args["page_templates"]["contact_page"]["hours_heading"])): ?>
                        <h6 class="mb-3"><?php echo $args["page_templates"]["contact_page"]["hours_heading"]; ?></h6> 
                    <?php endif; ?>
                    <?php if (!empty($args["site_info"]["week_days"])): ?>
                        <p class="mb-0"><?php echo $args["site_info"]["week_days"]; ?></p>
                    <?php endif; ?>
                    <?php if (!empty($args["site_info"]["weekday_hours"])): ?>
                        <p class="mb-0"><?php echo $args["site_info"]["weekday_hours"]; ?></p>
                    <?php endif; ?>
                    <?php if (!empty($args["site_info"]["weekend_days"])): ?>
                        <p class="mb-0"><?php echo $args["site_info"]["weekend_days"]; ?></p>
                    <?php endif; ?>
                    <?php if (!empty($args["site_info"]["weekend_hours"])): ?>
                        <p class="mb-0"><?php echo $args["site_info"]["weekend_hours"]; ?></p>
                    <?php endif; ?>
                </div>
                <div class="mb-4 pb-1">
                    <?php if (!empty($args["page_templates"]["contact_page"]["address_heading"])): ?>
                        <h6 class="mb-3"><?php echo $args["page_templates"]["contact_page"]["address_heading"]; ?></h6>
                    <?php endif; ?>
                    <?php
                    if (!empty($args["site_info"]["address"])) {
                        $address = $args["site_info"]["address"];
                        foreach ($address as $value) {
                            if (!empty($value["address"]) || !empty($value["city"]) || !empty($value["state"]) || !empty($value["zip"])) {
                                ?>
                                <p class="pl-lg-0 pr-lg-0 mb-0">
                                    <?php echo $value["address"]; ?><br>
                                    <?php echo $value["city"]; ?> 
                                    <?php echo $value["state"]; ?> 
                                    <?php echo $value["zip"]; ?>
                                </p>
                                <?php if (!empty($value["map_directions_link"])): ?>
                                    <div class="d-flex mb-3">
                                        <a href="<?php echo $value["map_directions_link"]; ?>" class="no_underline" target="_blank">
                                            <i class="icon-location-dot1 "></i>&nbsp; Get Directions &nbsp;<i class="icon-chevron-right "></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
                <div class="mb-5 contact-social  mt-n3">
                    <?php if (!empty($args["site_info"]["heading"])): ?>
                        <h6 class="mb-3"><?php echo $args["site_info"]["heading"]; ?></h6>
                    <?php endif; ?>
                    <div class="text-start">
                        <?php
                        if (!empty($args["site_info"]["social_media"]["items"])) {
                            $socialItems = $args["site_info"]["social_media"]["items"];
                            foreach ($socialItems as $value) {
                                if (!empty($value["icon_class"]) && !empty($value["url"])) {
                                    echo '<a target="_blank" class="text_35 no_hover_underline line_height_30 mx-2 ms-lg-0 me-lg-2 no_hover_underline social_icons_contact" title="' . $value["icon_class"] . '" href="' . $value["url"] . '">
                                            <i class="' . $value["icon_class"] . ' color_primary"></i>
                                          </a>';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
             <!-- iframe embed -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2987.985082764425!2d-81.56834692419729!3d41.504598071285216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8830fc4e9831f3bd%3A0x773cf4684ebb9633!2s2026%20Lee%20Rd%2C%20Cleveland%20Heights%2C%20OH%2044118%2C%20USA!5e0!3m2!1sen!2snl!4v1685441484903!5m2!1sen!2snl" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
