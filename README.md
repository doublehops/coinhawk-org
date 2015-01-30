COINHAWK
================================

Coinhawk is a project that retrieves and graphs the crypto markets of different exchanges. It connects to the exchanges through their API and stores the latest sale price and stores them in a database. It then graphs them using Highcharts. It will list all markets on single page to easily make comparisons and find rising/falling markets. The two markets currently supported are Cryptsy and MintPal.

I built the project in order to learn more about crypto currencies and Yii2.

The dev environment is easy to get running with Vagrant and Ansible. It is built with Yii2 and runs on Debian 7, Nginx and MariaDB.

INSTALLATION
------------

First, clone the project to a directory on your system:

~~~
git@github.com:doublehops/coinhawk.git coinhawk
~~~

If you want to use the supplied virtual machine option you will need to install Vagrant and Ansible and follow these steps:

1. Once installed, type *vagrant up*. This will take some time.
2. Type *vagrant ssh* to ssh into the vm and change to path /var/www. *cd /var/www*
3. Run *composer install* to install Yii and the project's dependencies.
4. Run *./yii migrate/up* to install the database tables.
5. Create assets folder and set permissions: *mkdir web/assets && chmod 777 web/assets* 
6. Add *192.168.33.12 coinhawk* to your hosts file: /etc/hosts for Mac/Linux
7. Point your browser to http://coinhawk/

Note that there are two cron jobs that are created to download to latest prices.
