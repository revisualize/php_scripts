<?php
/* Code copyright 2003 Joseph A. Tracy http://www.revisualized.com 
You may not use this code without the expressed permission from
Joseph A. Tracy. 
Date: Thursday, July 03, 2003 */

/*
There isn't much to this script it is really simple.
I will try and explain it a little better.

There are 3 varialbes in this script that you need to set
$aim .. You set this when you do the include with the aim.php?aim=USER
-
$aim_on .. You need to point this variable to a file you make on your website
Make an online.txt open the txt and hit the 1 key. close the txt.
Rename the txt to online.gif
-
$aim_off .. You need to point this variable to a file you make on your website
Make an offline.txt open the txt and hit the 0 key. close the txt.
Rename the txt to offline.gif

Now this var you can leave alone:
$status = file("http://big.oscar.aol.com/$aim?on_url=$aim_on&off_url=$aim_off");
this variable points to the aol server that will check to see if
the USER is online or offline and seeings how the server only
recongizes the return value of image files and nothing else.
I know I have tried to send other file types to it.

The switch displays an echo based upon the value returned by the aol server
through the $status.
If you don't know how to use echo .. You need to learn php.

Here are some resources to help you..
http://www.php.net/manual/en/language.variables.php
http://www.php.net/manual/en/function.file.php
http://www.php.net/manual/en/control-structures.switch.php
http://www.php.net/manual/en/function.echo.php

*/
   
function aim_status($aim) {
$aim_on = "http://www.revisualized.com/aim_online.gif"; 
		/* now this gif isn't a gif at all it is a file with the value of "1" in it. making it 1byte in size */
$aim_off = "http://www.revisualized.com/aim_offline.gif"; 
		/* now this gif isn't a gif at all it is a file with the value of "0" in it. making it 1byte in size */
$status = file("http://big.oscar.aol.com/$aim?on_url=$aim_on&off_url=$aim_off");
$status = $status[0];

switch ($status) {
 case 0:
  echo "AIM: $aim [<font color=\"#990000\">offline</font>] [<a href=\"aim:addbuddy?screenname=$aim\">add to list</a>]";
  break;
 case 1:
  echo "AIM: <a href=\"aim:goim?screenname=$aim&message=hello\">$aim</a> [<font color=\"#009900\">online</font>] [<a href=\"aim:addbuddy?screenname=$aim\">add to list</a>]";
  break;
 default:
  echo "AIM: $aim [<font color=\"#336699\">unknown</font>] [<a href=\"aim:goim?screenname=$aim&message=hello\">msg</a>] [<a href=\"aim:addbuddy?screenname=$aim\">add to list</a>]";
}
}
$aim = $_GET['aim'];
echo aim_status($aim);
?>
