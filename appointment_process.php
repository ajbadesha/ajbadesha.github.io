<?php

    $to = "nasir.rubel99@gmail.com"; // Replace the email id with yours one
    
	$from = $_REQUEST['email']; 
    $name = $_REQUEST['name'];

    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "You have a appointment request from your Plumber Master.";


	/*Mail Information to sent*/
	if ( $_REQUEST['service_for'] ) 
		$cservice_for = $_REQUEST['service_for']; // Service For

	if ( $_REQUEST['service_type'] ) 
		$cservice_type = $_REQUEST['service_type']; // Service Type

	if ( $_REQUEST['service_type'] == "Other" || !empty($_REQUEST['other_service_types'])) 
		$cother_service = $_REQUEST['other_service_types']; // Other Service Type

	if ( !empty($_REQUEST['brief_desc'])) 
		$cbrief_desc = $_REQUEST['brief_desc']; // Brief about Service

	if ( $_REQUEST['subscribed']) 
		$csubscribe = $_REQUEST['subscribed']; // Brief about Service

	// Date
	$ccon_month 	= $_REQUEST['convenient_month'];
	$ccon_day 		= $_REQUEST['convenient_day'];
	$ccon_year 		= $_REQUEST['convenient_year'];
	$ccon_time 		= $_REQUEST['convenient_time'];

	// --------------------------------- //

	if ( !empty($_REQUEST['jobsite_address01']) ) 
		$cjobsite_address1 = $_REQUEST['jobsite_address01']; // Address 01

	if ( !empty($_REQUEST['jobsite_address02']) ) 
		$cjobsite_address2 = $_REQUEST['jobsite_address02']; // Address 01

	if ( !empty($_REQUEST['jobsite_city']) ) 
		$cjobsite_city = $_REQUEST['jobsite_city']; // City

	if ( !empty($_REQUEST['jobsite_state']) ) 
		$cjobsite_state = $_REQUEST['jobsite_state']; // State

	if ( !empty($_REQUEST['jobsite_zip']) ) 
		$cjobsite_zip = $_REQUEST['jobsite_zip']; // Zip

	if ( !empty($_REQUEST['jobsite_phone']) ) 
		$cphone = $_REQUEST['jobsite_phone']; // Phone

	if ( !empty($_REQUEST['cell_phone']) ) 
		$ccellphone = $_REQUEST['cell_phone']; // Cell Phone

    $ccompany 		= $_REQUEST['company']; // Company

    $logo = 'http://nasiruddin.com/demo/plumbing-master/images/logo.png';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Plumber Master Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td>";
	$body .= "<a href='#'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody>";
	$body .= "<tr><td style='text-align:center;'><strong>CLIENT INFORMATIONS</strong></td></tr>";
	$body .= "<tr><td><strong>Name:</strong> {$name}</td></tr>";
	$body .= "<tr><td><strong>Email:</strong> {$from}</td></tr>";
	if ( $cjobsite_address1 ) $body .= "<tr><td><strong>Address Line1:</strong> {$cjobsite_address1}</td></tr>";
	if ( $cjobsite_address2 ) $body .= "<tr><td><strong>Address Line2:</strong> {$cjobsite_address2}</td></tr>";
	if ( $cjobsite_city ) $body .= "<tr><td><strong>City:</strong> {$cjobsite_city}</td></tr>";
	if ( $cjobsite_state ) $body .= "<tr><td><strong>State:</strong> {$cjobsite_state}</td></tr>";
	if ( $cjobsite_zip ) $body .= "<tr><td><strong>Zip:</strong> {$cjobsite_zip}</td></tr>";
	if ( $cphone ) $body .= "<tr><td><strong>Phone Number:</strong> {$cphone}</td></tr>";
	if ( $ccellphone ) $body .= "<tr><td><strong>Cell Phone:</strong> {$ccellphone}</td></tr>";
	if ( $ccompany ) $body .= "<tr><td><strong>Company:</strong> {$ccompany}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td style='text-align:center;'><strong>APPOINTMENT FOR</strong></td></tr>";
	$body .= "<tr><td><strong>Appoint Date:</strong> {$ccon_day} - {$ccon_month} - {$ccon_year} </td></tr>";
	$body .= "<tr><td><strong>Appoint Time:</strong> {$ccon_time} </td></tr>";
	if ( $cservice_for ) $body .= "<tr><td><strong>Service For:</strong> {$cservice_for}</td></tr>";
	if ( $cservice_type ) $body .= "<tr><td><strong>Service Type:</strong> {$cservice_type}</td></tr>";
	if ( $cother_service ) $body .= "<tr><td><strong>Other Service Type:</strong> {$cother_service}</td></tr>";
	if ( $cbrief_desc ) $body .= "<tr><td><strong>Service Brief:</strong> {$cbrief_desc}</td></tr>";
	if ( $csubscribe ) $body .= "<tr><td><strong>Subscribe:</strong> Yes</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);

?>