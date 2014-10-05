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

$ipId      = $_GET['IpId'];


echo "<table>";
echo "<tr><td>Port Number </td><td>Port Type </td><td>State </td><td>Information </td></tr>";
$QueryIPandPortInfo = "Select * FROM nmapanalysistool.ipaddress, nmapanalysistool.port, nmapanalysistool.ip_port, nmapanalysistool.port_information where (ipaddress.id = " . $ipId . " and ip_port.IP_ID = ipaddress.id) and (port.id = ip_port.PortID and port_information.id = port.port_informationID)";
$GetIP_PortList = mysqli_query($con, $QueryIPandPortInfo);

while($row = mysqli_fetch_array($GetIP_PortList))
{   
    echo "<tr><td>" . $row['port_number']. "</td><td>". $row['port_type'] ."</td><td>". $row['state']. "</td><td>" . $row['portInfo']. "</td></tr>";
}


mysqli_close($con);

?>