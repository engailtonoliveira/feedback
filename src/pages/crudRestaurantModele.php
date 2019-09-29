<?php
	require_once '../vendor/autoload.php';
	
	use Classes\QueryFeedback;

	$operation = $_REQUEST['operation'];

	$queryFeedback = new QueryFeedback();
	$queryFeedback->setClassAttr($operation);
	$res = $queryFeedback->getClassAttr($operation);

	echo json_encode($res);
?>