# Laravel - Vagrant

This guide will allow you to easily run Larravel on any operating system supported
by Vagrant.

## Requirements
* VirtualBox: http://www.virtualbox.org
* Vagrant: http://www.vagrantup.com
* Ansible: https://pypi.python.org/pypi/ansible/ . Install using `sudo pip install ansible`
* (Preferebly) fast internet for initial setup

## Using Digital Ocean
If you want a public IP for your box, you can use Digital Ocean. It will cost about $5/mo.

See https://github.com/smdahlen/vagrant-digitalocean for details.

First, configure the `Vagrantfile` with your Personal API Token.

Then, install the DO provider.

    vagrant plugin install vagrant-digitalocean    

Finally, provision a box.

    vagrant up --provider=digital_ocean

## Using VirtualBox
VirtualBox is great for running local machines.

Run the following command from `vagrant/` directory:

    vagrant up

You may be prompted to select a working network interface, 
also if this is the first time the command run, it will setup a 64bit Ubuntu VM 
on the local machine, approximately ~200MB download.

After `vagrant up` finished running (and dependencies installed), run this command to
login to the new virtual environment:

    vagrant ssh


## Stopping Vagrant
Run the following command while logged in on the virtual environment (vagrant ssh):

    sudo shutdown -P now

Or, run the following command from quackenbush directory (outside vagrant ssh):

    vagrant halt


## Suspend and Resume
In addition to usual vm boot time, Vagrant perform dependency check on start-up, 
so the startup time is pretty long. 
To cut down the start up time, suspend the VM instead of shutting it down.

Run the following command from CoralBK/vagrant/ from host machine:
- Suspend:  `vagrant suspend`
- Resume: `vagrant resume`

## Configuring the site

Currently all data access goes through the CSGL API. You'll need to configure the API endpoint IP address.

## Browsing the site

The `Vagrantfile` assigned a local IP address automatically via DHCP. To find it, use this:

    vagrant ssh
    ifconfig

The result might look like:

    eth0      Link encap:Ethernet  HWaddr 08:00:27:88:0c:a6  
              inet addr:10.0.2.15  Bcast:10.0.2.255  Mask:255.255.255.0
              inet6 addr: fe80::a00:27ff:fe88:ca6/64 Scope:Link
              UP BROADCAST RUNNING MULTICAST  MTU:1500  Metric:1
              RX packets:517 errors:0 dropped:0 overruns:0 frame:0
              TX packets:324 errors:0 dropped:0 overruns:0 carrier:0
              collisions:0 txqueuelen:1000 
              RX bytes:57612 (57.6 KB)  TX bytes:46439 (46.4 KB)
              
    eth1      Link encap:Ethernet  HWaddr 08:00:27:bd:07:81  
              inet addr:172.28.128.3  Bcast:172.28.128.255  Mask:255.255.255.0
              UP BROADCAST RUNNING MULTICAST  MTU:1500  Metric:1
              RX packets:3 errors:0 dropped:0 overruns:0 frame:0
              TX packets:5 errors:0 dropped:0 overruns:0 carrier:0
              collisions:0 txqueuelen:1000 
              RX bytes:1323 (1.3 KB)  TX bytes:962 (962.0 B)
              
    lo        Link encap:Local Loopback  
              inet addr:127.0.0.1  Mask:255.0.0.0
              inet6 addr: ::1/128 Scope:Host
              UP LOOPBACK RUNNING  MTU:16436  Metric:1
              RX packets:16 errors:0 dropped:0 overruns:0 frame:0
              TX packets:16 errors:0 dropped:0 overruns:0 carrier:0
              collisions:0 txqueuelen:0 
              RX bytes:1296 (1.2 KB)  TX bytes:1296 (1.2 KB)

In this case, `eth1 inet addr` is `172.28.128.3`. That is the IP to use for browsing.

If you get tired of this changing, you can assign a static IP in the `Vagrantfile` and put an entry in
your `hosts` table. But that is beyond the scope of this document.
