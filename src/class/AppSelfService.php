<?php



class AppSelfService{

       /**
	* Chave secreta para validar as requisições de incio de aplicação.
	* @const string
	*/
	private $MODULE_INCOMING_SECRET='bc757144a5737f363926fb777fa5850e79d50c6a';

       /**
	* Chave secreta do módulo.
	* @var string
	*/
	private $moduleSecret;
	
       /**
	* Chave secreta do módulo.
	* @var string
	*/
	private $loginToken;
	
	public function __construct($secret,$token,$inSecret)
	{
		if ($inSecret!=$this->MODULE_INCOMING_SECRET) {
		    throw new \RuntimeException('Bad request secret');
		}

		if (empty($secret)) {
		    throw new \RuntimeException('No secret provided');
		}

		if (!is_string($secret)) {
		    throw new \RuntimeException('The provided secret must be a string');
		}


		if (empty($token)) {
		    throw new \RuntimeException('No token provided');
		}

		if (!is_string($token)) {
		    throw new \RuntimeException('The provided token must be a string');
		}

		$this->moduleSecret = $secret;

		$this->loginToken = $token;
		
	}

       /**
	* 
	* @return
	*/
	public function init()
	{
		
		$fields_string = 'login_token='. $this->loginToken.'&module_secret='. $this->moduleSecret;

		$ch = curl_init("http://192.168.1.91/appss/clientplugin/getAppObjectInfo.php");
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
		    return $rsData; 
		} 
		else 
		{ 
		    return false; 
		}
	}

}