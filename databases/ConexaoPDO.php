<?php
	namespace DB;
	use \PDO;
	class ConexaoPDO
	{
		private static $host = 'localhost';
		private static $charset = 'utf8';
		private static $user = 'root';
		private static $pass = 'root';
		private static $bd;
		public $banco;
		private $pdo_dns;
		
		/**
		 * [__construct description]
		 * @param [type] $bd [description]
		 */
		function __construct($bd)
		{
			self :: $bd = $bd;
			$this->pdo_dsn = "mysql:host=".self ::$host.";dbname=".self ::$bd.";charset=".self ::$charset;
            try{
				$this->banco = new PDO($this->pdo_dsn, self ::$user, self ::$pass);
				$this->banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //CHAMAR METODO
				return $this->banco;
			}catch(PDOException $e){
				echo "Erro ao conectar com a base de dados ".$e->getMessage();
			}
		}

		function __destruct()
		{
            $this->banco = null;
		}
	}
?>