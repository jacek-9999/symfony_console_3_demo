#!/usr/bin/env bash

sudo apt-get -y install php5
sudo cp /vagrant/000-default.conf /etc/apache2/sites-enabled
sudo service apache2 restart
