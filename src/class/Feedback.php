<?php
	namespace Classes;
	use DB\Sql;
	class Feedback
	{
		private $id;
		private $date_time;
		private $emotion;
		private $comments;
		private $user_type;
		private $token_app;
		private $token_user;
		private $sql;
		private static $db = 'dout_feedback';

		function __construct()
		{
			$this->sql = new Sql(self::$db);
		}

		public function getId()
	    {
	        return $this->id;
	    }

	    public function setId($id)
	    {
	        $this->id = $id;

	        return $this;
	    }

	    public function getDateTime()
	    {
	        return $this->date_time;
	    }

	    public function setDateTime($date_time)
	    {
	        $this->date_time = $date_time;

	        return $this;
	    }

	    public function getEmotion()
	    {
	        return $this->emotion;
	    }

	    public function setEmotion($emotion)
	    {
	        $this->emotion = $emotion;

	        return $this;
	    }

	    public function getComments()
	    {
	        return $this->comments;
	    }

	    public function setComments($comments)
	    {
	        $this->comments = $comments;

	        return $this;
	    }

	    public function getUserType()
	    {
	        return $this->user_type;
	    }

	    public function setUserType($user_type)
	    {
	        $this->user_type = $user_type;

	        return $this;
	    }

	    public function getTokenApp()
	    {
	        return $this->token_app;
	    }

	    public function setTokenApp($token_app)
	    {
	        $this->token_app = $token_app;

	        return $this;
	    }

	    public function getTokenUser()
	    {
	        return $this->token_user;
	    }

	    public function setTokenUser($token_user)
	    {
	        $this->token_user = $token_user;

	        return $this;
	    }

	    public function getSql()
	    {
	        return $this->sql;
	    }

	    public function setSql($sql)
	    {
	        $this->sql = $sql;

	        return $this;
	    }

	    public function getArraySerialize(){
	    	return array(
	    		'id'=>$this->getId(),
	    		'dateTime'=>$this->getDateTime(),
	    		'emotion'=>$this->getEmotion(),
	    		'comments'=>$this->getComments(),
	    		'userType'=>$this->getUserType(),
	    		'tokenApp'=>$this->getTokenApp(),
	    		'tokenUser'=>$this->getTokenUser()
	    	);
	    }

	    public function setArraySerialize($objectService){
	    	foreach ($objectService as $key => $value) {
				switch ($key) {
					case 'id':
						$this->setId($value);
						break;
					case 'dateTime':
						$this->setDateTime($value);
						break;
					case 'emotion':
						$this->setEmotion($value);
						break;
					case 'comments':
						$this->setComments($value);
						break;
					case 'userType':
						$value = $value=='true'?1:0;
						$this->setUserType($value);
						break;
					case 'tokenApp':
						$this->setTokenApp($value);
						break;
					case 'tokenUser':
						$this->setTokenUser($value);
						break;
					default:
						break;
				}
			}
	    }

	    public function setClassByPrimayKey(){
	    	$result = $this->execQuerySelect("SELECT `id`, `date_time` AS dateTime, `emotion`, `comments`, `user_type` AS userType, `token_app` AS tokenApp, `token_user` AS tokenUser FROM `feedback` WHERE id = ".$this->getId()." LIMIT 1");
	    	$this->setArraySerialize($result[0]);
	    	return $this;
	    }

	    public function setClassBySecundaryKey(){
	    	$result = $this->execQuerySelect("SELECT `id`, `date_time` AS dateTime, `emotion`, `comments`, `user_type` AS userType, `token_app` AS tokenApp, `token_user` AS tokenUser FROM `feedback` WHERE token_app = '".$this->getTokenApp()."' AND token_user = '".$this->getTokenUser()."' ORDER BY date_time desc  LIMIT 1");
	    	$this->setArraySerialize($result[0]);
	    	return $this;
	    }

	    public function insertIntoTable($sql = null){
			if(!empty($sql))
    			$this->setSql($sql);
    	
			$queryInsert = $this->queryInsertTable();
			return $this->sql->insertSQL($queryInsert);
		}

	    private function queryInsertTable(){
			return "INSERT INTO `feedback`(`emotion`, `comments`, `user_type`, `token_app`, `token_user`) VALUES ('".$this->getEmotion()."','".$this->getComments()."','".$this->getUserType()."','".$this->getTokenApp()."','".$this->getTokenUser()."')";
		}

		private function execQuerySelect($query){
        	return $this->sql->selectSql($query);
	    }

	    public function getQuery() {
	    	return $this->queryInsertTable();
	    }

		function __destruct()
		{
			$this->sql = null;
		}
	}
?>