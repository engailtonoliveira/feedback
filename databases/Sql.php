<?php	
	namespace DB;
	use DB\ConexaoPDO;
	use \PDO;
	class Sql
	{
		private $con;
		private $stmt;
		/**
		*	@param $bd Database against which the queries are going to be executed.
		*
		*/
		function __construct($bd = 'dout_restaurant') //metodo construtor
		{
	        $this->con = new ConexaoPDO($bd);
		}

		/**
		*	@param $sql The SQL string that will be executed.
		*	@return array containing all of the data in the result set generated by the SELECT statement. false if the query couldn't be executed.
		*/
		public function selectSql($sql){
			$strm = $this->con->banco->prepare($sql);
			$cont = $strm->execute() or die ("Query invalida! : $strm. " . $strm->ErrorMsg() );
			//verifica o numero de linhas afectadas pela query
			if($strm->rowCount()>0){

				//obtenha a informacao do array do resisto actual e movimenta-se
				//para procima possicao ate retornar um EOF que corresponde a falso
				//while ($resultado = $strm->fetchAll(PDO::FETCH_ASSOC)) {
					//$resultados_totais = $resultado;
				//}
				//return $resultados_totais;
				return $strm->fetchAll(PDO::FETCH_ASSOC);
			}else
				return false;
		}

		/**
		*	@return true when executed with success, false otherwise, unless a critical error
		* happens. In a case of critical error the script just stops executing issuing an
		* error message.
		*/
		public function updateSql($sql){
			$strm = $this->con->banco->prepare($sql);

			try {
				$strm->execute();
				return 1;
			}catch(PDOException $e) {
				$e->getMessage();
			}
		}

		
		public function insertSql($sql){
			$strm = $this->con->banco->prepare($sql);

			try {
				$strm->execute();
				$last_id = $this->con->banco->lastInsertId();
				return $last_id;
			}catch(PDOException $e) {
				$e->getMessage();
			}
		}

		/**
		*	@return true when executed with success, false otherwise.
		*/
		public function deleteSql($sql){
			$strm = $this->con->banco->prepare($sql);

			try {
				$valor = $strm->execute();
				return $valor;
			}catch(PDOException $e) {
				$e->getMessage();
			}
		}

		/**
		 * Executes a call to a stored procedure, returning a single value from it when needed.
		 * If a second parameter is passed through then a value will be returned as long as it is
		 * the name of the out variable used in the stored procedure. In case no second parameter is
		 * passed through returns a boolean if the query execution finished successfuly or false
		 * otherwise.
		 * @param  string $sql    	Contains the sql statement to be execute as a stored procedure.
		 * @param  string $outValue The name of the variable returned as an out variable from the stored
		 * procedure. It must match the name of the out variable passed in the $sql statement.
		 * @return string | bool    The value of out variable from the stored procedure.
		 */
		public function storedProcedureSql($sql, $outValue = ""){
			$strm = $this->con->banco->prepare($sql);
			$cont = $strm->execute() or die ("Query invalida! : $strm. " . $strm->ErrorMsg() );

			if($outValue !== ""){
				$sql = "select ".$outValue." as status_oper";
				$strm = $this->con->banco->prepare($sql);
				$cont = $strm->execute();
				$myResultId = $strm->fetchColumn();
				return $myResultId;
			}
			else{
				return $cont;
			}
		}

		/**
		*	Prepares a sql statement to be executed
		*/
		public function prepareStatement($sql){
			$this->stmt = $this->con->banco->prepare($sql);
		}

		public function executePreparedStatement($values = array()){
			echo $values;
			//if(count($values) != 0){
			$this->stmt->execute($values) or die("Query invalida! : $strm. " . $strm->ErrorMsg());
			$myResultId = $this->stmt->fetchColumn();
			return $myResultId;
		}

		public function transactionSql(){
			$this->con->banco->beginTransaction();
		}

		public function roolbackSql(){
			$this->con->banco->rollBack();
		}

		public function commitSql(){
			$this->con->banco->commit();
		}

		function __destruct()
		{
        	$this->con = null;
		}
		
	}

?>