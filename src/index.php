<?php
	require_once __DIR__ . '/vendor/autoload.php';

	use Classes\QueryFeedback;

	$queryFeedback = new QueryFeedback();
	$queryFeedback->setClass();
	$getClass = $queryFeedback->getArraySerialize();
    

	function printTabs($header,$content,$sufixID){
		echo '<div id="tab'.$sufixID.'" ><div id="tabHeader'.$sufixID.'" class="tabHeader">';

		// Place the tab menu header
		foreach($header as $x => $h_value) {
			if($x==0){
				$chk='checked';
			}
			else{
				$chk='';
			}

			echo '<input id="tab'.$sufixID.$x.'" type="radio" name="tabs'.$sufixID.'" value="'.$x.'" onclick="switchAppssTabs(\''.$sufixID.'\',\''.$h_value['call_back'].'\')" '.$chk;

			/*if(array_key_exists("additionalClass", $h_value)){
				echo ' class="tab'.$h_value['additionalClass'].'"';
			}*/
			if(array_key_exists("additionalAttrToolips", $h_value))
				echo '><label for="tab'.$sufixID.$x.'" data-toggle="tooltip" title="'.$h_value['additionalAttrToolips'].'">';
			else
				echo '><label for="tab'.$sufixID.$x.'">';
			
			
			echo $h_value['icon'];
			echo '</label>';
		}

		echo '</div>
				<div id="tabManagementContent"  class="tabContent"  style="border-top: 1px solid #ddd;"><form id="RestaurantModelConfigFrom" role="form" action="" method="post" novalidate>';



		// Place the tab menu content
		foreach($content as $key => $value) {
			if($key==0){
				$act='tabContentDataActive';
			}
			else{
				$act='';
			}
			
			echo '<div id="tabContent'.$sufixID.'_'.$key.'" class="box tabContentData '.$act;
			if(array_key_exists("additionalClass", $header[$key])){
				echo ' content'.$header[$key]['additionalClass'];
			}
			 
			echo '">'.$value;
			echo '</div>';  
		}
		echo '</form></div></div>';
	}
	
	$vicon1 = '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="48.625px" height="48.625px" viewBox="0 0 48.625 48.625" style="enable-background:new 0 0 48.625 48.625;" xml:space="preserve">
		<polygon points="35.432,10.815 35.479,11.176 34.938,11.288 34.866,12.057 35.514,12.057 36.376,11.974 36.821,11.445 
			36.348,11.261 36.089,10.963 35.7,10.333 35.514,9.442 34.783,9.591 34.578,9.905 34.578,10.259 34.93,10.5 		"/>
		<polygon points="34.809,11.111 34.848,10.629 34.419,10.444 33.819,10.583 33.374,11.297 33.374,11.76 33.893,11.76 		"/>
		<path d="M22.459,13.158l-0.132,0.34h-0.639v0.33h0.152c0,0,0.009,0.07,0.022,0.162l0.392-0.033l0.245-0.152l0.064-0.307
			l0.317-0.027l0.125-0.258l-0.291-0.06L22.459,13.158z"/>
		<polygon points="20.812,13.757 20.787,14.08 21.25,14.041 21.298,13.717 21.02,13.498 		"/>
		<path d="M48.619,24.061c-0.007-0.711-0.043-1.417-0.11-2.112c-0.225-2.317-0.779-4.538-1.609-6.62
			c-0.062-0.155-0.119-0.312-0.185-0.465c-1.106-2.613-2.659-4.992-4.56-7.045c-0.125-0.134-0.252-0.266-0.379-0.396
			c-0.359-0.373-0.728-0.737-1.11-1.086C36.344,2.402,30.604,0,24.312,0C17.967,0,12.186,2.445,7.852,6.44
			C6.842,7.371,5.914,8.387,5.072,9.475C1.896,13.583,0,18.729,0,24.312c0,13.407,10.907,24.313,24.313,24.313
			c9.43,0,17.617-5.4,21.647-13.268c0.862-1.682,1.533-3.475,1.985-5.354c0.115-0.477,0.214-0.956,0.3-1.441
			c0.245-1.381,0.379-2.801,0.379-4.25C48.625,24.228,48.62,24.145,48.619,24.061z M44.043,14.344l0.141-0.158
			c0.185,0.359,0.358,0.724,0.523,1.094l-0.23-0.009l-0.434,0.06V14.344z M40.53,10.102l0.004-1.086
			c0.382,0.405,0.75,0.822,1.102,1.254l-0.438,0.652l-1.531-0.014l-0.096-0.319L40.53,10.102z M11.202,7.403V7.362h0.487
			l0.042-0.167h0.797v0.348l-0.229,0.306h-1.098L11.202,7.403L11.202,7.403z M11.98,8.488c0,0,0.487-0.083,0.529-0.083
			s0,0.486,0,0.486L11.411,8.96l-0.209-0.25L11.98,8.488z M45.592,18.139h-1.779l-1.084-0.807l-1.141,0.111v0.696h-0.361
			l-0.39-0.278l-1.976-0.501v-1.28l-2.504,0.195l-0.776,0.417h-0.994L34.1,16.643l-1.207,0.67v1.261l-2.467,1.78l0.205,0.76h0.5
			L31,21.838l-0.352,0.129l-0.019,1.892l2.132,2.428h0.928l0.056-0.148h1.668l0.481-0.445h0.946l0.519,0.52l1.41,0.146l-0.187,1.875
			l1.565,2.763l-0.824,1.575l0.056,0.742l0.649,0.647v1.784l0.852,1.146v1.482h0.736c-4.096,5.029-10.33,8.25-17.305,8.25
			C12.009,46.625,2,36.615,2,24.312c0-3.097,0.636-6.049,1.781-8.732v-0.696l0.798-0.969c0.277-0.523,0.574-1.033,0.891-1.53
			l0.036,0.405l-0.926,1.125c-0.287,0.542-0.555,1.096-0.798,1.665v1.27l0.927,0.446v1.765l0.889,1.517l0.723,0.111l0.093-0.52
			l-0.853-1.316l-0.167-1.279h0.5l0.211,1.316l1.233,1.799L7.02,21.27l0.784,1.199l1.947,0.482v-0.315l0.779,0.111l-0.074,0.556
			l0.612,0.112l0.945,0.258l1.335,1.521l1.705,0.129l0.167,1.391l-1.167,0.816l-0.055,1.242l-0.167,0.76l1.688,2.113l0.129,0.724
			c0,0,0.612,0.166,0.687,0.166c0.074,0,1.372,0.983,1.372,0.983v3.819l0.463,0.13l-0.315,1.762l0.779,1.039l-0.144,1.746
			l1.029,1.809l1.321,1.154l1.328,0.024l0.13-0.427l-0.976-0.822l0.056-0.408l0.175-0.5l0.037-0.51l-0.66-0.02l-0.333-0.418
			l0.548-0.527l0.074-0.398l-0.612-0.175l0.036-0.37l0.872-0.132l1.326-0.637l0.445-0.816l1.391-1.78l-0.316-1.392l0.427-0.741
			l1.279,0.039l0.861-0.682l0.278-2.686l0.955-1.213l0.167-0.779l-0.871-0.279l-0.575-0.943l-1.965-0.02l-1.558-0.594l-0.074-1.111
			l-0.52-0.909l-1.409-0.021l-0.814-1.278l-0.723-0.353l-0.037,0.39l-1.316,0.078l-0.482-0.671l-1.373-0.279l-1.131,1.307
			l-1.78-0.302l-0.129-2.006l-1.299-0.222l0.521-0.984l-0.149-0.565l-1.707,1.141l-1.074-0.131L9.48,21.016l0.234-0.865l0.592-1.091
			l1.363-0.69l2.632-0.001l-0.007,0.803l0.946,0.44l-0.075-1.372l0.682-0.686l1.376-0.904l0.094-0.636l1.372-1.428l1.459-0.808
			l-0.129-0.106l0.988-0.93l0.362,0.096l0.166,0.208l0.375-0.416l0.092-0.041l-0.411-0.058l-0.417-0.139v-0.4l0.221-0.181h0.487
			l0.223,0.098l0.193,0.39l0.236-0.036v-0.034l0.068,0.023l0.684-0.105l0.097-0.334l0.39,0.098v0.362l-0.362,0.249h0.001
			l0.053,0.397l1.239,0.382c0,0,0.001,0.005,0.003,0.015l0.285-0.024l0.019-0.537l-0.982-0.447l-0.056-0.258l0.815-0.278l0.036-0.78
			l-0.852-0.519l-0.056-1.315l-1.168,0.574h-0.426l0.112-1.001l-1.59-0.375l-0.658,0.497v1.516l-1.183,0.375l-0.474,0.988
			l-0.514,0.083v-1.264l-1.112-0.154l-0.556-0.362l-0.224-0.819l1.989-1.164l0.973-0.296l0.098,0.654l0.542-0.028l0.042-0.329
			l0.567-0.081l0.01-0.115l-0.244-0.101l-0.056-0.348l0.697-0.059l0.421-0.438l0.023-0.032l0.005,0.002l0.128-0.132l1.465-0.185
			l0.648,0.55l-1.699,0.905l2.162,0.51l0.28-0.723h0.945l0.334-0.63l-0.668-0.167V6.212L22.69,5.284l-1.446,0.167l-0.816,0.427
			l0.056,1.038l-0.853-0.13L19.5,6.212l0.817-0.742l-1.483-0.074l-0.426,0.129l-0.185,0.5l0.556,0.094l-0.111,0.556l-0.945,0.056
			l-0.148,0.37l-1.371,0.038c0,0-0.038-0.778-0.093-0.778c-0.055,0,1.075-0.019,1.075-0.019l0.817-0.798l-0.446-0.223l-0.593,0.576
			l-0.984-0.056l-0.593-0.816h-1.261L12.81,6.008h1.206l0.11,0.353l-0.313,0.291l1.335,0.037l0.204,0.482l-1.503-0.056l-0.073-0.371
			L12.831,6.54L12.33,6.262l-1.125,0.009C14.888,3.588,19.417,2,24.312,2c5.642,0,10.797,2.109,14.73,5.574l-0.265,0.474
			l-1.029,0.403l-0.434,0.471l0.1,0.549l0.531,0.074l0.32,0.8l0.916-0.369l0.151,1.07h-0.276l-0.752-0.111l-0.834,0.14l-0.807,1.14
			l-1.154,0.181l-0.167,0.988l0.487,0.115l-0.141,0.635l-1.146-0.23l-1.051,0.23l-0.223,0.585l0.182,1.228l0.617,0.289l1.035-0.006
			l0.699-0.063l0.213-0.556l1.092-1.419l0.719,0.147l0.708-0.64l0.132,0.5l1.742,1.175l-0.213,0.286l-0.785-0.042l0.302,0.428
			l0.483,0.106l0.566-0.236l-0.012-0.682l0.251-0.126l-0.202-0.214l-1.162-0.648l-0.306-0.861h0.966l0.309,0.306l0.832,0.717
			l0.035,0.867l0.862,0.918l0.321-1.258l0.597-0.326l0.112,1.029l0.583,0.64l1.163-0.02c0.225,0.579,0.427,1.168,0.604,1.769
			L45.592,18.139z M13.261,11.046l0.584-0.278l0.528,0.126l-0.182,0.709l-0.57,0.181L13.261,11.046z M16.36,12.715v0.459h-1.334
			l-0.5-0.139l0.125-0.32l0.641-0.265h0.876v0.265H16.36z M16.974,13.355V13.8l-0.334,0.215l-0.416,0.077c0,0,0-0.667,0-0.737
			H16.974z M16.598,13.174v-0.529l0.459,0.418L16.598,13.174z M16.807,14.244v0.433l-0.319,0.32h-0.709l0.111-0.486l0.335-0.029
			l0.069-0.167L16.807,14.244z M15.041,13.355h0.737l-0.945,1.321l-0.39-0.209l0.084-0.556L15.041,13.355z M18.059,14.092v0.432
			H17.35l-0.194-0.28v-0.402h0.056L18.059,14.092z M17.404,13.498l0.202-0.212l0.341,0.212l-0.273,0.225L17.404,13.498z
			 M45.954,19.265l0.07-0.082c0.029,0.126,0.06,0.252,0.088,0.38L45.954,19.265z"/>
		<path d="M3.782,14.884v0.696c0.243-0.568,0.511-1.122,0.798-1.665L3.782,14.884z"/>
	</svg>';

	$vicon2 = '<svg enable-background="new 0 0 567.419 567.419" version="1.1" viewBox="0 0 567.419 567.419" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
      <path d="m409.93 209.3c0 18.056-14.627 32.692-32.683 32.692-18.047 0-32.683-14.636-32.683-32.692s14.636-32.683 32.683-32.683c18.056 0 32.683 14.627 32.683 32.683z"/>
      <path d="m222.01 209.3c0 18.056-14.636 32.692-32.683 32.692s-32.683-14.636-32.683-32.692 14.636-32.683 32.683-32.683 32.683 14.627 32.683 32.683z"/>
      <path d="m172.54 453.62c-7.434 0-13.468-6.025-13.468-13.468 0-58.138 46.762-105.44 104.24-105.44h45.397c57.483 0 104.24 47.04 104.24 104.86 0 7.443-6.025 13.477-13.468 13.477-7.435 0-13.459-6.034-13.459-13.477 0-42.955-34.685-77.91-77.317-77.91h-45.397c-42.632 0-77.308 35.206-77.308 78.493-2e-3 7.444-6.036 13.469-13.47 13.469z"/>
      <path d="m283.71 567.42c-156.4 0-283.64-127.28-283.64-283.71 0-156.43 127.24-283.7 283.64-283.7 156.39 0 283.63 127.28 283.63 283.7 0 156.44-127.24 283.71-283.63 283.71zm0-540.47c-141.55 0-256.7 115.18-256.7 256.76 0 141.59 115.15 256.77 256.7 256.77 141.54 0 256.7-115.18 256.7-256.77 0-141.58-115.15-256.76-256.7-256.76z"/>
    </svg>';

	$vicon3 = '<svg enable-background="new 0 0 559.464 559.464" version="1.1" viewBox="0 0 559.464 559.464" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
      <path d="m411.1 393.09h-251.41c-7.434 0-13.468-6.034-13.468-13.468 0-7.443 6.034-13.477 13.468-13.477h251.41c7.434 0 13.468 6.034 13.468 13.477 1e-3 7.435-6.033 13.468-13.468 13.468z"/>
      <path d="m404.11 206.42c0 17.796-14.42 32.216-32.207 32.216s-32.198-14.42-32.198-32.216c0-17.787 14.411-32.207 32.198-32.207s32.207 14.42 32.207 32.207z"/>
      <path d="m218.94 206.42c0 17.796-14.42 32.216-32.198 32.216-17.787 0-32.198-14.42-32.198-32.216 0-17.787 14.411-32.207 32.198-32.207s32.198 14.42 32.198 32.207z"/>
      <path d="m279.73 559.46c-154.21 0-279.66-125.49-279.66-279.73 8e-3 -154.25 125.46-279.74 279.66-279.74s279.66 125.49 279.66 279.74c0 154.24-125.46 279.73-279.66 279.73zm0-532.52c-139.35 0-252.73 113.4-252.73 252.79s113.38 252.79 252.73 252.79c139.36 0 252.73-113.4 252.73-252.79s-113.37-252.79-252.73-252.79z"/>
    </svg>';

	$vicon4 = '<svg enable-background="new 0 0 567.419 567.419" version="1.1" viewBox="0 0 567.419 567.419" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
      <path d="m409.93 209.3c0 18.056-14.627 32.692-32.683 32.692-18.047 0-32.683-14.636-32.683-32.692s14.636-32.683 32.683-32.683c18.056 0 32.683 14.627 32.683 32.683z"/>
      <path d="m222.01 209.3c0 18.056-14.636 32.692-32.683 32.692s-32.683-14.636-32.683-32.692 14.636-32.683 32.683-32.683 32.683 14.627 32.683 32.683z"/>
      <path d="m308.7 451.47h-45.388c-57.483 0-104.25-46.205-104.25-103.01 0-7.443 6.034-13.468 13.468-13.468s13.468 6.025 13.468 13.468c0 42.659 33.958 76.078 77.317 76.078h45.388c43.359 0 77.317-32.863 77.317-74.821 0-7.443 6.034-13.468 13.468-13.468 7.443 0 13.468 6.025 13.468 13.468 1e-3 57.06-45.792 101.76-104.25 101.76z"/>
      <path d="m283.71 567.42c-156.4 0-283.64-127.28-283.64-283.71 0-156.43 127.24-283.7 283.64-283.7 156.39 0 283.63 127.28 283.63 283.7 0 156.44-127.24 283.71-283.63 283.71zm0-540.47c-141.55 0-256.7 115.18-256.7 256.76 0 141.59 115.15 256.77 256.7 256.77 141.54 0 256.7-115.18 256.7-256.77 0-141.58-115.15-256.76-256.7-256.76z"/>
    </svg>';

	$vicon5 = '<svg enable-background="new 0 0 559.464 559.464" version="1.1" viewBox="0 0 559.464 559.464" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
      <path d="m308.46 464.94h-54.089c-67.054 0-121.63-50.362-121.63-112.26 0-7.443 6.034-13.477 13.468-13.477h270.41c7.434 0 13.468 6.034 13.468 13.477 0.011 61.901-54.563 112.26-121.63 112.26zm-147.6-98.794c7.192 40.665 46.385 71.849 93.515 71.849h54.08c47.13 0 86.332-31.184 93.524-71.849h-241.12z"/>
      <path d="m404.11 206.42c0 17.796-14.42 32.207-32.207 32.207-17.778 0-32.198-14.411-32.198-32.207 0-17.787 14.42-32.207 32.198-32.207 17.787 0 32.207 14.42 32.207 32.207z"/>
      <path d="m218.94 206.42c0 17.796-14.411 32.207-32.198 32.207s-32.198-14.411-32.198-32.207c0-17.787 14.411-32.207 32.198-32.207s32.198 14.42 32.198 32.207z"/>
      <path d="m279.73 559.46c-154.2 0-279.66-125.49-279.66-279.73-1e-3 -154.25 125.46-279.74 279.66-279.74s279.66 125.49 279.66 279.74c9e-3 154.24-125.45 279.73-279.66 279.73zm0-532.52c-139.36 0-252.73 113.39-252.73 252.79 0 139.39 113.37 252.78 252.73 252.78 139.35 0 252.73-113.39 252.73-252.78 9e-3 -139.4-113.38-252.79-252.73-252.79z"/>
    </svg>';
		
	$vCallBack1="actionButton(\'show\')";

	$header =array(
		array("icon"=>$vicon1,"call_back"=>"getData(0)", "additionalAttrToolips"=>"Wait"),
		array("icon"=>$vicon2,"call_back"=>"getData(1)", "additionalAttrToolips"=>"Sad"),
		array("icon"=>$vicon3,"call_back"=>"getData(2)", "additionalAttrToolips"=>"Normal"),
		array("icon"=>$vicon4,"call_back"=>"getData(3)", "additionalAttrToolips"=>"Surprise"),
		array("icon"=>$vicon5,"call_back"=>"getData(4)", "additionalAttrToolips"=>"Happy")
	);


	$tab1_content = buildFeebackInterface($getClass['allFeedback']);

	$tab2_content = "";

	$tab3_content = "";

	$tab4_content = "";

	$tab5_content = "";

	$content=array($tab1_content,$tab2_content,$tab3_content,$tab4_content,$tab5_content);

	function buildFeebackInterface($ObjectName) {
		$interface = '<div class="scrollbar">';
		if (is_array($ObjectName) || is_object($ObjectName)) {
			foreach ($ObjectName as $row) {
					        	
		 	$interface .= '<!-- Section: Social newsfeed v.1 -->
			<section class="">
				<!-- Grid row -->
				<div class="row">
				    <!-- Grid column -->
				    <div class="col-md-12">
				      	<!-- Newsfeed -->
				      	<div class="mdb-feed">
				      		<!-- Fourth news -->
					        <div class="news">
					        	<!-- Label -->
								<div class="label">';
								$name = "Lili Rose";
								if($row['user_type'])
								{
									$name = "Anonymous";
									$interface .='<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" class="dout-anonumous">
										<path d="M418.88,344.021l-54.869-19.093c-3.989-1.387-8.469-0.277-11.371,2.859c-26.901,29.376-61.227,45.547-96.64,45.547
											s-69.739-16.171-96.64-45.525c-2.88-3.136-7.36-4.267-11.371-2.859L93.12,344.043C37.419,363.392,0,416.021,0,475.008v15.659
											c0,5.888,4.779,10.667,10.667,10.667h490.667c5.888,0,10.667-4.779,10.667-10.667v-15.659
											C512,416.021,474.581,363.392,418.88,344.021z"/>
										<path d="M383.893,142.059c0.064-1.131,0.107-2.261,0.107-3.392c0-70.592-57.408-128-128-128s-128,57.408-128,128
											c0,0.917,0.021,1.856,0.064,2.773c-12.715,6.955-21.397,26.389-21.397,50.56c0,29.675,13.099,52.224,30.677,53.291
											C156.736,309.547,203.435,352,256,352s99.264-42.453,118.656-106.709c17.579-1.067,30.677-23.616,30.677-53.291
											C405.333,168.405,397.056,149.312,383.893,142.059z M372.672,223.531c-2.901-1.792-6.464-2.091-9.643-0.811
											c-3.136,1.28-5.483,3.989-6.315,7.296C341.781,290.219,301.312,330.667,256,330.667s-85.781-40.448-100.715-100.651
											c-0.832-3.307-3.499-5.76-6.656-7.061c-1.173-0.491-2.453-0.704-3.755-0.704c-2.176,0-4.395,0.619-6.208,1.749
											C136,224,128,212.651,128,192c0-19.563,7.189-30.763,10.197-31.915c0.107,0.021,0.213,0.043,0.32,0.043
											c3.136,0.235,6.357-0.789,8.619-3.072c2.261-2.283,3.392-5.461,3.051-8.64l-0.299-2.667c-0.256-2.325-0.555-4.672-0.555-7.083
											C149.333,79.851,197.184,32,256,32s106.667,47.851,106.667,106.667c0,2.411-0.299,4.757-0.555,7.061l-0.299,2.667
											c-0.341,3.2,0.789,6.379,3.051,8.64c2.261,2.283,5.461,3.349,8.619,3.093c0.085-0.021,0.213-0.021,0.32-0.043
											C376.811,161.237,384,172.437,384,192C384,212.651,376.171,224,372.672,223.531z"/>
										<path d="M256,96c-25.131,0-42.667,17.536-42.667,42.667c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.667-10.667
											c0-19.243,14.912-21.333,21.333-21.333s21.333,2.091,21.333,21.333c0,17.899-3.947,26.069-16.235,33.557
											c-23.723,14.507-27.691,33.685-26.304,42.731c0.811,5.248,5.291,8.853,10.453,8.853c0.427,0,0.875-0.043,1.323-0.085
											c5.696-0.661,9.813-5.931,9.344-11.669c-0.021-0.448-0.704-11.221,16.32-21.611c18.773-11.477,26.432-26.475,26.432-51.776
											C298.667,113.536,281.131,96,256,96z"/>
											<circle cx="245.333" cy="256" r="10.667"/>
									</svg>';

								}									
								else
									$interface .='<img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(18)-mini.jpg" class="rounded-circle z-depth-1-half">';

								$interface .='</div>
						        <!-- Excerpt -->
						        <div class="excerpt">
						            <!-- Brief -->
						            <div class="brief">
						              <a class="name">'.$name.'</a> <!--posted on his page--!>
						              	<a class="like">';
						              	switch ($row['emotion']) {
						              		case '1':
						              			$interface .= '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 65.44 65.44" style="fill: #212121;" xml:space="preserve">
					                                <path id="path-1_21_" style="/* background-color: #00000052; */fill: #e4352f;" d="M65.44,34.88c0,16.616-13.472,30.086-30.089,30.086
					                                  c-16.618,0-30.09-13.47-30.09-30.086S18.733,4.794,35.351,4.794C51.968,4.794,65.44,18.264,65.44,34.88z"></path>
					                                <path id="path-2_21_" d="M45.647,23.775c0,2.01-1.63,3.639-3.64,3.639c-2.01,0-3.64-1.629-3.64-3.639s1.63-3.639,3.64-3.639
					                                  C44.017,20.136,45.647,21.765,45.647,23.775z"></path>
					                                <path id="path-3_21_" d="M24.717,23.775c0,2.01-1.629,3.639-3.639,3.639c-2.011,0-3.64-1.629-3.64-3.639s1.629-3.639,3.64-3.639
					                                  C23.088,20.136,24.717,21.765,24.717,23.775z"></path>
					                                <path id="path-4_21_" d="M19.207,50.977c-0.829,0-1.5-0.672-1.5-1.5c0-6.473,5.209-11.739,11.611-11.739h5.055
					                                  c6.403,0,11.611,5.237,11.611,11.674c0,0.829-0.671,1.5-1.5,1.5c-0.829,0-1.5-0.671-1.5-1.5c0-4.783-3.863-8.674-8.611-8.674
					                                  h-5.055c-4.748,0-8.611,3.92-8.611,8.739C20.707,50.305,20.036,50.977,19.207,50.977z"></path>
					                                <path id="path-5_21_" d="M31.589,63.645C14.171,63.645,0,49.476,0,32.059C0,14.643,14.171,0.474,31.589,0.474
					                                  c17.419,0,31.59,14.169,31.59,31.585C63.179,49.476,49.008,63.645,31.589,63.645z M31.589,3.474C15.825,3.474,3,16.297,3,32.059
					                                  c0,15.763,12.825,28.587,28.589,28.587c15.765,0,28.59-12.824,28.59-28.587C60.179,16.297,47.354,3.474,31.589,3.474z"></path>
	                            				</svg>';
						              			break;
						              		case '2':
						              			$interface .= '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64.5 64.5" style="enable-background:new 0 0 64.5 64.5;" xml:space="preserve">
					                              <path id="path-1_49_" style="fill: #fae613;" d="M64.5,34.853c0,16.371-13.274,29.643-29.648,29.643
					                                c-16.373,0-29.646-13.272-29.646-29.643c0-16.372,13.273-29.644,29.646-29.644C51.226,5.209,64.5,18.481,64.5,34.853z"></path>
					                              <path id="path-2_49_" d="M45.778,43.768h-28c-0.828,0-1.5-0.672-1.5-1.5c0-0.829,0.672-1.5,1.5-1.5h28c0.828,0,1.5,0.671,1.5,1.5
					                                C47.278,43.096,46.606,43.768,45.778,43.768z"></path>
					                              <path id="path-3_49_" d="M44.998,22.984c0,1.981-1.607,3.586-3.587,3.586c-1.98,0-3.586-1.605-3.586-3.586
					                                c0-1.98,1.606-3.585,3.586-3.585C43.391,19.399,44.998,21.004,44.998,22.984z"></path>
					                              <path id="path-4_49_" d="M24.376,22.984c0,1.981-1.606,3.586-3.586,3.586c-1.981,0-3.586-1.605-3.586-3.586
					                                c0-1.98,1.605-3.585,3.586-3.585C22.77,19.399,24.376,21.004,24.376,22.984z"></path>
					                              <path id="path-5_49_" d="M31.147,62.29C13.973,62.29,0,48.319,0,31.147S13.973,0.004,31.147,0.004s31.147,13.971,31.147,31.143
					                                S48.321,62.29,31.147,62.29z M31.147,3.004C15.627,3.004,3,15.628,3,31.147s12.627,28.144,28.147,28.144
					                                c15.521,0,28.147-12.625,28.147-28.144S46.668,3.004,31.147,3.004z"></path>
					                            </svg>';
						              			break;
						              		case '3':
						              			$interface .= '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 65.441 65.441" style="enable-background:new 0 0 65.441 65.441;" xml:space="preserve">
					                              <path id="path-1_10_" style="fill:#EDC951;" d="M65.441,34.881c0,16.616-13.472,30.086-30.09,30.086S5.262,51.497,5.262,34.881
					                                S18.733,4.795,35.351,4.795S65.441,18.265,65.441,34.881z"/>
					                              <path id="path-2_10_" d="M45.647,23.776c0,2.01-1.629,3.639-3.639,3.639c-2.011,0-3.641-1.629-3.641-3.639s1.63-3.639,3.641-3.639
					                                C44.018,20.137,45.647,21.766,45.647,23.776z"/>
					                              <path id="path-3_10_" d="M24.718,23.776c0,2.01-1.629,3.639-3.64,3.639c-2.01,0-3.64-1.629-3.64-3.639s1.63-3.639,3.64-3.639
					                                C23.089,20.137,24.718,21.766,24.718,23.776z"/>
					                              <path id="path-4_10_" d="M34.374,50.737h-5.055c-6.403,0-11.611-5.145-11.611-11.469c0-0.829,0.671-1.5,1.5-1.5
					                                c0.828,0,1.5,0.671,1.5,1.5c0,4.749,3.782,8.469,8.611,8.469h5.055c4.828,0,8.611-3.658,8.611-8.329c0-0.829,0.671-1.5,1.5-1.5
					                                c0.828,0,1.5,0.671,1.5,1.5C45.985,45.761,40.885,50.737,34.374,50.737z"/>
					                              <path id="path-5_10_" d="M31.59,63.646C14.171,63.646,0,49.477,0,32.06C0,14.644,14.171,0.475,31.59,0.475
					                                c17.418,0,31.59,14.169,31.59,31.585C63.18,49.477,49.008,63.646,31.59,63.646z M31.59,3.475C15.825,3.475,3,16.298,3,32.06
					                                c0,15.763,12.825,28.587,28.59,28.587c15.764,0,28.59-12.824,28.59-28.587C60.18,16.298,47.354,3.475,31.59,3.475z"/>
					                            </svg>';
						              			break;
						              		case '4':
						              			$interface .= '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64.5 64.5" style="enable-background:new 0 0 64.5 64.5;" xml:space="preserve">
					                              <path id="path-1_32_" style="fill:#2fca35;" d="M64.5,34.853c0,16.371-13.274,29.643-29.648,29.643
					                                c-16.373,0-29.647-13.272-29.647-29.643c0-16.372,13.274-29.644,29.647-29.644C51.226,5.209,64.5,18.481,64.5,34.853z"/>
					                              <path id="path-2_32_" style="fill:#fff;" d="M50.098,41.768c0,6.999-5.393,10.999-12.047,10.999h-6.023
					                                c-6.652,0-12.045-4-12.045-10.999H50.098z"/>
					                              <path id="path-3_32_" d="M34.346,51.767h-6.023c-7.47,0-13.547-5.607-13.547-12.499c0-0.828,0.672-1.5,1.5-1.5h30.116
					                                c0.828,0,1.5,0.672,1.5,1.5C47.892,46.16,41.815,51.767,34.346,51.767z M17.908,40.768c0.801,4.528,5.166,7.999,10.415,7.999
					                                h6.023c5.248,0,9.614-3.471,10.414-7.999H17.908z"/>
					                              <path id="path-4_32_" d="M44.997,22.985c0,1.98-1.605,3.586-3.586,3.586c-1.981,0-3.587-1.606-3.587-3.586
					                                c0-1.981,1.606-3.586,3.587-3.586C43.392,19.399,44.997,21.004,44.997,22.985z"/>
					                              <path id="path-5_32_" d="M24.376,22.985c0,1.98-1.606,3.586-3.586,3.586c-1.981,0-3.587-1.606-3.587-3.586
					                                c0-1.981,1.606-3.586,3.587-3.586C22.77,19.399,24.376,21.004,24.376,22.985z"/>
					                              <path id="path-6_27_" d="M31.147,62.29C13.972,62.29,0,48.319,0,31.147S13.972,0.004,31.147,0.004
					                                c17.174,0,31.147,13.971,31.147,31.143S48.321,62.29,31.147,62.29z M31.147,3.004C15.626,3.004,3,15.629,3,31.147
					                                c0,15.519,12.626,28.144,28.147,28.144c15.52,0,28.147-12.625,28.147-28.144C59.294,15.629,46.667,3.004,31.147,3.004z"/>
					                            </svg>';						              			
						              			break;
						              		default:
						              			# code...
						              			break;
						              	}
						            $interface .='</a>
						            </div>
						            <!-- Added text -->
						            <div class="added-text">'.$row['comments'].'</div>
						            <!-- Feed footer -->
						            <div class="feed-footer">
						              <a class="like">
						                <span class="date" >'.$row['date_time'].'</span>
						              </a>
						            </div>
						        </div>';
					        $interface .='</div>

					        <!-- Fourth news -->
					    </div>
					</div>
				</div>
			</section>';
			}
		}
		$interface .='</div>';

		return $interface;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/mdb.min.css" rel="stylesheet">

    <title>Dout | Config</title>
	<style>
		:root {
	      --dout-primary: var(--gray);
	      --dout-secundary: #616161; 
	      --dout-sucesses: var(--success);
	      --dout-danger: var(--danger);
	    }

		.tabContent {
		    overflow-y: scroll;
		}

		.tabHeader {
		    border-bottom: 1px solid #ddd;
		    margin-bottom: 10px;
		}

		.tabHeader input{
		    display: none !important;
		}
		.tabHeader input:checked + label {
		    color: #555;
		    border: 1px solid #ddd;
		    border-top: 2px solid orange;
		    border-bottom: 1px solid #fff;
		}
		.tabHeader input:checked + label svg {
		    fill: #555;
		}
		.tabHeader label svg {
		    fill: #bbb;
		}

		.tabHeader svg{
		    width: 30px;
		    height: 30px;
		}
		.tabHeader label {
		    display: inline-block;
		    margin: 0 0 -1px;
		    font-weight: 600;
		    text-align: center;
		    color: #bbb;
		    border: 1px solid transparent;
		    margin-bottom: 0px!important;
		    width: 52px;
		    height: 53px;
		    padding: 10px 0 0 0;
		}
		.tabHeader label::before, .tabHeader label::after {
		    display: none;
		}
		.tabContent .tabContentData{
		    display: none;
		}
		.tabContent .tabContentDataActive{
		    display: block;
		}
		.tabContent {
		    height: inherit;
		    border-style: none !important;
		}

	    .scrollbar {
			position: absolute;
			width: 100%;
			height: calc(100% - (70px))  !important;
			margin-bottom: 0;
			margin-left: 0;
			padding: 0 0.7rem;
		    overflow-y: auto;
  			overflow-x: hidden;
		}

	    /*tab*/
	    .mdb-feed .news {
		    display: -webkit-box;
		    display: -webkit-flex;
		    display: -ms-flexbox;
		    display: flex;
		}
	    .mdb-feed .news .label {
		    display: block;
		    -webkit-box-flex: 0;
		    -webkit-flex: 0 0 auto;
		    -ms-flex: 0 0 auto;
		    flex: 0 0 auto;
		    -webkit-align-self: stretch;
		    -ms-flex-item-align: stretch;
		    align-self: stretch;
		    width: 2.5rem;
		}

		.mdb-feed .news .label img {
		    width: 100%;
		    height: auto;
		}

		.mdb-feed .news .excerpt {
		    display: block;
		    -webkit-box-flex: 1;
		    -webkit-flex: 1 1 auto;
		    -ms-flex: 1 1 auto;
		    flex: 1 1 auto;
		    -webkit-align-self: stretch;
		    -ms-flex-item-align: stretch;
		    align-self: stretch;
		    word-wrap: break-word;
		    margin: 0 0 1.2rem 1.2rem;
		}

		.mdb-feed .news .excerpt .brief {
		    padding-bottom: .5rem;
		    font-weight: 500;
		}

		.mdb-feed .news .excerpt .brief .name {
		    display: inline-block;
		    vertical-align: baseline;
		}

		.mdb-feed .news .excerpt .brief a {
		    color: #4285f4;
		}

		.mdb-feed .news .excerpt .brief .date {
		    display: inline-block;
		    float: none;
		    padding-left: .7rem;
		    font-weight: 300;
		    font-size: .86rem;
		    color: #9e9e9e;
		}

		.mdb-feed .news .excerpt .added-text {
		    margin-bottom: .6rem;
		    max-width: 450px;
		}
		*, ::after, ::before {
		    box-sizing: border-box;
		}

		.mdb-feed .news .excerpt .feed-footer .like {
		    font-weight: 300;
		    font-size: .86rem;
		    color: #9e9e9e;
		}

		.mdb-feed .news .excerpt .feed-footer .like .fa {
		    padding-right: .5rem;
		}

		.fa {
		    display: inline-block;
		    font: normal normal normal 14px/1 FontAwesome;
		    font-size: inherit;
		    text-rendering: auto;
		    -webkit-font-smoothing: antialiased;
		    -moz-osx-font-smoothing: grayscale;
		}

		.mdb-feed .news .excerpt .brief .like svg {
		    width: 20px;
		    fill: black;
		    border-radius: 50%;
		}
		
		.dout-anonumous {
		    border-radius: 50%;
		    fill: var(--dout-secundary);
		    border: solid grey 1px;
		    padding: 1px;
		}

		.contentSVG {
			opacity: 0.2; 
		}

		/*preloader*/
		/* Center the loader */
		/*#loader {
		  position: absolute;
		  left: 50%;
		  top: 50%;
		  z-index: 1;
		  width: 150px;
		  height: 150px;
		  margin: -75px 0 0 -75px;
		  border: 16px solid #f3f3f3;
		  border-radius: 50%;
		  border-top: 16px solid #3498db;
		  width: 120px;
		  height: 120px;
		  -webkit-animation: spin 2s linear infinite;
		  animation: spin 2s linear infinite;
		}

		@-webkit-keyframes spin {
		  0% { -webkit-transform: rotate(0deg); }
		  100% { -webkit-transform: rotate(360deg); }
		}

		@keyframes spin {
		  0% { transform: rotate(0deg); }
		  100% { transform: rotate(360deg); }
		}*/

		/* Add animation to "page content" */
		/*.animate-bottom {
		  position: relative;
		  -webkit-animation-name: animatebottom;
		  -webkit-animation-duration: 1s;
		  animation-name: animatebottom;
		  animation-duration: 1s
		}

		@-webkit-keyframes animatebottom {
		  from { bottom:-100px; opacity:0 } 
		  to { bottom:0px; opacity:1 }
		}

		@keyframes animatebottom { 
		  from{ bottom:-100px; opacity:0 } 
		  to{ bottom:0; opacity:1 }
		}*/

		.loader {
			position: absolute;
			left: 50%;
			top: 50%;
			z-index: 1;
			margin: -75px 0 0 -75px;
			border: 16px solid #f3f3f3;
			border-radius: 50%;
			border-top: 16px solid #3498db;
			/*border-bottom: 16px solid #3498db;*/
			width: 120px;
			height: 120px;
			-webkit-animation: spin 1s linear infinite;
			animation: spin 1s linear infinite;
		}

		@-webkit-keyframes spin {
		  0% { -webkit-transform: rotate(0deg); }
		  100% { -webkit-transform: rotate(360deg); }
		}

		@keyframes spin {
		  0% { transform: rotate(0deg); }
		  100% { transform: rotate(360deg); }
		}

	</style>
</head>
<body>
	<div id="rMBoday">
		<?=printTabs($header,$content,'tsSettingsTabs');?>
	</div>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  	<script src="js/mdb.min.js"></script>
	<script>
		var w = window.innerWidth;
    	var h = window.innerHeight;

	    $(document).ready(function() {
	    	let hTabHeader = $(".tabHeader").outerHeight();
	    	$('.box.tabContentData').height(h-(hTabHeader + 10));
	    	init_tooltip();
	    });

	    function init_tooltip(data){
		  	$('[data-toggle="tooltip"]').tooltip();
		};

		$('[data-toggle="tooltip"]').on('show.bs.tooltip', function(){
			setTimeout(function(){
				$('[data-toggle="tooltip"]').tooltip('hide');
			},1000);
		});

		function switchAppssTabs (sufix, callBack) {
			var idx = $('input[name=tabs' + sufix + ']:checked').val();
			$('.tabContentData').removeClass('tabContentDataActive');
			$('#tabContent' + sufix + '_' + idx).addClass('tabContentDataActive');
			//$('#rMBoday').html();
			eval(callBack);
		}

		function getData(value){
			$("#tabContenttsSettingsTabs_"+value).html('<div class="loader"></div>');

			$.ajax({
	          type: 'POST',
	          data: {"operation":value},
	          url: 'pages/crudRestaurantModele.php',
	          dataType: 'json',
	          cache: false
	        }).done(function(data,status){
	        	if(data)
	        		$("#tabContenttsSettingsTabs_"+value).html(buildFeebackInterface(data));
	        	else{
	        		let element = $("#tabtsSettingsTabs"+value+" + label").html();

	        		let builElement = '<div class="my-5">\
	        			<div class="col-12 contentSVG">\
	        				'+element+'\
	        			</div>\
	        			<p class="text-center ">Nothing to show</p>\
	        		</div>';
	        		$("#tabContenttsSettingsTabs_"+value).html(builElement);
	        	}
	        }).fail(function(){
	          console.log("Error Request", "Your request is fail :(");
	        });
			
	    }

	    function buildFeebackInterface (objectData) {
			let interface = '<div class="scrollbar">';
			
			for (let i = 0; i < objectData.length; i++ ) {
					        	
		 	interface += '<section class="">\
				<!-- Grid row -->\
				<div class="row">\
				    <div class="col-md-12">\
				      	<div class="mdb-feed">\
					        <div class="news">\
								<div class="label">';
								let name = "Lili Rose";
								console.log(objectData[i]['user_type']);
								if(objectData[i]['user_type'] == 1){
									name = "Anonymous";
									interface +='<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" class="dout-anonumous"><path d="M418.88,344.021l-54.869-19.093c-3.989-1.387-8.469-0.277-11.371,2.859c-26.901,29.376-61.227,45.547-96.64,45.547 s-69.739-16.171-96.64-45.525c-2.88-3.136-7.36-4.267-11.371-2.859L93.12,344.043C37.419,363.392,0,416.021,0,475.008v15.659 c0,5.888,4.779,10.667,10.667,10.667h490.667c5.888,0,10.667-4.779,10.667-10.667v-15.659 C512,416.021,474.581,363.392,418.88,344.021z"/><path d="M383.893,142.059c0.064-1.131,0.107-2.261,0.107-3.392c0-70.592-57.408-128-128-128s-128,57.408-128,128 c0,0.917,0.021,1.856,0.064,2.773c-12.715,6.955-21.397,26.389-21.397,50.56c0,29.675,13.099,52.224,30.677,53.291 C156.736,309.547,203.435,352,256,352s99.264-42.453,118.656-106.709c17.579-1.067,30.677-23.616,30.677-53.291 C405.333,168.405,397.056,149.312,383.893,142.059z M372.672,223.531c-2.901-1.792-6.464-2.091-9.643-0.811 c-3.136,1.28-5.483,3.989-6.315,7.296C341.781,290.219,301.312,330.667,256,330.667s-85.781-40.448-100.715-100.651 c-0.832-3.307-3.499-5.76-6.656-7.061c-1.173-0.491-2.453-0.704-3.755-0.704c-2.176,0-4.395,0.619-6.208,1.749 C136,224,128,212.651,128,192c0-19.563,7.189-30.763,10.197-31.915c0.107,0.021,0.213,0.043,0.32,0.043 c3.136,0.235,6.357-0.789,8.619-3.072c2.261-2.283,3.392-5.461,3.051-8.64l-0.299-2.667c-0.256-2.325-0.555-4.672-0.555-7.083 C149.333,79.851,197.184,32,256,32s106.667,47.851,106.667,106.667c0,2.411-0.299,4.757-0.555,7.061l-0.299,2.667 c-0.341,3.2,0.789,6.379,3.051,8.64c2.261,2.283,5.461,3.349,8.619,3.093c0.085-0.021,0.213-0.021,0.32-0.043 C376.811,161.237,384,172.437,384,192C384,212.651,376.171,224,372.672,223.531z"/><path d="M256,96c-25.131,0-42.667,17.536-42.667,42.667c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.667-10.667c0-19.243,14.912-21.333,21.333-21.333s21.333,2.091,21.333,21.333c0,17.899-3.947,26.069-16.235,33.557 c-23.723,14.507-27.691,33.685-26.304,42.731c0.811,5.248,5.291,8.853,10.453,8.853c0.427,0,0.875-0.043,1.323-0.085 c5.696-0.661,9.813-5.931,9.344-11.669c-0.021-0.448-0.704-11.221,16.32-21.611c18.773-11.477,26.432-26.475,26.432-51.776 C298.667,113.536,281.131,96,256,96z"/><circle cx="245.333" cy="256" r="10.667"/></svg>';

								}else
									interface +='<img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(18)-mini.jpg" class="rounded-circle z-depth-1-half">';

								interface +='</div>\
						        <div class="excerpt">\
						            <div class="brief">\
						              <a class="name">'+name+'</a> <!--posted on his page--!>\
						              	<a class="like">'+getEmotionSvg(objectData[i]['emotion'])+'</a>\
						            </div>\
						            <div class="added-text">'+objectData[i]['comments']+'</div>\
						            <div class="feed-footer">\
						              <a class="like">\
						                <span class="date" >'+objectData[i]['date_time']+'</span>\
						              </a>\
						            </div>\
						        </div>';
					        interface +='</div>\
					    </div>\
					</div>\
				</div>\
			</section>';
			}	
			interface +='</div>';

			return interface;
		}

		function getEmotionSvg(value){
		    switch (value) {
          		case '1':
          			return '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 65.44 65.44" style="fill: #212121;" xml:space="preserve"><path id="path-1_21_" style="fill: #e4352f;" d="M65.44,34.88c0,16.616-13.472,30.086-30.089,30.086 c-16.618,0-30.09-13.47-30.09-30.086S18.733,4.794,35.351,4.794C51.968,4.794,65.44,18.264,65.44,34.88z"></path><path id="path-2_21_" d="M45.647,23.775c0,2.01-1.63,3.639-3.64,3.639c-2.01,0-3.64-1.629-3.64-3.639s1.63-3.639,3.64-3.639 C44.017,20.136,45.647,21.765,45.647,23.775z"></path><path id="path-3_21_" d="M24.717,23.775c0,2.01-1.629,3.639-3.639,3.639c-2.011,0-3.64-1.629-3.64-3.639s1.629-3.639,3.64-3.639 C23.088,20.136,24.717,21.765,24.717,23.775z"></path><path id="path-4_21_" d="M19.207,50.977c-0.829,0-1.5-0.672-1.5-1.5c0-6.473,5.209-11.739,11.611-11.739h5.055 c6.403,0,11.611,5.237,11.611,11.674c0,0.829-0.671,1.5-1.5,1.5c-0.829,0-1.5-0.671-1.5-1.5c0-4.783-3.863-8.674-8.611-8.674 h-5.055c-4.748,0-8.611,3.92-8.611,8.739C20.707,50.305,20.036,50.977,19.207,50.977z"></path><path id="path-5_21_" d="M31.589,63.645C14.171,63.645,0,49.476,0,32.059C0,14.643,14.171,0.474,31.589,0.474 c17.419,0,31.59,14.169,31.59,31.585C63.179,49.476,49.008,63.645,31.589,63.645z M31.589,3.474C15.825,3.474,3,16.297,3,32.059 c0,15.763,12.825,28.587,28.589,28.587c15.765,0,28.59-12.824,28.59-28.587C60.179,16.297,47.354,3.474,31.589,3.474z"></path></svg>';
          		case '2':
          			return '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64.5 64.5" style="enable-background:new 0 0 64.5 64.5;" xml:space="preserve"><path id="path-1_49_" style="fill: #fae613;" d="M64.5,34.853c0,16.371-13.274,29.643-29.648,29.643 c-16.373,0-29.646-13.272-29.646-29.643c0-16.372,13.273-29.644,29.646-29.644C51.226,5.209,64.5,18.481,64.5,34.853z"></path><path id="path-2_49_" d="M45.778,43.768h-28c-0.828,0-1.5-0.672-1.5-1.5c0-0.829,0.672-1.5,1.5-1.5h28c0.828,0,1.5,0.671,1.5,1.5 C47.278,43.096,46.606,43.768,45.778,43.768z"></path><path id="path-3_49_" d="M44.998,22.984c0,1.981-1.607,3.586-3.587,3.586c-1.98,0-3.586-1.605-3.586-3.586 c0-1.98,1.606-3.585,3.586-3.585C43.391,19.399,44.998,21.004,44.998,22.984z"></path><path id="path-4_49_" d="M24.376,22.984c0,1.981-1.606,3.586-3.586,3.586c-1.981,0-3.586-1.605-3.586-3.586 c0-1.98,1.605-3.585,3.586-3.585C22.77,19.399,24.376,21.004,24.376,22.984z"></path> <path id="path-5_49_" d="M31.147,62.29C13.973,62.29,0,48.319,0,31.147S13.973,0.004,31.147,0.004s31.147,13.971,31.147,31.143 S48.321,62.29,31.147,62.29z M31.147,3.004C15.627,3.004,3,15.628,3,31.147s12.627,28.144,28.147,28.144 c15.521,0,28.147-12.625,28.147-28.144S46.668,3.004,31.147,3.004z"></path></svg>';
          		case '3':
          			return '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 65.441 65.441" style="enable-background:new 0 0 65.441 65.441;" xml:space="preserve"><path id="path-1_10_" style="fill:#EDC951;" d="M65.441,34.881c0,16.616-13.472,30.086-30.09,30.086S5.262,51.497,5.262,34.881 S18.733,4.795,35.351,4.795S65.441,18.265,65.441,34.881z"/><path id="path-2_10_" d="M45.647,23.776c0,2.01-1.629,3.639-3.639,3.639c-2.011,0-3.641-1.629-3.641-3.639s1.63-3.639,3.641-3.639 C44.018,20.137,45.647,21.766,45.647,23.776z"/><path id="path-3_10_" d="M24.718,23.776c0,2.01-1.629,3.639-3.64,3.639c-2.01,0-3.64-1.629-3.64-3.639s1.63-3.639,3.64-3.639 C23.089,20.137,24.718,21.766,24.718,23.776z"/><path id="path-4_10_" d="M34.374,50.737h-5.055c-6.403,0-11.611-5.145-11.611-11.469c0-0.829,0.671-1.5,1.5-1.5 c0.828,0,1.5,0.671,1.5,1.5c0,4.749,3.782,8.469,8.611,8.469h5.055c4.828,0,8.611-3.658,8.611-8.329c0-0.829,0.671-1.5,1.5-1.5 c0.828,0,1.5,0.671,1.5,1.5C45.985,45.761,40.885,50.737,34.374,50.737z"/><path id="path-5_10_" d="M31.59,63.646C14.171,63.646,0,49.477,0,32.06C0,14.644,14.171,0.475,31.59,0.475 c17.418,0,31.59,14.169,31.59,31.585C63.18,49.477,49.008,63.646,31.59,63.646z M31.59,3.475C15.825,3.475,3,16.298,3,32.06 c0,15.763,12.825,28.587,28.59,28.587c15.764,0,28.59-12.824,28.59-28.587C60.18,16.298,47.354,3.475,31.59,3.475z"/></svg>';
          		case '4':
          			return '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64.5 64.5" style="enable-background:new 0 0 64.5 64.5;" xml:space="preserve"><path id="path-1_32_" style="fill:#2fca35;" d="M64.5,34.853c0,16.371-13.274,29.643-29.648,29.643 c-16.373,0-29.647-13.272-29.647-29.643c0-16.372,13.274-29.644,29.647-29.644C51.226,5.209,64.5,18.481,64.5,34.853z"/><path id="path-2_32_" style="fill:#fff;" d="M50.098,41.768c0,6.999-5.393,10.999-12.047,10.999h-6.023 c-6.652,0-12.045-4-12.045-10.999H50.098z"/><path id="path-3_32_" d="M34.346,51.767h-6.023c-7.47,0-13.547-5.607-13.547-12.499c0-0.828,0.672-1.5,1.5-1.5h30.116 c0.828,0,1.5,0.672,1.5,1.5C47.892,46.16,41.815,51.767,34.346,51.767z M17.908,40.768c0.801,4.528,5.166,7.999,10.415,7.999 h6.023c5.248,0,9.614-3.471,10.414-7.999H17.908z"/><path id="path-4_32_" d="M44.997,22.985c0,1.98-1.605,3.586-3.586,3.586c-1.981,0-3.587-1.606-3.587-3.586 c0-1.981,1.606-3.586,3.587-3.586C43.392,19.399,44.997,21.004,44.997,22.985z"/><path id="path-5_32_" d="M24.376,22.985c0,1.98-1.606,3.586-3.586,3.586c-1.981,0-3.587-1.606-3.587-3.586 c0-1.981,1.606-3.586,3.587-3.586C22.77,19.399,24.376,21.004,24.376,22.985z"/><path id="path-6_27_" d="M31.147,62.29C13.972,62.29,0,48.319,0,31.147S13.972,0.004,31.147,0.004 c17.174,0,31.147,13.971,31.147,31.143S48.321,62.29,31.147,62.29z M31.147,3.004C15.626,3.004,3,15.629,3,31.147 c0,15.519,12.626,28.144,28.147,28.144c15.52,0,28.147-12.625,28.147-28.144C59.294,15.629,46.667,3.004,31.147,3.004z"/></svg>';						              			
          		default:
          			break;
          	}
          	return null;
		}

	</script>
</body>
</html>