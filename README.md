paradigms_project1
==================
Configuraton & Run

Environment:
Linux / Mysql / Apache2 / PHP

1. import website.sql into database ( database named 'website' or using your own name)

2. modify index.php
   line 15: change the database connection parameters according to your environment

3. modify apache.conf, change the path ponit to your directory

3. link the configuration file to the apache conf.d directory
   Under Ubuntu 12.04, run following command:
   cd /path/to/the/extracted/directory
   sudo ln -sf ./apache.conf /etc/apache2/conf.d/website.conf

5. open your broswer, if you use default configuration of apache2, just access http://localhost/website
   there you can see the page

any questions, please contact gaox@gwu.edu
