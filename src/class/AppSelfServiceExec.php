<?php



class AppSelfServiceExec{

    /**
	* Chave secreta do módulo.
	* @var string
	*/
	private $moduleSecret;
	
    /**
	* Chave secreta do módulo.
	* @var string
	*/
	private $execToken;
	
	public function __construct($secret,$execToken)
	{
		if (empty($secret)) {
		    throw new \RuntimeException('No secret provided');
		}

		if (!is_string($secret)) {
		    throw new \RuntimeException('The provided secret must be a string');
		}


		if (empty($execToken)) {
		    throw new \RuntimeException('No token provided');
		}

		if (!is_string($execToken)) {
		    throw new \RuntimeException('The provided token must be a string');
		}

		$this->moduleSecret = $secret;

		$this->execToken = $execToken;
		
	}

    /**
	* 
	* @return
	*/
	public function exec()
	{
		
		  $fields_string = 'exec_token='. $this->execToken.'&module_secret='. $this->moduleSecret;

		$ch = curl_init("http://192.168.1.91/appss/clientplugin/execModule.php");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		
		curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		

		$rsData = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

	

		if(($httpCode >= 200 && $httpCode < 300)&&$rsData ) 
		{ 

			$json  = json_decode($rsData,true);
			if($json["satus"]=="erro")
				return false;

		    return true; 
		} 
		else 
		{ 

		    return false; 
		}
	}


       /**
	* 
	* @return
	*/
	public function getModuleInfo()
	{
		
		  $fields_string = 'exec_token='. $this->execToken.'&module_secret='. $this->moduleSecret;

		$ch = curl_init("http://192.168.1.91/appss/clientplugin/moduleInfo.php");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		
		curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		

		$rsData = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

	

		if(($httpCode >= 200 && $httpCode < 300)&&$rsData ) 
		{ 

			$json  = json_decode($rsData,true);
			if($json["satus"]=="erro")
				return false;

		    return $json; 
		} 
		else 
		{ 

		    return false; 
		}
	}


}