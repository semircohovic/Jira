<?php
	define('USERNAME', 'testuser');
	define('PASSWORD', 'Test123');
	$ch = curl_init(); 
	curl_setopt_array($ch, array(
		CURLOPT_POST => 1,
		CURLOPT_URL => 'https://visoldev.ddns.net:8888/rest/api/2/issue/',
		CURLOPT_USERPWD => USERNAME . ':' . PASSWORD,
		CURLOPT_HTTPHEADER => array('Content-type: application/json'),
		CURLOPT_RETURNTRANSFER => true
	));
	
	$arr['project'] = array( 'key' => 'TEST');
	$arr['summary'] = 'Semir Čohović';
	$arr['description'] = 'semircohovic@gmail.com 068235191';
	$arr['priority'] = array('name' => 'Medium');
	$arr['assignee'] = array('name' => 'TestUser');
    $arr['duedate'] =  '2019-12-30';
	$arr['issuetype'] = array( 'name' => 'Task');

	$json_arr['fields'] = $arr;
	
	$json_string = json_encode ($json_arr);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$json_string);
	$result = curl_exec($ch);
	curl_close($ch);
	
	echo $result;
?>