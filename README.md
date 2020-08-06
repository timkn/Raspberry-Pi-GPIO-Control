# Raspberry-Pi-GPIO-Control
Control the Raspberry Pi's GPIOs in your web browser using a web page hosted on the Raspberry Pi.  

## Features
* See the status of each GPIO
* Set all GPIOs to high and low
* Dark Mode
* Attractive and nice design
* Website optimized for mobile
* and more...  
:framed_picture:
## Screenshots
Screenshot  GPIO Control  
![screenshot](/docs/screenshot_gpio_control.PNG)  
Screenshot  Settings   
![screenshot](/docs/screenshot_settings.PNG)  
Screenshot  Site   
![screenshot](/docs/screenshot_site.PNG)



## Installation
* Host the files "gpio-control.php" and "gpio-control-style.css"
 on a web server, on the Raspberry Pi (e.g. Apache2)
* Install PHP on the Raspberry Pi and the web server must support PHP
* Install WiringPi on the Raspberry Pi (sometimes already preinstalled)
* use Raspberry Pi OS (Raspbian)
* :warning: JavaScript must be activated on the website  

instructions from [raspberrypi.org](https://www.raspberrypi.org/documentation/remote-access/web-server/apache.md) 

[GPIO pin numbering for these Raspberry Pi models](https://www.raspberrypi.org/documentation/usage/gpio/README.md)

## How it works
For this project PHP, JavaScript, JQuery and Ajax were used.  
PHP executes commands from Wiring pi in the console of the Raspberry Pi.  
The console commands of Wiring pi can control the GPIOs.  


*It is my first public project :)* :wave:
