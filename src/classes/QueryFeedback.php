<?php
	namespace Classes;
	use DB\Sql;
	class QueryFeedback
	{
		private $allFeedback;
		private $feedbackSad;
		private $feedbackSurprised;
		private $feedbackNormal;
		private $feedbackHappy;
		private $sql;
		private static $db = 'feedback';


		function __construct()
		{
			$this->sql = new Sql(self::$db);
		}


		public function getAllFeedback()
	    {
	        return $this->allFeedback;
	    }

	    public function setAllFeedback($allFeedback)
	    {
	        $this->allFeedback = $allFeedback;

	        return $this;
	    }

	    public function getFeedbackSad()
	    {
	        return $this->feedbackSad;
	    }

	    public function setFeedbackSad($feedbackSad)
	    {
	        $this->feedbackSad = $feedbackSad;

	        return $this;
	    }

	    public function getFeedbackSurprised()
	    {
	        return $this->feedbackSurprised;
	    }

	    public function setFeedbackSurprised($feedbackSurprised)
	    {
	        $this->feedbackSurprised = $feedbackSurprised;

	        return $this;
	    }

	    public function getFeedbackNormal()
	    {
	        return $this->feedbackNormal;
	    }

	    public function setFeedbackNormal($feedbackNormal)
	    {
	        $this->feedbackNormal = $feedbackNormal;

	        return $this;
	    }

	    public function getFeedbackHappy()
	    {
	        return $this->feedbackHappy;
	    }

	    public function setFeedbackHappy($feedbackHappy)
	    {
	        $this->feedbackHappy = $feedbackHappy;

	        return $this;
	    }

	    public function getArraySerialize(){
	    	return array(
	    		'allFeedback'=>$this->getAllFeedback(),
	    		'feedbackSad'=>$this->getFeedbackSad(),
	    		'feedbackSurprised'=>$this->getFeedbackSurprised(),
	    		'feedbackNormal'=>$this->getFeedbackNormal(),
	    		'feedbackHappy'=>$this->getFeedbackHappy()
	    	);
	    }

	    public function setClass() {

	    	for ($i = 0; $i < 5; $i++)
	    		$this->setClassAttr($i);

	    	return $this;

	    }

	    public function setClassAttr($value){
	    	switch ($value) {
	    		case '0':
	    			$this->setAllFeedback($this->execQuerySelect("SELECT * FROM feedback WHERE YEAR(date_time) = YEAR(CURRENT_DATE()) AND MONTH(date_time) = MONTH(CURRENT_DATE()) ORDER BY date_time desc;"));
	    			break;
	    		case '1':
	    			$this->setFeedbackSad($this->execQuerySelect("SELECT * FROM feedback WHERE YEAR(date_time) = YEAR(CURRENT_DATE()) AND MONTH(date_time) = MONTH(CURRENT_DATE()) AND emotion like 'sad' ORDER BY date_time desc;"));
	    			break;
	    		case '2':
	    			$this->setFeedbackSurprised($this->execQuerySelect("SELECT * FROM feedback WHERE YEAR(date_time) = YEAR(CURRENT_DATE()) AND MONTH(date_time) = MONTH(CURRENT_DATE()) AND emotion like 'normal' ORDER BY date_time desc;"));
	    			break;
	    		case '3':
	    			$this->setFeedbackNormal($this->execQuerySelect("SELECT * FROM feedback WHERE YEAR(date_time) = YEAR(CURRENT_DATE()) AND MONTH(date_time) = MONTH(CURRENT_DATE()) AND emotion like 'surprise' ORDER BY date_time desc;"));
	    			break;
	    		case '4':
	    			$this->setFeedbackHappy($this->execQuerySelect("SELECT * FROM feedback WHERE YEAR(date_time) = YEAR(CURRENT_DATE()) AND MONTH(date_time) = MONTH(CURRENT_DATE()) AND emotion like 'happy' ORDER BY date_time desc;"));
	    			break;
	    		default:
	    			# code...
	    			break;
	    	}
	    	return $this;
	    }

	    public function getClassAttr($value){

	    	switch ($value) {
	    		case '0':
	    			return $this->getAllFeedback();
	    			break;
	    		case '1':
	    			return $this->getFeedbackSad();
	    			break;
	    		case '2':
	    			return $this->getFeedbackSurprised();
	    			break;
	    		case '3':
	    			return $this->getFeedbackNormal();
	    			break;
	    		case '4':
	    			return $this->getFeedbackHappy();
	    			break;
	    		default:
	    			return null;
	    	}
	    }




	    public function setAllFeedbackGroupByEmotion (){
	    	$this->setAllFeedback($this->execQuerySelect("SELECT emotionToString(f.emotion) AS emotion,  COUNT(1) as num, emotionBackgroundColor(f.emotion) AS backgroundColor, emotionColor(f.emotion) AS color FROM feedback f GROUP BY emotion"));
	    	return $this;
	    	
	    }

		private function execQuerySelect($query){
        	return $this->sql->selectSql($query);
	    }

		function __destruct()
		{
			$this->sql = null;
		}
	}
?>