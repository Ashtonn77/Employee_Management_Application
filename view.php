<?php
require_once('include/DB.php');

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

<h2 class="success"><?= @$_GET['id']?></h2>


<div class="">
    <fieldset>
        <form action="view.php" class="" method="get">
            <input type="text" name="search" id="" placeholder="Search by name or ssn"><br><br>
            <input type="submit" class="submitBtn" name="searchBtn" value="Search Database">
        </form>
    </fieldset>
</div><br>

<div>
<form action="insert.php">
<input type="submit" name="insertBtn" value="Insert record into Database" class="submitBtn">
</form>
</div>


<?php
if(isset($_GET['searchBtn'])){

global $connectingDB;
$search = $_GET['search'];
$sql = "SELECT * FROM emp_record WHERE ename=:searcH OR ssn=:searcH";
$stmt = $connectingDB->prepare($sql);
$stmt->bindValue(':searcH', $search);
$stmt->execute();

while($dataRows = $stmt->fetch()){
    $id          = $dataRows['id'];
    $eName       = $dataRows['ename'];
    $ssn         = $dataRows['ssn'];
    $dept        = $dataRows['dept'];
    $salary      = $dataRows['salary'];
    $homeAddress = $dataRows['homeaddress'];
    ?>

    <table width="1000" align="center" border="5">
        <caption>Search Results</caption>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>SSN</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Home Address</th>
            <th>Search Again</th>
        </tr>

        <tr>
            <td><?= $id?></td>
            <td><?= $eName?></td>
            <td><?= $ssn?></td>
            <td><?= $dept?></td>
            <td><?= $salary?></td>
            <td><?= $homeAddress?></td>
            <td align="center"><a href="view.php">Search Again</a></td>
        </tr>

    </table><br><br>
    

<?php  }//end while loop 

}//end submit if

?>

<table width="1000" border="5" align="center">
<caption>View Employee Table</caption>

<tr>
<th>ID</th>
<th>Name</th>
<th>SSN</th>
<th>Department</th>
<th>Salary</th>
<th>Home Address</th>
<th>Update</th>
<th>Delete</th>
</tr>

<?php
global $connectingDB;
$sql = "SELECT * FROM emp_record";
$stmt = $connectingDB->query($sql);

while($dataRows = $stmt->fetch()){
    $id = $dataRows["id"];
    $eName = $dataRows["ename"];
    $ssn = $dataRows["ssn"];
    $dept = $dataRows["dept"];
    $salary = $dataRows["salary"];
    $homeAddress = $dataRows["homeaddress"];
?>
<tr>
    <td><?= $id?></td>
    <td><?= $eName?></td>
    <td><?= $ssn?></td>
    <td><?= $dept?></td>
    <td><?= $salary?></td>
    <td><?= $homeAddress?></td>
    <td><a href="update.php?id=<?= $id?>">Update</a></td>
    <td><a href="delete.php?id=<?= $id?>">Delete</a></td>
</tr>
<?php } ?>
</table>
</body>
</html>