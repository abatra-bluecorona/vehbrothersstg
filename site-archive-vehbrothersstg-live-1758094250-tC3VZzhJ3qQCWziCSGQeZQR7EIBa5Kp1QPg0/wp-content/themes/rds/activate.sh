#!/bin/bash

# Replace these values with your actual site path and plugin/theme names. I am Here 123.
SITE_PATH_THEMES="./wp-content/themes"
SITE_PATH_PLUGIN="./plugins"

THEME_NAME="rds-child"

PLUGIN_NAME_1="rds-gallery-plugin"
PLUGIN_NAME_2="rds-promotions-plugin"
PLUGIN_NAME_3="rds-testimonials-plugin"
PLUGIN_NAME_4="rds-configuration-plugin"
PLUGIN_NAME_5="rds-setting-plugin"

pwd

sed -i '111i\define('"'"'WP_MEMORY_LIMIT'"'"', '"'"'4096M'"'"');' wp-config.php

sed -i '112i\define('"'"'WP_MAX_MEMORY_LIMIT'"'"', '"'"'4096M'"'"');' wp-config.php

sed -i '113i\define('"'"'RDS_GALLERT_REPO'"'"', '"'"'https://github.com/ESBlueCorona/rds-gallery-plugin'"'"');' wp-config.php

sed -i '114i\define('"'"'RDS_PROMOTIONS_REPO'"'"', '"'"'https://github.com/ESBlueCorona/rds-promotions-plugin'"'"');' wp-config.php

sed -i '115i\define('"'"'RDS_TESTIMONIALS_REPO'"'"', '"'"'https://github.com/ESBlueCorona/rds-testimonials-plugin'"'"');' wp-config.php

sed -i '116i\define('"'"'RDS_CONFIGURATION_REPO'"'"', '"'"'https://github.com/ESBlueCorona/rds-configuration-plugin'"'"');' wp-config.php

sed -i '117i\define('"'"'RDS_SETTING_REPO'"'"', '"'"'https://github.com/ESBlueCorona/rds-setting-plugin'"'"');' wp-config.php

sed -i '118i\define('"'"'GIT_BRANCH'"'"', '"'"'live'"'"');' wp-config.php

sed -i '119i\define('"'"'GIT_AUTHENTICATION'"'"', '"'"'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'"'"');' wp-config.php

sed -i '120i\define('"'"'RDS_MAIN_THEME_REPO'"'"', '"'"'https://github.com/ESBlueCorona/Polaris-RDS'"'"');' wp-config.php

sed -i '121i\define('"'"'RDS_CHILD_THEME_REPO'"'"', '"'"'https://github.com/ESBlueCorona/Polaris-rds-Child'"'"');' wp-config.php

# Navigate to the WordPress root directory
cd $SITE_PATH_THEMES

# Activate the theme
wp theme activate $THEME_NAME

cd ../

pwd

cd $SITE_PATH_PLUGIN

wp plugin install wordpress-importer --activate

wp plugin install elementor --activate

#unzip elementor-pro.zip

#wp plugin activate elementor-pro

#wget https://downloads.wordpress.org/plugin/gravityformscli.1.4.zip

#unzip gravityformscli.1.4.zip

wp plugin activate gravityformscli

wp gf install --key=eb1d5f19c4c5b25a0e272a7243ca1c87 --activate

# Activate the plugin
wp plugin activate $PLUGIN_NAME_1 $PLUGIN_NAME_2 $PLUGIN_NAME_3 $PLUGIN_NAME_4 $PLUGIN_NAME_5 

cd ../../

#cd specs_files

cd polaris-rds-spec-files

mv elementor-pro.zip ../wp-content/plugins/

cd ../wp-content/plugins/

unzip elementor-pro.zip

wp plugin activate elementor-pro

cd ../../polaris-rds-spec-files

wp import rds.wordpress.xml --authors=create

wp gf form import gravityforms-export-2024-01-05.json

cd ../

#echo "define('WP_MEMORY_LIMIT', '4096M');" >> wp-config.php

#echo "define('WP_MAX_MEMORY_LIMIT', '4096M');" >> wp-config.php

pwd

wp user delete rds_developer --yes

wp user create rds_developer developers@bluecorona.com --role=administrator --user_pass=7CYLZmSunStapXWD

wp rewrite structure '/%postname%'

wp option update page_on_front $(wp post list --post_type=page --post_status=publish --fields=ID,post_title --title="Home" --format=json | jq -r '.[0].ID')

wp option update show_on_front page

wp option update page_for_posts $(wp post list --post_type=page --post_status=publish --fields=ID,post_title --title="Blog" --format=json | jq -r '.[0].ID')

wp cache flush

cd wp-content/themes/rds/

chmod +x footer.sh

./footer.sh
