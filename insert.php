<?php
require_once('include/DB.php');

if(isset($_POST['submit'])){
    if(!empty($_POST['eName']) && !empty($_POST['ssn'])){
            $eName = $_POST['eName'];
            $ssn = $_POST['ssn'];
            $dept = $_POST['dept'];
            $salary = $_POST['salary'];
            $homeAddress = $_POST['homeAddress'];

            $connectingDB;
            $sql = "INSERT INTO emp_record(employee_name,employee_ssn,employee_dept,employee_salary,employee_home_address)";
    }
    else{
        echo "<span class='fieldHeadingInfo'>Name and Social Security Number is compulsory</span>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert into Database</title>
</head>
<link rel="stylesheet" href="include/style.css">
<body>

<div class="">
<form action="insert.php" method="post" class="">
<fieldset>

<span class="fieldInfo">Employee Name:</span><br>
<input type="text" name="eName"><br>

<span class="fieldInfo">Social Security Number:</span><br>
<input type="text" name="ssn"><br>

<span class="fieldInfo">Department:</span><br>
<input type="text" name="dept"><br>

<span class="fieldInfo">Salary:</span><br>
<input type="text" name="salary"><br>

<span class="fieldInfo">Home Address:</span><br>
<textarea name="homeAddress" id="" cols="80" rows="8"></textarea><br>

<input type="submit" name="submit" class="submitBtn" value="Submit your Record">

</fieldset>

</form>

</div>
    
</body>
</html>