# Raspberry Pi GPIO control from a web browser
Control the Raspberry Pi's GPIOs in your web browser using a web page hosted on the Raspberry Pi.  

**Control** and **view** the current state of all **GPIOs** of the Raspberry Pi in a **web browser**, using a specially designed **website**.
This website can be **accessed** from **any device on the same network** as the Raspberry Pi. 

## Features
* See the status of each GPIO
* Set all GPIOs to high and low
* Dark Mode
* Attractive and nice design
* Website optimized for mobile
* and more...  
## Screenshots
Screenshot  GPIO Control  
![screenshot](/docs/screenshot_gpio_control.PNG)   

Screenshot  Settings   
![screenshot](/docs/screenshot_settings.PNG)  

Screenshot  website   
![screenshot](/docs/screenshot_site.PNG)



## Installation
* Host the files *gpio-control.php* and *gpio-control-style.css*
 on a web server, on the Raspberry Pi (e.g. Apache Web Server)
* Install PHP on the Raspberry Pi and the web server must support PHP
* Install WiringPi on the Raspberry Pi (sometimes already preinstalled)
* use Raspberry Pi OS (Raspbian)
* :warning: JavaScript must be activated on the website  

### Installation using Apache Web Server (Recommended)

* Install Apache on the Raspberry Pi
* Install PHP on the Raspberry Pi
* Install the PHP module for the Apache Web Server
* Copy the files *gpio-control.php* and *gpio-control-style.css* into the *html* folder
* Under the domain *http://raspberrypi/gpio-control.php* you can access the website.  
**[Simple guide from raspberrypi.org to install Apache, PHP and the PHP module, for Apache2](https://www.raspberrypi.org/documentation/remote-access/web-server/apache.md)**   
**[Guide on github](https://github.com/raspberrypi/documentation/blob/master/remote-access/web-server/apache.md)   **

[GPIO pin numbering for these Raspberry Pi models](https://www.raspberrypi.org/documentation/usage/gpio/README.md)

## How it works
For this project PHP, JavaScript, JQuery and Ajax were used.  
PHP executes commands from Wiring pi in the console of the Raspberry Pi.  
The console commands of Wiring pi can control the GPIOs.  


*It is my first public project* :wave:
