#!/bin/bash
# This block defines the variables the user of the script needs to input
# when deploying using this script. 
# 
# 
# <UDF name="sshpk" label="SSH Public Key for 'root' and 'user' login.">
# <UDF name="userp" label="Password for 'user' login.">
# <UDF name="mysqlp" label="Password for mySQL">
# <UDF name="mysqldb" label="Database name for mySQL">

export USERN=vagrant
export MYSQLP=root
export MYSQLDB=csgl_web_dev

apt-get -y update
debconf-set-selections <<< "mysql-server mysql-server/root_password password $MYSQLP"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $MYSQLP"
apt-get -y install lamp-server^
mysql -uroot -p$MYSQLP <<< "create database $MYSQLDB;"
apt-get -y install php5-mcrypt
apt-get -y install php5-gd
echo "extension=mcrypt.so" >> /etc/php5/cli/conf.d/mcrypt.ini
echo "extension=mcrypt.so" >> /etc/php5/apache2/conf.d/mcrypt.ini
a2enmod rewrite
apt-get -y install git-core
apt-get -y install curl
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
echo "alias ls='ls -lah'" >> /home/$USERN/.bash_profile

sed -i "s/www-data/$USERN/g" /etc/apache2/envvars

apache2ctl stop
sleep 10
apache2ctl start