# wp-articles

## Installation process
1. first ensure Acorn and installed
2. init Acorn with the command ```wp acorn acorn:init``` this will create the required config folder
3. install WP Articles package in your theme folder ```composer require jefffairson/wp-articles```
4. publish the config file ```wp acorn vendor:publish``` if the ```wparticles-config``` is not listed, ensure the package was dicovered with ```wp acorn package:discover```and launch the installation again
