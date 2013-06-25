<?php
if(empty($_POST['postpaid']))
    {
       echo "postpaid is empty!";
        return false;
    }

$con=mysqli_connect("localhost","root","","my_db");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$p1=$_POST['postpaid'];
echo "Post:$p1"; 
echo "<br>";
$p2=$_POST['upgrade'];
echo "UPG:$p2";
echo "<br>";
$p3=$_POST['M4G'];
echo "M4G:$p3";
echo "<br>";
$avg=($p1+$p2+$p3)/3;
echo "AVG:$avg";
echo "<br>";
$output=$avg*0.7;
echo "OUTPUT:$output";
echo "<br>";
 
$sql="INSERT INTO Perf (postpaid, upgrade, M4G,avg,output)
VALUES
('$p1','$p2','$p3','$avg','$output')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo " Record Added<br>";

$sql1="select avg from Perf ORDER BY avg DESC LIMIT 5 ";
//echo "$sql1";

$result = mysqli_query($con,"$sql1");

while($row = mysqli_fetch_array($result))
  {
  echo $row['avg'];
  echo "<br>";
  }
  

$sql2="select avg from Perf ORDER BY avg  ";
//echo "$sql1";

$result2 = mysqli_query($con,"$sql2");

while($rows = mysqli_fetch_array($result2))
  {
  echo $rows['avg'];
  echo "<br>";
  }  
  
mysqli_close($con);

?>
