<?php 
include("ac-header.php"); 
include("instructions.php");
?>

<h1 align="center">The Assignment Calculator</h1>
<form action="date.php">
<table align="center" border="0">
<tr>
<td align="center" colspan="2">
<?php
// Added Jan 2012 to display an error if not everything is filled in
if (isset($_GET['err']) && $_GET['err'] == 1) {
	print "<em> Please enter all dates </em>";
}
?>
</td>
</tr>
<tr>
<td align="right"><h4>Date you will begin the assignment:</h4></td>
<td valign="top">

<?php pres_date("one", date("j"), date("n"), date("Y")); ?>

</td>
</tr>
<tr><td align="right"><h4>Date the assignment is due:</h4></td>
<td valign=top>

<?php pres_date("two", "", "", date("Y")); ?>

</td></tr></table>

<center><input type="submit" value="Calculate Assignment Schedule!"></center>
</form>

<?php include("ac-footer.php"); ?>
















