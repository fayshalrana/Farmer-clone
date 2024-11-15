$ cat change_permission.sh
#!/bin/bash

#Change directory and change ownership
cd /var/www/html/ && sudo chown -R www-data:ubuntu orderific-website-ui/

#change directory and change permission
cd /var/www/html/ && sudo chmod -R 775 orderific-website-ui/
