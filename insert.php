<?php
require_once('include/DB.php');
if(isset($_POST['submit'])){
    if(!empty($_POST['eName']) && !empty($_POST['ssn'])){
            $eName = $_POST['eName'];
            $ssn = $_POST['ssn'];
            $dept = $_POST['dept'];
            $salary = $_POST['salary'];
            $homeAddress = $_POST['homeAddress'];

            global $connectingDB;
            $sql = "INSERT INTO emp_record(ename,ssn,dept,salary,homeaddress) VALUES(:enamE,:ssN,:depT,:salarY,:homeaddresS)";//to prevent sql injection(if you look cloesly you'll notice the variables in VALUES are all dummy variables) ->very important
            $stmt = $connectingDB->prepare($sql);
            $stmt->bindValue(':enamE', $eName);
            $stmt->bindValue(':ssN', $ssn);
            $stmt->bindValue(':depT', $dept);
            $stmt->bindValue(':salarY', $salary);
            $stmt->bindValue(':homeaddresS', $homeAddress);

            $execute = $stmt->execute();
            if($execute){
                echo "<span class='success'>Data has been added successfully</span><br>";
            }else{
                echo "<span class='fieldHeadingInfo'>Something went wrong:(</span><br>"; //this 'else' should be romoved when error checking
            }            
    }
    else{
        echo "<span class='fieldHeadingInfo'>Name and Social Security Number is compulsory</span><br>";
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
    <!--add validation for each input field-->
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

<br><br>

<form action="view.php">
<input type="submit" name="viewBtn" value="View Employee Table" class="submitBtn">
</form>    

</div>
    
</body>
</html>