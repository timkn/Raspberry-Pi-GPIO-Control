<?php
//For Ajax: change the gpio state and return the gpio state
if (isset($_GET['gpio'], $_GET['state'])) {
    $result = array();
    $gpio = $_GET['gpio'];
    $state = $_GET['state'];

    $result['gpio'] = $gpio;
    $result['state'] = setGPIOState($gpio, $state);

    echo json_encode($result);
    exit();
}

//For Ajax: query and return the state of a gpio
if (isset($_GET['gpiostate'])) {
    $result = array();
    $gpio = $_GET['gpiostate'];

    $result['gpio'] = $gpio;
    $result['state'] =  getGPIOState($gpio);

    echo json_encode($result);
    exit();
}

//For Ajax: query and return the states of all gpios
if (isset($_GET['gpiostateall'])) {
    $result = array();

    for ($i = 0; $i <= 28; $i++) {
        $result[$i] = getGPIOState($i);
    }

    echo json_encode($result);
    exit();
}

function getGPIOState($gpio)
{
    //Query and return the current state of a GPIO with Wiring Pi commands
    return exec("gpio -g read " . $gpio);
}

function setGPIOState($gpio, $state)
{
    //Execute the wiring pi command to put the gpio in output mode.
    exec("gpio -g mode " . $gpio . " out");
    //Execute the wiring pi command to set the gpio to the correct state
    exec("gpio -g write " . $gpio . " " . $state);
    //For security reasons, the status of the gpio is queried again and returned.
    return getGPIOState($gpio);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="TK">
    <meta name="viewport" content="width=device-width, initial-scale=0.55, user-scalable=yes">

    <link rel="stylesheet" href="gpio-control-style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&display=swap">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>RP GPIO Control</title>
</head>

<body>
    <!-- Nav Bar -->
    <nav>
        <p>Raspberry Pi GPIO Control</p>
        <ul class="nav-links">
            <li><a class="nav margin-big" href="#gpiocontrol">GPIO</a></li>
            <li><a class="nav margin-big" href="#settings">Settings</a></li>
            <li><a class="nav margin-big" href="#about">About</a></li>
        </ul>
    </nav>

    <div class="flex margin-big">
        <!-- GPIO Control -->
        <!-- card view sytle -->
        <div id="gpiocontrol" class="card-view padding-big margin-med">
            <h2>GPIO Control</h2>
            <div class="grid">
                <div class="card-view-item disabled">
                    <div class="grid-2-left">
                        <button class="tkd-button pins disabled">3V3 power</button>
                        <p class="p-pins disabled">1</p>
                    </div>
                </div>
                <div class="card-view-item disabled">
                    <div class="grid-2-right">
                        <p class="p-pins disabled">2</p>
                        <button class="tkd-button pins disabled">5V power</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b2" class="tkd-button pins a-style-1" onclick="gpio(2)">GPIO 2 (SDA)</button>
                        <p id="p2" class="p-pins">3</p>

                    </div>
                </div>
                <div class="card-view-item disabled">
                    <div class="grid-2-right">
                        <p class="p-pins disabled">4</p>
                        <button class="tkd-button pins disabled">5V power</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b3" class="tkd-button pins a-style-1" onclick="gpio(3)">GPIO 3 (SCL)</button>
                        <p id="p3" class="p-pins">5</p>
                    </div>
                </div>
                <div class="card-view-item disabled">
                    <div class="grid-2-right">
                        <p class="p-pins disabled">6</p>
                        <button class="tkd-button pins disabled">Ground</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b4" class="tkd-button pins a-style-1" onclick="gpio(4)">GPIO 4 (GPCLK0)</button>
                        <p id="p4" class="p-pins">7</p>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-right">
                        <p id="p14" class="p-pins">8</p>
                        <button id="b14" class="tkd-button pins a-style-1" onclick="gpio(14)">GPIO 14 (TXD)</button>
                    </div>
                </div>
                <div class="card-view-item disabled">
                    <div class="grid-2-left">
                        <button class="tkd-button pins disabled">Ground</button>
                        <p class="p-pins disabled">9</p>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-right">
                        <p id="p15" class="p-pins">10</p>
                        <button id="b15" class="tkd-button pins a-style-1" onclick="gpio(15)">GPIO 15 (RXD)</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b17" class="tkd-button pins a-style-1" onclick="gpio(17)">GPIO 17</button>
                        <p id="p17" class="p-pins">11</p>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-right">
                        <p id="p18" class="p-pins">12</p>
                        <button id="b18" class="tkd-button pins a-style-1" onclick="gpio(18)">GPIO 18 (PCM_CLK)</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b27" class="tkd-button pins a-style-1" onclick="gpio(27)">GPIO 27</button>
                        <p id="p27" class="p-pins">13</p>
                    </div>
                </div>
                <div class="card-view-item disabled">
                    <div class="grid-2-right">
                        <p class="p-pins disabled">14</p>
                        <button class="tkd-button pins disabled">Ground</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b22" class="tkd-button pins a-style-1" onclick="gpio(22)">GPIO 22</button>
                        <p id="p22" class="p-pins">15</p>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-right">
                        <p id="p23" class="p-pins">16</p>
                        <button id="b23" class="tkd-button pins a-style-1" onclick="gpio(23)">GPIO 23</button>
                    </div>
                </div>
                <div class="card-view-item disabled">
                    <div class="grid-2-left">
                        <button class="tkd-button pins disabled">3V3 power</button>
                        <p class="p-pins disabled">17</p>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-right">
                        <p id="p24" class="p-pins">18</p>
                        <button id="b24" class="tkd-button pins a-style-1" onclick="gpio(24)">GPIO 24</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b10" class="tkd-button pins a-style-1" onclick="gpio(10)">GPIO 10 (MOSI)</button>
                        <p id="p10" class="p-pins">19</p>
                    </div>
                </div>
                <div class="card-view-item disabled">
                    <div class="grid-2-right">
                        <p class="p-pins disabled">20</p>
                        <button class="tkd-button pins disabled">Ground</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b9" class="tkd-button pins a-style-1" onclick="gpio(9)">GPIO 9 (MISO)</button>
                        <p id="p9" class="p-pins">21</p>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-right">
                        <p id="p25" class="p-pins">22</p>
                        <button id="b25" class="tkd-button pins a-style-1" onclick="gpio(25)">GPIO 25</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b11" class="tkd-button pins a-style-1" onclick="gpio(11)">GPIO 11 (SCLK)</button>
                        <p id="p11" class="p-pins">23</p>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-right">
                        <p id="p8" class="p-pins">24</p>
                        <button id="b8" class="tkd-button pins a-style-1" onclick="gpio(8)">GPIO 8 (CE0)</button>
                    </div>
                </div>
                <div class="card-view-item disabled">
                    <div class="grid-2-left">
                        <button class="tkd-button pins disabled">Ground</button>
                        <p class="p-pins disabled">25</p>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-right">
                        <p id="p7" class="p-pins">26</p>
                        <button id="b7" class="tkd-button pins a-style-1" onclick="gpio(7)">GPIO 7 (CE1)</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b0" class="tkd-button pins a-style-1" onclick="gpio(0)">GPIO 0 (ID_SD)</button>
                        <p id="p0" class="p-pins">27</p>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-right">
                        <p id="p1" class="p-pins">28</p>
                        <button id="b1" class="tkd-button pins a-style-1" onclick="gpio(1)">GPIO 1 (ID_SD)</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b5" class="tkd-button pins a-style-1" onclick="gpio(5)">GPIO 5</button>
                        <p id="p5" class="p-pins">29</p>
                    </div>
                </div>
                <div class="card-view-item disabled">
                    <div class="grid-2-right">
                        <p class="p-pins disabled">30</p>
                        <button class="tkd-button pins disabled">Ground</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b6" class="tkd-button pins a-style-1" onclick="gpio(6)">GPIO 6</button>
                        <p id="p6" class="p-pins">31</p>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-right">
                        <p id="p12" class="p-pins">32</p>
                        <button id="b12" class="tkd-button pins a-style-1" onclick="gpio(12)">GPIO 12 (PWM0)</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b13" class="tkd-button pins a-style-1" onclick="gpio(13)">GPIO 13 (PWM1)</button>
                        <p id="p13" class="p-pins">33</p>
                    </div>
                </div>
                <div class="card-view-item disabled">
                    <div class="grid-2-right">
                        <p class="p-pins disabled">34</p>
                        <button class="tkd-button pins disabled">Ground</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b19" class="tkd-button pins a-style-1" onclick="gpio(19)">GPIO 19 (PCM_FS)</button>
                        <p id="p19" class="p-pins">35</p>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-right">
                        <p id="p16" class="p-pins">36</p>
                        <button id="b16" class="tkd-button pins a-style-1" onclick="gpio(16)">GPIO 16</button>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-left">
                        <button id="b26" class="tkd-button pins a-style-1" onclick="gpio(26)">GPIO 26</button>
                        <p id="p26" class="p-pins">37</p>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-right">
                        <p id="p20" class="p-pins">38</p>
                        <button id="b20" class="tkd-button pins a-style-1" onclick="gpio(20)">GPIO 20 (PCM_DIN)</button>
                    </div>
                </div>
                <div class="card-view-item disabled">
                    <div class="grid-2-left">
                        <button class="tkd-button pins disabled">Ground</button>
                        <p class="p-pins disabled">39</p>
                    </div>
                </div>
                <div class="card-view-item">
                    <div class="grid-2-right">
                        <p id="p21" class="p-pins">40</p>
                        <button id="b21" class="tkd-button pins a-style-1" onclick="gpio(21)">GPIO 21 (PCM_DOUT)</button>
                    </div>
                </div>
            </div>
            <div class="card-view-item padding-small">
                <div class="flex">
                    <p class="small"><span class="green">green</span> = GPIO high</p>
                    <p class="small"><span class="accent">blue</span> = GPIO low</p>
                </div>
            </div>
            <div class="flex-center">
                <a class="p-card-view-item" href="https://www.raspberrypi.org/documentation/usage/gpio/README.md">GPIO pin numbering for these Raspberry Pi models</a>
            </div>
            <div class="flex-center">
                <button id="btRefresh" class="tkd-button square h-style-1 a-style-1 margin-med" onclick="refresh()">refresh</button>
            </div>
        </div>

        <!-- Settings -->
        <!-- card view sytle -->
        <div id="settings" class="card-view padding-big margin-med">
            <h2>Settings</h2>
            <div class="card-view-item padding-med margin-bottom">
                <div class="grid-settings">
                    <p class="small">Confermation Window</p>
                    <label class="switch item-b">
                        <input id="switchComfermationWindow" type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
            <div class="card-view-item padding-med margin-bottom">
                <div class="grid-settings">
                    <p class="small">Safety Mode</p>
                    <label class="switch item-b">
                        <input id="switchSecurityMode" type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
                <p class="light margin-med info">In this mode, each time the user changes a GPIO status, <br> the system checks if the displayed status is the real one.</p>
            </div>
            <div class="card-view-item padding-med margin-bottom">
                <div class="grid-settings">
                    <p class="small">Refresh after GPIO status change</p>
                    <label class="switch item-b">
                        <input id="switchAutoUpdateStates" type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
                <p class="light margin-med info">After a GPIO status change made by the user on this website, <br> the GPIO status display is updated. </p>
            </div>
            <div class="card-view-item padding-med margin-bottom">
                <div class="grid-settings">
                    <p class="small">Dark Mode</p>
                    <label class="switch item-b">
                        <input id="switchDarkMode" type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>

            <div class="card-view-item padding-med margin-bottom">
                <p class="small">Source of GPIO pin numbering:</p>
                <a class="p-card-view-item" href="https://www.raspberrypi.org/documentation/usage/gpio/README.md">https://www.raspberrypi.org/documentation/usage/gpio/README.md</a>
            </div>
            <div class="card-view-item padding-med">
                <p class="light">Host this page on a web server on the Raspberry Pi (e.g. Apache2) <br>
                    Install PHP on the Raspberry Pi and the web server must support PHP <br>
                    Install WiringPi on the Raspberry Pi <br>
                    use Raspberry Pi OS (Raspbian) <br>
                    JavaScript must be enabled on this website
                </p>
                <div class="flex-center">
                    <a class="margin-small" href="https://www.raspberrypi.org/documentation/remote-access/web-server/apache.md">instructions from raspberrypi.org</a>
                </div>
            </div>
        </div>
    </div>

    <p>without guarantee</p>
    <!-- About -->
    <div id="about" class="about">
        <h1 class="margin-bottom">About</h1>
        <p>For this project PHP, JavaScript, JQuery and Ajax were used. <br>
            PHP executes commands from Wiring pi in the console of the Raspberry Pi. <br>
            The console commands of Wiring pi can control the GPIOs.
        </p>
    </div>

    <!-- Footer -->
    <footer>
        <h1>by TK 2020</h1>
    </footer>

    <!-- JavaScript -->
    <script>
        var gpioStates = new Array(28);

        var isConfermation = false;
        var isSecurityMode = true;
        var isAutoUpdateStates = false;

        var btRefresh = document.getElementById("btRefresh");

        var switchComfermationWindow = document.getElementById("switchComfermationWindow");
        var switchSecurityMode = document.getElementById("switchSecurityMode");
        var switchAutoUpdateStates = document.getElementById("switchAutoUpdateStates");
        var switchDarkMode = document.getElementById("switchDarkMode");

        switchSecurityMode.checked = true;

        //Display and save all states of the GPIOs
        setAllGPIOStates();

        //Functions

        //Function for changing colors
        function setPinColor(gpio, state) {
            if (state == 0) {
                document.getElementById("p" + gpio).classList.remove("green");
                document.getElementById("b" + gpio).classList.add("h-green");
            }
            if (state == 1) {
                document.getElementById("p" + gpio).classList.add("green");
                document.getElementById("b" + gpio).classList.remove("h-green");
            }
        }

        //Function to query all states of all GPIOs
        function setAllGPIOStates() {
            $.ajax({
                type: "GET",
                dataType: "json",
                data: {
                    gpiostateall: ""
                },
                success: function(data) {
                    for (i = 0; i < 28; i++) {
                        gpioStates[i] = data[i];
                        setPinColor(i, data[i]);
                    }
                }
            });
        }

        //Fuction to update the displayed and saved GPIO state
        function updateGPIOState(gpio) {
            return $.ajax({
                type: "GET",
                dataType: "json",
                data: {
                    gpiostate: gpio
                },
                success: function(data) {
                    gpioStates[gpio] = data.state;
                    setPinColor(data.gpio, data.state);
                }
            });
        }

        //Function, which is called by the buttons to change the state of a GPIO
        function gpio(gpio) {
            //Safety mode
            if (isSecurityMode) {
                var stateBefore = gpioStates[gpio];
                //wait until the ajax request is finished
                $.when(updateGPIOState(gpio)).done(function(data) {
                    if (stateBefore != data.state) {
                        alert("The GPIO was already in status: " + data.state)
                    } else {
                        changeGPIO(gpio);
                    }
                });
            } else changeGPIO(gpio);
        }

        //Function to change the status of a GPIO
        function changeGPIO(gpio) {
            //Confirmation window
            if (isConfermation) {
                if (!confirm("changing the state of the GPIO " + gpio))
                    return;
            }

            var state;
            if (gpioStates[gpio] == 0)
                state = 1;
            else state = 0;

            $.ajax({
                type: "GET",
                dataType: "json",
                data: {
                    gpio: gpio,
                    state: state
                },
                success: function(data) {
                    gpioStates[data.gpio] = data.state;
                    setPinColor(data.gpio, data.state);
                },
                error: function(data) {
                    alert("Error when the GPIO state was changed.");
                }
            });
            //Refresh after GPIO status change
            if (isAutoUpdateStates)
                setAllGPIOStates();
        }

        //Function for the Refresh Button
        function refresh() {
            btRefresh.innerHTML = "refreshing";
            setAllGPIOStates();
            btRefresh.innerHTML = "Refreshed";
            setTimeout(function() {
                btRefresh.innerHTML = "refresh";
            }, 1000);
        }

        //Listeners 

        switchComfermationWindow.addEventListener('change', () => {
            if (switchComfermationWindow.checked)
                isConfermation = true;
            else isConfermation = false;
        });

        switchSecurityMode.addEventListener('change', () => {
            if (switchSecurityMode.checked)
                isSecurityMode = true;
            else isSecurityMode = false;
        });

        switchAutoUpdateStates.addEventListener('change', () => {
            if (switchAutoUpdateStates.checked)
                isAutoUpdateStates = true;
            else isAutoUpdateStates = false;
        });

        switchDarkMode.addEventListener('change', () => {
            if (switchDarkMode.checked)
                document.documentElement.setAttribute('data-theme', 'dark');
            else document.documentElement.setAttribute('data-theme', 'light');
        });
    </script>
</body>

</html>