<?php
$args = RDS_TEMPLATE_DATA;

$get_rds_tracking = rds_tracking();
if (is_array($get_rds_tracking) && isset($get_rds_tracking["tracking"]["enable"]) && $get_rds_tracking["tracking"]["enable"] == true) {
    // do_action('rds_footer_top');
}
$get_rds_template_data_array = RDS_TEMPLATE_DATA;
$footerItems = $get_rds_template_data_array["globals"]["ctas"];
$desktopItems =
	$get_rds_template_data_array["globals"]["desktop_schedule_online_button"];
$heroItems = $get_rds_template_data_array["globals"]["hero"]["schedule_online"];
if ($heroItems["type"] == "schedule_engine") { ?>
    <script type="text/javascript">
        jQuery("#schedule_online_button_hero").click(function () {
            if (typeof ScheduleEngine !== "undefined" && ScheduleEngine) {
                ScheduleEngine.show();
            }
        });
    </script>
<?php } elseif ($heroItems["type"] == "service_titan") { ?>
    <script type="text/javascript">
        jQuery("#schedule_online_button_hero").click(function () {
            if (typeof STWidgetManager !== "undefined" && STWidgetManager) {
                STWidgetManager("ws-open");
            }
        });
    </script>
    <?php } elseif ($desktopItems["type"] === "zocdoc") { ?>
    <script type="text/javascript">
    jQuery(document).ready(function(){
        var zocdocContent = '<?php echo $get_rds_tracking["scheduler"][
        	"zocdoc_content"
        ]; ?>';
        jQuery('a.btn.btn-primary.mw-242.mh-43.no_hover_underline').attr('href','https://www.zocdoc.com/practice/mind-management-counseling-' + zocdocContent).addClass('zd-plugin').attr({'data-type':'book-button',  'data-practice-id': zocdocContent});
    });
</script>

    <?php }

if ($desktopItems["type"] == "schedule_engine") { ?>
    <script type="text/javascript">
        jQuery("#schedule_online_button_desktop").click(function () {
            if (typeof ScheduleEngine !== "undefined" && ScheduleEngine) {
                ScheduleEngine.show();
            }
        });
    </script>
<?php } elseif ($desktopItems["type"] == "service_titan") { ?>
    <script type="text/javascript">
        jQuery("#schedule_online_button_desktop").click(function () {
            if (typeof STWidgetManager !== "undefined" && STWidgetManager) {
                STWidgetManager("ws-open");
            }
        });
    </script>
    <?php } elseif ($desktopItems["type"] === "zocdoc") { ?>
    <script type="text/javascript">
    jQuery(document).ready(function(){
        var zocdocContent = '<?php echo $get_rds_tracking["scheduler"][
        	"zocdoc_content"
        ]; ?>';
        jQuery('a.btn.btn-primary.mw-242.mh-43.no_hover_underline').attr('href','https://www.zocdoc.com/practice/mind-management-counseling-' + zocdocContent).addClass('zd-plugin').attr({'data-type':'book-button',  'data-practice-id': zocdocContent});
    });
</script>

    <?php }

$i = 0;
foreach ($footerItems as $key => $value) {
	if ($value["enabled"] == true) {
		if ($value["type"] == "service_titan") { ?>
            <script type="text/javascript">
                jQuery("#schedule_online_button, #rds_footer_element_<?php echo $i; ?>").click(function () {
                    if (typeof STWidgetManager !== "undefined" && STWidgetManager) {
                        STWidgetManager("ws-open");
                    }
                });
            </script>
            <?php } elseif ($value["type"] == "schedule_engine") { ?>
            <script type="text/javascript">
                jQuery("#schedule_online_button, #rds_footer_element_<?php echo $i; ?>").click(function () {
                    if (typeof ScheduleEngine !== "undefined" && ScheduleEngine) {
                        ScheduleEngine.show();
                    }
                });
            </script>
            <?php } elseif (
			$value["type"] == "url" &&
			$key == "schedule_online"
		) { ?>
            <script type="text/javascript">
                var href = "<?php echo get_home_url() . $value["url"]; ?>";
                jQuery("#schedule_online_button").attr("href", href)
                jQuery("#rds_footer_element_<?php echo $i ?>").attr("href", href);
            </script>
            <?php } elseif ($value["type"] == "sms") { ?>
            <script type="text/javascript">
                var href = "<?php echo $value["url"]; ?>";
                jQuery("#rds_footer_element_<?php echo $i ?>").attr("href", href);
            </script>
            <?php } else { ?>
            <script type="text/javascript">
                var href = "<?php echo get_home_url() . $value["url"]; ?>";
                jQuery("#rds_footer_element_<?php echo $i ?>").attr("href", href)
            </script>
            <?php }
	}
	$i++;
}
//exaple how to set image sizewise
// ['dektop', 'ipad', 'mobile']
$img1x = [
	get_exist_image_url("in-content-cta", "in-content-bg"),
	get_exist_image_url("in-content-cta", "in-content-bg@2x"),
	get_exist_image_url("in-content-cta", "in-content-bg@3x"),
];

$img2x = [
	get_exist_image_url("in-content-cta", "in-content-bg"),
	get_exist_image_url("in-content-cta", "in-content-bg@2x"),
	get_exist_image_url("in-content-cta", "in-content-bg@3x"),
];

$img3x = [
	get_exist_image_url("in-content-cta", "in-content-bg"),
	get_exist_image_url("in-content-cta", "in-content-bg@2x"),
	get_exist_image_url("in-content-cta", "in-content-bg@3x"),
];
$img1x = Implode(",", $img1x);
$img2x = Implode(",", $img2x);
$img3x = Implode(",", $img3x);
?>
<?php echo do_shortcode(
	'[custom-bg-srcset class="got-an-emergency" img1x="' .
		$img1x .
		'" img2x="' .
		$img2x .
		'" img3x="' .
		$img3x .
		'" size1x="cover" size2x="cover" size3x="cover"]'
); ?>

<script type="text/javascript">
    let places, input, address, city, inputs_class;
    jQuery(document).ready(function ($) {
//CODE FOR GEOLOCATION AUTOMATIC FIELD START
        jQuery('body').on("keyup", '.rds_geo_autopopulate_value .ginput_container_text input', function () {
            input_class = $(this);
            var city = "";
            var state = "";
            var places = new google.maps.places.Autocomplete(
                input_class[0]
                );
            google.maps.event.addListener(places, "place_changed", function () {
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
                var latlng = new google.maps.LatLng(latitude, longitude);
                var geocoder = (geocoder = new google.maps.Geocoder());
                geocoder.geocode({latLng: latlng}, function (results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            var address = results[0].formatted_address;
                            var pin =
                            results[0].address_components[
                                results[0].address_components.length - 1
                                ].long_name;
                            var country =
                            results[0].address_components[
                                results[0].address_components.length - 2
                                ].long_name;
                            state =
                            results[0].address_components[
                                results[0].address_components.length - 3
                                ].long_name;
                            city =
                            results[0].address_components[
                                results[0].address_components.length - 4
                                ].long_name;
                            jQuery(input_class).parent().parent().siblings(".rds_gravity_state_city").find('input').val(city + ', ' + state);
                            jQuery(input_class).parent().parent().siblings(".rds_gravity_state_city").find('.gfield_label').addClass('float_label');
                        }
                    }
                });
            });

        });
//CODE FOR GEOLOCATION AUTOMATIC FIELD END
    });
//CODE FOR OVERLAPING TEXT FIELDS AFTER SUBMITION STATRT
    jQuery(document).on('gform_post_render', function (event, form_id, current_page) {
        var iframe_html = jQuery("#gform_ajax_frame_" + form_id).contents().find("html body").html();
        var error = jQuery(iframe_html).find(".gform_validation_errors");
        if (iframe_html && error.length == 0) {
//            event.preventDefault();
            jQuery("body").find("#gform_" + form_id + " .gfield_label").each(function (k, d) {
                if (jQuery(window).width() > 991) {
                    if (jQuery(this).closest(".home_form_c").length > 0) {
                        this.style.setProperty('margin-top', '-2px', 'important');
                        this.style.setProperty('color', '#949ca1', 'important');
                        this.style.setProperty('font-size', '9px', 'important');
                    } else {
                        this.style.setProperty('margin-top', '7px', 'important');
                        this.style.setProperty('color', '#000', 'important');
                        this.style.setProperty('font-size', '9px', 'important');
                    }
                } else {
//                                this.style.setProperty('margin-left', '10px', 'important');
                    this.style.setProperty('margin-left', '0px', 'important');
                }
//                this.classList.add("float_label");
            });

        }
    });
//CODE FOR OVERLAPING TEXT FIELDS AFTER SUBMITION END

    function rgb2hex(rgb) {
        rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
        return (rgb && rgb.length === 4) ? "#" +
        ("0" + parseInt(rgb[1], 10).toString(16)).slice(-2) +
        ("0" + parseInt(rgb[2], 10).toString(16)).slice(-2) +
        ("0" + parseInt(rgb[3], 10).toString(16)).slice(-2) : '';
    }
    function wc_hex_is_light(color) {
        const hex = color.replace('#', '');
        const c_r = parseInt(hex.substring(0, 0 + 2), 16);
        const c_g = parseInt(hex.substring(2, 2 + 2), 16);
        const c_b = parseInt(hex.substring(4, 4 + 2), 16);
        const brightness = ((c_r * 299) + (c_g * 587) + (c_b * 114)) / 1000;
        return brightness > 155;
    }
    jQuery(document).ready(function () {

        jQuery(".apply-conditional-color").each(function (index) {
            let color_bg = jQuery(this).parents('.container-fluid, #cta-a ').css("background-color");
// let model_color_bg = jQuery(this).parents('#cta-a').css("background-color");
            let dark_color_class = jQuery(this).data("dark-color")
            let light_color_class = jQuery(this).data("light-color")

// console.log(light_color_class,dark_color_class,rgb2hex(color_bg),wc_hex_is_light(rgb2hex(color_bg)));
            if (wc_hex_is_light(rgb2hex(color_bg))) {
                jQuery(this).addClass(dark_color_class);
            } else {
                jQuery(this).addClass(light_color_class);
            }

        });
        jQuery(".tool_tip_text").find("a.text-uppercase.text-decoration-none").attr("class","color_primary_hover")
    });
</script>        
<?php 
if (is_array($get_rds_tracking) && isset($get_rds_tracking["tracking"]["enable"]) && $get_rds_tracking["tracking"]["enable"] == true) {
	//do_action('rds_footer_bottom');
} ?>

<?php

$current_url = $_SERVER['REQUEST_URI'];

if (strpos($current_url, '/heating/') !== false || 
    strpos($current_url, '/air-conditioning/') !== false || 
    strpos($current_url, '/air-quality/') !== false) {
    echo '<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "HVACBusiness",
  "name": "Verne & Ellsworth Hann",
  "image": "https://www.vehbrothers.com/wp-content/themes/rds-child/img/header/header-logo.webp",
  "@id": "",
  "url": "https://www.vehbrothers.com/",
  "telephone": "216-932-9755",
  "priceRange": "Varies",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "2026 Lee Rd",
    "addressLocality": "Cleveland Heights",
    "addressRegion": "OH",
    "postalCode": "44118",
    "addressCountry": "US"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday"
    ],
    "opens": "08:00",
    "closes": "16:30"
  } 
}
</script>';

}
?>

<?php if(is_page(array(140,142,145,148,151,154,156,159,162))) : ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Plumber",
  "name": "Verne & Ellsworth Hann Inc.",
  "image": "https://www.vehbrothers.com/wp-content/themes/rds-child/img/header/header-logo.webp",
  "@id": "",
  "url": "https://www.vehbrothers.com/",
  "telephone": "(216) 932-9755",
  "priceRange": "Varies",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "2026 Lee Rd",
    "addressLocality": "Cleveland Heights",
    "addressRegion": "OH",
    "postalCode": "44118",
    "addressCountry": "US"
  },
  "openingHoursSpecification": [{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday"
    ],
    "opens": "08:30",
    "closes": "16:30"
  },{
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": "",
    "opens": "",
    "closes": ""
  }] 
}
</script>

<?php endif; ?>

<script type="application/ld+json">{
"@context": "https://schema.org",
"@type": ["HVACBusiness", "Plumber"],
"name": "Verne & Ellsworth Hann",
"image": "https://www.vehbrothers.com/wp-content/themes/rds-child/img/header/header-logo.webp",
"@id": "https://www.vehbrothers.com/#local",
"url": "https://www.vehbrothers.com/",
"telephone": "(216) 932-9755",
"priceRange": "$",
"address": {
"@type": "PostalAddress",
"streetAddress": "2026 Lee Rd",
"addressLocality": "Cleveland Heights",
"addressRegion": "OH",
"postalCode": "44118",
"addressCountry": "US"
},
"geo": {
"@type": "GeoCoordinates",
"latitude": 41.5045981,
    "longitude": -81.565772
},
"aggregateRating": {
"@type": "AggregateRating",
"ratingValue": "4.9",
"reviewCount": "796"
},
"openingHoursSpecification": {
"@type": "OpeningHoursSpecification",
"dayOfWeek": [
 "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday"
    ],
    "opens": "08:00",
    "closes": "16:30"
},
"sameAs": [
"https://www.facebook.com/324106220971373",
"https://www.linkedin.com/company/verne-&-ellsworth-hann-inc-/",
"https://twitter.com/vehbrothers"
]
}</script>
