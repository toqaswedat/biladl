<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class HyperPay extends CI_Controller {
			
	function __construct()
	{
		parent::__construct();
		// $this->is_logged_in();
		//$this->load->model('homemodel');
		$this->load->model('Common_model');
		//$this->load->model('Web_modul');
		date_default_timezone_set("Asia/Kolkata");
		$this->load->library('Ajax_pagination');
	}
	
	
	
	var $idd;



function request($regid) {
    if(!isset($regid)){ die(); }
    //echo "ldlld";
    
    // $regid = $_SESSION["regid"];

   /* $regcards = "";
    
    foreach ($regid as $key => $value) {
        
        if ($key == 0) {
            
            $regcards = "registrations[0].id = $value";
            
        } else {
            $regcards .= "registrations[$key].id = $value";
        }
        
    } */
    
$url = "https://oppwa.com/v1/checkouts";
	$data = "authentication.userId=8ac7a4ca6818e18101682232ac820b94" .
                "&authentication.password=mDh4pJMPWm" .
                "&authentication.entityId=8ac7a4ca6818e181016822334d900b98" .
                "&amount=92.00" .
                "&currency=SAR" .
                "&paymentType=DB" .
                 $regid .
                "&createRegistration=true" .
                 "&notificationUrl=http://www.example.com/notify".
                 "&shopperResultUrl=testmosab://checkoutid" 
                                ;


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
echo $responseData;
//echo $regid;
//$json = file_get_contents($responseData);
$obj = json_decode($responseData);
$checkoutid = $obj->id;
//echo $checkoutid;
//return $checkoutid;
}


function requestreg() {
    
    // $regid = $_SESSION["regid"];

$url = "https://oppwa.com/v1/registrations";
	$data = "authentication.userId=8ac7a4ca6818e18101682232ac820b94" .
                "&authentication.password=mDh4pJMPWm" .
                "&authentication.entityId=8ac7a4ca6818e181016822334d900b98" .
                "&amount=92.00" .
                "&currency=SAR" .
                "&paymentType=DB" .
               // "&registrations[0].id=$regid".
                "&createRegistration=true" .
                 "&notificationUrl=http://www.example.com/notify".
                 "createRegistration=true" .
                 "&recurringType=INITIAL" ;

                               


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);


//echo $responseData;


//$json = file_get_contents($responseData);
$obj = json_decode($responseData);


$checkoutid = $obj->id;

echo $checkoutid;

//return $checkoutid;
}


function requestios() {
    
    // $regid = $_SESSION["regid"];

$url = "https://oppwa.com/v1/checkouts";
	$data = "authentication.userId=8a8294174d0595bb014d05d829e701d1" .
                "&authentication.password=9TnJPc2n9h" .
                "&authentication.entityId=8a8294174d0595bb014d05d82e5b01d2" .
                "&amount=92.00" .
                "&currency=EUR" .
                "&paymentType=DB" .
               // "&registrations[0].id=$regid".
                "&createRegistration=true" .
                 "&notificationUrl=http://www.example.com/notify".
                 "&shopperResultUrl=mosabalzouby.testhyperpay.payments://test"
                                ;


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);


echo $responseData;


//$json = file_get_contents($responseData);
$obj = json_decode($responseData);


$checkoutid = $obj->id;

//echo $checkoutid;

//return $checkoutid;
}

function getstatus($id){

  //$id = $_GET['id'];


	$url = "https://oppwa.com/v1/checkouts/$id/payment";
	$url .= "?authentication.userId=8ac7a4ca6818e18101682232ac820b94";
	$url .=	"&authentication.password=mDh4pJMPWm";
	$url .=	"&authentication.entityId=8ac7a4ca6818e181016822334d900b98";
	

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);

 echo $responseData ;
 



 
}
	
	
	
	
	





	
}
?>