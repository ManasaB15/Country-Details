<?php

	$conn = mysqli_connect("localhost", "root", "", "country_details1");

	if (!$conn) {
  	 die("Connection failed: " . mysqli_connect_error());
	}
?>