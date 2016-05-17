<?php
/**********************************************************
File: date.php
Modified: Matthew Decker matthew@wayne.edu
Last Modified: 12.19.2005
***********************************************************
Comments:
Modified to allow register_globals to be turned off.
**********************************************************/


include("ac-header.php");
include("instructions.php");

// Redirect to index if dates are not all specified
$datevars = array('monthone','monthtwo','dayone','daytwo','yearone','yeartwo');
foreach ($datevars as $var) {
	if (empty($_GET[$var]) || !is_numeric($_GET[$var])) {
		header("Location: index.php?err=1");
		exit();
	}
}

$today = date("Ymd"); 

print "<h1>The Assignment Calculator</h1>\n";
print "<table width=100%><tr><td>";

//set up the times

$date1 = "{$_GET['monthone']}/{$_GET['dayone']}/{$_GET['yearone']}";
$date2 = "{$_GET['monthtwo']}/{$_GET['daytwo']}/{$_GET['yeartwo']}";

$time1 = strtotime($date1) + 43200;
$time2 = strtotime($date2);

print "<table border='0'>";

print "<tr><td><b>Starting on:</b></td><td valign='top'>$date1</td></tr>\n";
print "<tr><td><b>Ending on:</b></td><td valign='top'>$date2</td></tr></table>\n";

$days = days_between($time1, $time2);

print "<b>According to the dates you have entered, you have " . (int) $days . " days to finish.</b><p>\n";

// Hack to remove notices for undefined var
$bedTime = "";
$ampm = isset($_GET['ampm']) ? htmlentities($_GET['ampm'], ENT_QUOTES) : "";
print "<form action='ac-textonly.php'>\n";
print "<input type='hidden' name='ampm' value='$ampm'>\n";
print "<input type='hidden' name='monthone' value='{$_GET['monthone']}'>\n";
print "<input type='hidden' name='monthtwo' value='{$_GET['monthtwo']}'>\n";
print "<input type='hidden' name='yearone' value='{$_GET['yearone']}'>\n";
print "<input type='hidden' name='yeartwo' value='{$_GET['yeartwo']}'>\n";
print "<input type='hidden' name='dayone' value='{$_GET['dayone']}'>\n";
print "<input type='hidden' name='daytwo' value='{$_GET['daytwo']}'>\n";
print "<input type='hidden' name='monthtwo' value='{$_GET['monthtwo']}'>\n";
print "<input type='submit' value='Printer-friendly Version'>\n";
print "</form>";
print "</td><td>\n";

// out_of_time() no longer returns anything since the dates are added to $instructions
out_of_time($time1, $time2, $instructions, $bedTime, $ampm);
//$dates = out_of_time($time1, $time2, $instructions, $bedTime, $ampm);

print "</td><td width=50></td><td valign=middle align=right><P><table bgcolor='#D9CFAC'><tr><td>\n";
print "<b>Want to try a different date?</b>\n";
print "<form action='date.php'>\n";

print "<input type='hidden' name='ampm' VALUE='$ampm'>";
		
print "<table><tr><td>Start Date:</td><td>\n";

pres_date("one", date("j"), date("n"), date("Y"));

print "</td></tr><tr><td>Due Date:</td><td>\n";

pres_date("two", "", "", date("Y"));

print "</td></tr></table><P><input type='submit' value='Re-Calculate Schedule!'></form>";
print "</td></tr></table></td></tr></table>";
		
		
//Stuff to say on certain dates

if(days_between($time1, $time2)<0) {
	
	print "<b>Negative Number of Days:</b> Probably you entered the dates wrong...<br />\n";

} else if(days_between($time1, $time2)<1) {
	
	print "You have <b>less than one day</b> to get this done.  I hope you're just playing with this thing.<br />\n";
}

if(days_between($time1, $time2)>99) {
	
	print "It's never too early to start!<br />\n";
}

print "<p> <br><table cellpadding='4' width='100%'>";

$j = 1;
foreach ($instructions as $step) {

	print "<tr><td align=left width=120><h1>Step $j</h1></td><td bgcolor='#D9CFAC'>\n";

	//description
	print "<b>By {$step['due']}:</b> <i>\n";
	$datum = date("Ymd", strtotime($step['due']));
	print htmlspecialchars($step['title']) . " </i></td></tr><tr><td></td><td>\n";
	
	// Jan 2012 MJB made a real <ul> here instead of 
	// entity encoded bullets
	if (count($step['items'])) {
	print "<ul>\n";
		//what should be done
		foreach ($step['items'] as $item) {
			print "<li>" . $item . "</li>\n";
		}
	}
	print "</ul>";

	print "<br/>";
	print "</td></tr>\n";
	$j++;
}
print "</table>\n";
include("ac-footer.php");

?>











