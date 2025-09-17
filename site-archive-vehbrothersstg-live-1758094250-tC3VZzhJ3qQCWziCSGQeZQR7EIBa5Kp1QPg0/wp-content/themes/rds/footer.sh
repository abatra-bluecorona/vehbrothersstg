#!/usr/bin/bash

#username=$(wp user get 1 --fields=user_login | awk 'NR==3 {print $2}')
username=$(wp user get 1 --field=user_login --format=csv | tail -n 1)
echo $username
password=$(wp user application-password create $username elementor9 | grep "Password:" | awk '{print $2}')
echo "$password"

sleep 4



curl -X POST \
  -H "Content-Type: application/json" \
  -d '{"conditions": [["include", "general", "", ""]]}' \
  -u $username:$password \
  https://$username.wpenginepowered.com//wp-json/elementor/v1/site-editor/templates-conditions/41535
