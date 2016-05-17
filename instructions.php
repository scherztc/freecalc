<?php
/**********************************************************
 Copyright (C) The Regents of the University of Minnesota

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 version 2 as published by the Free Software Foundation.
   
 This program is distributed in the hope that it will be useful,  
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License in COPYRIGHT for more details.



File: instructions.php
Original Author: John Hickey (a former student worker)
Modified:  Shane Nackerud snackeru@tc.umn.edu
Last Modified: 09.Jan.2012 Michael Berkowski <mjb@umn.edu>
***********************************************************
Comments:
This is the main file of steps for the Assignment Calculator.
The steps are located in a big array called $instructions[].
The decimal point in the array describes the amount of time 
each step should take.  Make sure that your numbers equal 1
(one), or in other words make sure it equals 100% of the time.

The file also contains various functions necessary for the AC.

Jan 2012: MJB Changed this from numerically indexed sub-arrays
to a proper associative array 
**********************************************************/


//main array.  Each element has three parts.  A decimal that 
//represents fraction of total time, a description, and an 
//array of tips

$instructions = array(

//Step 1
array(
  "time" => .03,
  "title" => "Understand your assignment",
  "items" => array(
    "<a href='http://www.unc.edu/depts/wcweb/handouts/readassign.html'>Suggestions for understanding assignment sheets</a>"
  ),
  "due" => NULL
),

//Step 2 
array(
  "time" => .04,
  "title" => "Select and focus topic",
  "items" => array(
    "<a href='http://owl.english.purdue.edu/workshops/hypertext/researchW/topic.html'>Refine your topic</a>",
    "<a href='http://www.owc.umn.edu/Handouts/HowtoBegin.cfm'>How to begin</a>"
  ),
  "due" => NULL
),

//Step 3
array(
  "time" => .01,
  "title" => "Write working thesis",
  "items" => array(
    "<a href='http://owl.english.purdue.edu/workshops/hypertext/ResearchW/thesis.html'>Definition: Thesis Statements and Research Questions</a>",
    "<a href='http://www.gmu.edu/departments/writingcenter/handouts/g_b_thes.html'>Sample thesis statements</a>"
  ),
  "due" => NULL
),

//Step 4
array(
  "time" => .03,
  "title" => "Design research strategy",
  "items" => array(
   "<a href='http://tutorial.lib.umn.edu/infomachine.asp?moduleID=13'>QuickStudy: Designing a research strategy</a>",
 	"<a href='http://infopoint.lib.umn.edu/'>AskUs at the Libraries can also help</a>"
  ),
  "due" => NULL
),

//Step 5
array(
  "time" => .10,
  "title" => "Find, review, and evaluate books",
  "items" => array(
    "Keep careful notes, with source clearly indicated",
    "<a href='http://www.lib.umn.edu/books/'>Search the library's catalog</a>",
    "<a href='http://tutorial.lib.umn.edu/infomachine.asp?moduleID=5'>QuickStudy: Finding Books</a>"
  ),
  "due" => NULL
),

//Step 6
array(
  "time" => .25,
  "title" => "Find, review, and evaluate journal/magazine/newspaper articles",
  "items" => array(
    "Keep careful notes, with source clearly indicated",
    "<a href='http://tutorial.lib.umn.edu/infomachine.asp?moduleID=6'>QuickStudy: Finding Articles</a>",
    "<a href='http://research.lib.umn.edu/'>Research QuickStart</a>"
  ),
  "due" => NULL
),

//Step 7
array(
  "time" => .06,
  "title" => "Find, review, and evaluate web sites",
  "items" => array(
    "Do some general web searching - not Library-related",
    "Keep careful notes, with source clearly indicated",
    "<a href='http://tutorial.lib.umn.edu/infomachine.asp?moduleID=7'>QuickStudy: Finding web sites</a>",
    "<a href='http://research.lib.umn.edu/'>Research QuickStart</a>"
  ),
  "due" => NULL
),

//Step 8
array(
  "time" => .02,
  "title" => "Outline or describe overall structure",
  "items" => array(
    "<a href='http://www.owc.umn.edu/Handouts/HowtoBegin.cfm'>Starting a Writing Project</a>",
    "<a href='http://writing.colostate.edu/references/documents/argument/index.htm'>Help with planning your structure</a>"
  ),
  "due" => NULL
),

//Step 9
array(
  "time" => .10,
  "title" => "Write 1st draft",
  "items" => array(
    "<a href='http://www.owc.umn.edu/Handouts/YourFirstDraft.cfm'>Writing Your First Draft</a>",
    "<a href='http://www.owc.umn.edu/'>Online Writing Center at the U of M</a>",
    "<a href='http://swc.umn.edu/'>CLA Student Writing Center in Lind Hall</a>",
    "<a href='http://www.lrs.umn.edu/'>Reserve computer lab time on the Lab Reservation System</a>"
  ),
  "due" => NULL
),

//Step 10
array(
  "time" => .10,
  "title" => "Conduct additional research as necessary",
  "items" => array(
    "<a href='http://tutorial.lib.umn.edu/infomachine.asp?moduleID=9'>QuickStudy: Evaluating Sources</a>",
    "<a href='http://infopoint.lib.umn.edu/'>'Ask Us' at the University Libraries</a>"
  ),
  "due" => NULL
),

//Step 11
array(
  "time" => .20,
  "title" => "Revise & rewrite",
  "items" => array(
    "<a href='http://www.owc.umn.edu/Handouts/RevisingYourWork.cfm'>Revising Your Work</a>",
    "<a href='http://www.owc.umn.edu/'>Online Writing Center at the U of M</a> ",
    "<a href='http://swc.umn.edu/'>CLA Student Writing Center in Lind Hall</a>"
  ),
  "due" => NULL
),

//Step 12
array(
  "time" => .06,
  "title" => "Put paper in final form",
  "items" => array(
    "<a href='http://tutorial.lib.umn.edu/infomachine.asp?moduleID=10'>QuickStudy: Citing Sources</a>",
    "<a href='http://owl.english.purdue.edu/handouts/general/gl_proof.html'>Proofreading Strategies</a>",
    "<a href='http://www.bartleby.com/141/'>The Elements of Style - William Strunk, Jr.</a>",
    "<a href='http://owl.english.purdue.edu/handouts/general/gl_sentclar.html'>Strategies for Improving Sentence Clarity</a>"
  ),
  "due" => NULL
)
);


/**********************************************************
Function: days_between
Author: John Hickey
Last Modified: 2001
***********************************************************
Purpose:
Generates the number of days between two dates
**********************************************************/ 
function days_between($time1, $time2) {

	$time =  $time2 - $time1;
	return ($time/86400);

}


/**********************************************************
Function: out_of_time
Author: John Hickey
Last Modified: 2012 by Michael Berkowski
***********************************************************
Purpose:
Breaks up the steps into the times designated by the decimals
in the $instructions array

2012: Michael Berkowski made the due dates a component of the
$instructions array rather than a separate array
NOTE: $instructions_array is passed by reference now...
**********************************************************/ 
function out_of_time($time1, $time2, &$instructions_array, $bedTime, $ampm) {

	$time= abs($time1-$time2);
	//depending on the number of day and the number of divisons, we choose different date formats.

		// No idea what $div_array was for...
		if(days_between($time1, $time2)>sizeof($div_array)) {
		
			$format="D M d, Y";
			$stages = $time1; //keep the running total.

			foreach ($instructions_array as &$step) {
				$stages += ($time * $step['time']);	
				$step['due'] = date($format, $stages);
			}
		} else {	
	
		$format="g a D M d";

		$stages = $time1; //keep the running total.

			foreach ($instructions_array as &$step) {
				$stages += ($time * $step['time']);
				$hour24 = date("G", $stages);
				if ($hour24 > 12) $hour24 = $hour24-24; //this keeps the time centered around midnight. 2 is 2 am and -2 is 10pm
				if( ($ampm == 'am' && $hour24 > $bedTime && $hour24 < $bedTime + 10) or ($ampm == 'pm' && $hour24 > $bedTime-12 && $hour24 < $bedTime-2)){//if the time is later than a person wants to get to sleep
					$step['due'] = "$bedTime $ampm " . date("D M d", $stages);
				} else {
					$step['due'] = date($format, $stages);
				}
			}

		}
	return;
}

/**********************************************************
Function: pres_date
Author: John Hickey
Last Modified: 2012 by Michael Berkowski (fixed attribute quoting)
***********************************************************
Purpose:
Generates the form for Start Date and Due Date information
**********************************************************/ 
function pres_date($number = "", $myDay = "", $myMon = "", $myYear = "") {
	
	print "<input type= 'text' name='month$number' size='2' maxlength='2' value='$myMon'> - \n";
	print "<input type= 'text' name='day$number' size='2' maxlength='2' value='$myDay'> - \n";
	print "<input type= 'text' name='year$number' size='4' maxlength='4' value='$myYear'>\n";

}

?>
