<?php 
define('REGEX_NAME', "^[a-zA-Zïëüÿöçâéèñôáóøšşćĕłăčőřžåķņńžůãşœæę '\-]*$");//* quantifieur=autorise plusieurs fois 
define('REGEX_DATE', "^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})");
define('REGEX_PHONE', "^[0-9]{10}");// pas tirer ou slash ds celle ci
define ('REGEX_TIME',"^[0-9]{2}:[0-9]{2}");