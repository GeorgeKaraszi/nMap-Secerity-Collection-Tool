<!DOCTYPE html>
<html>
<head>
<style>
table
{
border-collapse:collapse;
}
table, td, th
{
border:1px solid black;
}
</style>
</head>

<?php

/**
 * @author 
 * @copyright 2013
 */
    
$con=mysqli_connect("127.0.0.1","root","root","nmapanalysistool");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else
    echo "Connection good";

echo "<center>";
echo "<table>";
echo "<tr><td>IP Address</td><td>Numbers of Ports</td></tr>";
$GetIPAddressResult = mysqli_query($con, "SELECT * FROM nmapanalysistool.ipaddress");

while($row = mysqli_fetch_array($GetIPAddressResult))
{
    $PortsToIPResults = mysqli_query($con, "SELECT * FROM nmapanalysistool.ip_port where ip_port.IP_ID = " . $row['id']);
    $NumbOfRows = mysqli_num_rows($PortsToIPResults);
    
    echo "<tr><td><a href=queryByIP.php?IpId=" . $row['id'] .">" . $row['IpAddress'] . "</a></td><td>" .  $NumbOfRows . "</td></tr>";
}


mysqli_close($con);

?>