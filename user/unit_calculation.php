<?php

$query=mysqli_query($conn,"SELECT SUM(unit_tersedia) AS a from kuarters_a");
$ret=mysqli_fetch_array($query);
$A_Total=$ret['a'];

$queryb=mysqli_query($conn,"SELECT SUM(unit_tersedia) As b from kuarters_b");
$retb=mysqli_fetch_array($queryb);
$B_Total=$retb['b'];




$query1=mysqli_query($conn,"SELECT SUM(unit_selenggara) As a2 from kuarters_a");
$ret1=mysqli_fetch_array($query1);
$A2_Total=$ret1['a2'];

$query2=mysqli_query($conn,"SELECT SUM(unit_selenggara) As b2 from kuarters_b");
$ret2b=mysqli_fetch_array($query2);
$B2_Total=$ret2b['b2'];



