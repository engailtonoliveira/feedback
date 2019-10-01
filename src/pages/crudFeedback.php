<?php
	require_once '../../vendor/autoload.php';
	use DB\Sql;
  	use Classes\Feedback;

	$operation = $_REQUEST['operation'];
	switch ($operation) {
		case 1:
			$res = insertAndUpdateFeedback();
			break;
		case 2:
			$res = alterStatusOnFeedback();
			break;
		case 3:
			$res = getDataOnClassFeedback();
			break;
		default:
			# code...
			break;
	}

	function insertAndUpdateFeedback(){
		$myObject = $_REQUEST['feedback'];
		$feedback= new Feedback();
		$feedback->setArraySerialize($myObject);
		if ($myObject['id'])
		{
			$check = $feedback->updateIntoTable();
			if ( $check == 1 )
				return array("response"=>true,"msg"=>"Your data has been updated");
			else
				return array("response"=>true,"msg"=>$itsSucessses);
		}else{
			$lastId = $feedback->insertIntoTable();
			unset($feedback);
			return $lastId ? array("response"=>true,"msg"=>"Your data has been Insert") : array("response"=>false,"msg"=>"Error, Contact the Manager");
		}
	}

	function alterStatusOnFeedback(){

		try {
			$sql = new Sql('dout_restaurant');
			$sql->transactionSql();

			$feedback = new Feedback();
			$feedback->setID($_REQUEST['id']);
			$feedback->setStatus(0);

			$query = "UPDATE `feedback` SET `status`='".$feedback->getStatus()."' WHERE  `id`= ".$feedback->getId()."";
			$sql->updateSql($query);
			$sql->commitSql();
			unset($feedback);
			return array("response"=>true,"msg"=>"Your data has been Update");
		} catch (Exception $e) {
			if(isset($sql)){
				$sql->roolbackSql();
				unset($feedback);
				return array("response"=>false,"msg"=>$e);
			}
		}
	}

	function getDataOnFeedback(){
		$feedback = new Feedback();
		$possible = $feedback->setClassById($_REQUEST['id']);
		$arrayFeedback = $feedback->getArraySerialize();
		unset($feedback);
		return $arrayFeedback ? array("response"=>true,"data"=>$arrayFeedback) : array("response"=>false,"msg"=>"Error, Na query");

	}

	echo json_encode($res);
?>