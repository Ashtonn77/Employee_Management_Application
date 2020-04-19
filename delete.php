<?php
require_once('include/DB.php');

$searchQueryParameter = $_GET["id"];

if(isset($_POST['submit'])){
   
            $eName = $_POST['eName'];
            $ssn = $_POST['ssn'];
            $dept = $_POST['dept'];
            $salary = $_POST['salary'];
            $homeAddress = $_POST['homeAddress'];

            global $connectingDB;
            $sql = "DELETE FROM emp_record WHERE id='$searchQueryParameter'";
            $stmt = $connectingDB->query($sql);
            
            $execute = $stmt->execute();
            if($execute){
                echo "<script>window.open('view.php?id=Record deleted successfully','_self')</script>";
            }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
</head>
<link rel="stylesheet" href="include/style.css">
<body>

<?php
global $connectingDB;
$sql = "SELECT * FROM emp_record WHERE id='$searchQueryParameter'";
$stmt = $connectingDB->query($sql);

while($dataRows = $stmt->fetch()){
    $id = $dataRows["id"];
    $eName = $dataRows["ename"];
    $ssn = $dataRows["ssn"];
    $dept = $dataRows["dept"];
    $salary = $dataRows["salary"];
    $homeAddress = $dataRows["homeaddress"];
}
?>

<div class="">
    <!--add validation for each input field-->
<form action="delete.php?id=<?= $searchQueryParameter?>" method="post" class="">
<fieldset>

<span class="fieldInfo">Employee Name:</span><br>
<input type="text" name="eName" value="<?= $eName?>"><br>

<span class="fieldInfo">Social Security Number:</span><br>
<input type="text" name="ssn" value="<?= $ssn?>"><br>

<span class="fieldInfo">Department:</span><br>
<input type="text" name="dept" value="<?= $dept?>"><br>

<span class="fieldInfo">Salary:</span><br>
<input type="text" name="salary" value="<?= $salary?>"><br>

<span class="fieldInfo">Home Address:</span><br>
<textarea name="homeAddress" id="" cols="80" rows="8" ><?= $homeAddress?></textarea><br>

<input type="submit" name="submit" class="submitBtn" value="Delete Record">

</fieldset>

</form>

</div>
    
</body>
</html>