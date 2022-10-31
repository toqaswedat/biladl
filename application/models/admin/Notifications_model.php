<?php defined('BASEPATH') OR exit("No direct script access allowed");
class Notifications_model extends CI_Model
{

function __construct() {
    parent::__construct();       
} 

 public function insert_push_notification($notifications,$notification_to,$where_id=array())
{//echo "<pre>";print_r($notifications);
    $message = serialize($notifications);

      // Fetch users
      $this->db->order_by('id', 'desc');
      $this->db->distinct();
      $this->db->select('id, token_no, os_type');
      if(!empty($where_id))
      {
        $this->db->where($where_id);
      }

    //$this->db->where('notify',0);
    if($notification_to == "student")
    {      
      $this->db->where('type','student');
    }
    elseif($notification_to == "lawyer")
    {
      $this->db->where('type','lawyer');
    }
     elseif($notification_to == "member")
    {
      $this->db->where('type','member');
    }
    else
    {
      
    }

    
    $query = $this->db->get('users');
    $rows_count = $query->num_rows();
    if($rows_count > 0)
    {
    $tokens = array();
    
    $records = $query->result_array();
    //echo "<pre>";print_r($records);exit;
    foreach($records as $r)
    {
    //$reg_ids[] = $r; 
    if(!empty($r["token_no"]))
    {
        if($r["os_type"] == "Android")
        {
            array_push($tokens, $r["token_no"]);
        }
        else
        {
            //$iospushStatus = $this->ios_send_push_notification($r["token_no"], $message);
        }
        
    }   
   
    }

    $data = array('message' => $message, 'when_date' => date('Y-m-d H:i:s'));
    $this->db->insert('pushed_notifications', $data);

    $this->db->select(array('id', 'message','DATE_FORMAT(when_date,"%d %b %Y") as Onlydate','DATE_FORMAT(when_date,"%h:%i %p") as Onlytime'));
    $this->db->order_by('id','desc');   
    $this->db->limit(1);       
    $query = $this->db->get('pushed_notifications');  
    $mr = $query->result_array();
    foreach($mr as $r)
    {
        $r['message'] = unserialize($r['message']);
        $rows_msg[] = $r;

    }

    $json_data = json_encode(array('json' => $rows_msg));
    $message = array('message' => $json_data);
    $push_status = $this->send_push_notification($tokens, $message,$notification_to);   
     return true;
    } 
    else 
    {
        return false;
    }
}

 public function insert_push_notification_user($notifications,$notification_to,$where_id=array())
{//echo "<pre>";print_r($notifications);
    $message = serialize($notifications);

      // Fetch users
      $this->db->order_by('id', 'desc');
      $this->db->distinct();
      $this->db->select('id, token_no, os_type');
      if(!empty($where_id))
      {
        foreach ($where_id as $key => $value) {
          $this->db->where($key,$value,false);
        }
      }

  //  $this->db->where('notify',1);
    if($notification_to == "USER")
    {      
      $this->db->where('type','USER');
    }
    elseif($notification_to == "EXPERT")
    {
      $this->db->where('type','EXPERT');
    }
    else
    {
      return false;
    }

    
    $query = $this->db->get('users');
    $rows_count = $query->num_rows();
    if($rows_count > 0)
    {
    $tokens = array();
    
    $records = $query->result_array();
    //echo "<pre>";print_r($records);exit;
    foreach($records as $r)
    {
    //$reg_ids[] = $r; 
    if(!empty($r["token_no"]))
    {
        if($r["os_type"] == "Android")
        {
            array_push($tokens, $r["token_no"]);
        }
        else
        {
            //$iospushStatus = $this->ios_send_push_notification($r["token_no"], $message);
        }
        
    }   
   
    }

    $data = array('message' => $message, 'when_date' => date('Y-m-d H:i:s'));
    $this->db->insert('pushed_notifications', $data);

    $this->db->select(array('id', 'message','DATE_FORMAT(when_date,"%d %b %Y") as Onlydate','DATE_FORMAT(when_date,"%h:%i %p") as Onlytime'));
    $this->db->order_by('id','desc');   
    $this->db->limit(1);       
    $query = $this->db->get('pushed_notifications');  
    $mr = $query->result_array();
    foreach($mr as $r)
    {
        $r['message'] = unserialize($r['message']);
        $rows_msg[] = $r;

    }

    $json_data = json_encode(array('json' => $rows_msg));
    $message = array('message' => $json_data);
    $push_status = $this->send_push_notification($tokens, $message,$notification_to);   
     return true;
    } 
    else 
    {
        return false;
    }
}


public function send_push_notification($tokens, $message ,$notification_to)
{
    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
        'registration_ids' => $tokens,
        'data' => $message
    );

     $headers = array(
          'Authorization:key = AIzaSyCS1ZLfGWUr5rgQ5oXIED9nRC41D54MhqU',
          'Content-Type: application/json'
        );



    if($notification_to == "USER")
    {
        $headers = array(
          'Authorization:key = AIzaSyCS1ZLfGWUr5rgQ5oXIED9nRC41D54MhqU',
          'Content-Type: application/json'
        );
    }
    else if($notification_to == "EXPERT")
    {
        $headers = array(
          'Authorization:key = AIzaSyCS1ZLfGWUr5rgQ5oXIED9nRC41D54MhqU',
          'Content-Type: application/json'
        );
    }
    

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);          
    if ($result === FALSE) 
    {
        die('Curl failed: ' . curl_error($ch));
    }
    curl_close($ch);
    //echo $result;exit;
    return $result;
}

public function testios()
{
  $deviceToken = '5dc0aca692e9de7aaf8a6d2552dcb97794a93cc874a5dcea8f3a5fffc94e40e2'; //  iPad 5s Gold prod
$passphrase = '';
$message = 'Hello Push Notification';
$ctx = stream_context_create();
stream_context_set_option($ctx, 'ssl', 'local_cert', 'http://mobileappdevelopmentsolutions.com/notify/Newyoudevelopment.pem'); // Pem file to generated // openssl pkcs12 -in pushcert.p12 -out pushcert.pem -nodes -clcerts // .p12 private key generated from Apple Developer Account
stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
//$fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx); // production

 $fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_PERSISTENT, $ctx); // developement
 //echo $fp;exit;
  echo "<p>Connection Open</p>";
    if(!$fp){
        echo "<p>Failed to connect!<br />Error Number: " . $err . " <br />Code: " . $errstrn . "</p>";
        return;
    } else {
        echo "<p>Sending notification!</p>";    
    }
$body['aps'] = array('alert' => $message,'sound' => 'default','extra1'=>'10','extra2'=>'value');
$payload = json_encode($body);
$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
var_dump($msg);
try{
  if (is_writable($fp)) {

    // In our example we're opening $filename in append mode.
    // The file pointer is at the bottom of the file hence
    // that's where $somecontent will go when we fwrite() it.
    if (!$handle = fopen($fp, 'a')) {
         echo "Cannot open file ($fp)";
         exit;
    }

    // Write $somecontent to our opened file.
    if (fwrite($fp, $msg, strlen($msg)) === FALSE) {
        echo "Cannot write to file ($fp)";
        exit;
    }

    echo "Success, wrote ($msg) to file ($fp)";

    fclose($handle);

} else {
    echo "The file $fp is not writable";
}

$result = fwrite($fp, $msg, strlen($msg));
echo "<pre>";print_r($result);
} catch(Exception $E)
{
  echo $E;exit;
}


//set blocking
stream_set_blocking($fp,0);

//Check response
$this->checkAppleErrorResponse($fp);

/*var_dump($result);
  if (!$result)
            echo '<p>Message not delivered ' . PHP_EOL . '!</p>';
        else
            echo '<p>Message successfully delivered ' . PHP_EOL . '!</p>';*/
fclose($fp);
}

public function iosSendPushNotification() //$tokens, $Message
   {
//var_dump($tokens);exit;
    $tokens = '5dc0aca692e9de7aaf8a6d2552dcb97794a93cc874a5dcea8f3a5fffc94e40e2';
    $Message = array('message' => json_encode("testings"));
    /* IOS Push */  
$type = 'development'; // you can set it to production as well
$connection = [
'development' => 'ssl://gateway.sandbox.push.apple.com:2195',
'production'  => 'ssl://gateway.push.apple.com:2195'
];

// Certificate Info
$passphrase = '12345678';
$cert = './assets/cert/Newyoudevelopment.pem';
//echo $cert;
$ctx = stream_context_create();
//stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
stream_context_set_option($ctx, 'ssl', 'local_cert', $cert);

# Open a connection to the APNS server
$fp = stream_socket_client($connection[$type], $err, $errstr, 60, STREAM_CLIENT_PERSISTENT, $ctx);

if (!$fp){
echo "Error: ".$err;
exit;
}
$Message = $Message;

$body['aps'] = array('alert' => $Message,);
$payload = json_encode($body);
//echo "\n".'Connected to APNS Push Notification' . PHP_EOL;
$i =0;
//echo $i ++;
// Device ID
// Message
// Build the binary notification
$msg = chr(1).pack("N", 12).pack("N", 12).pack('n', 32).pack('H*', $tokens).pack('n', strlen($payload)).$payload;
// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));

//set blocking
stream_set_blocking($fp,0);

//Check response
$this->checkAppleErrorResponse($fp);

// Close the connection to the server
fclose($fp);
}

function checkAppleErrorResponse($fp)
{

   $apple_error_response = fread($fp, 6); //byte1=always 8, byte2=StatusCode, bytes3,4,5,6=identifier(rowID). Should return nothing if OK.
   //NOTE: Make sure you set stream_set_blocking($fp, 0) or else fread will pause your script and wait forever when there is no response to be sent.

   if ($apple_error_response) {

       $error_response = unpack('Ccommand/Cstatus_code/Nidentifier', $apple_error_response); //unpack the error response (first byte 'command" should always be 8)

       if ($error_response['status_code'] == '0') {
        $error_response['status_code'] = '0-No errors encountered';

       } else if ($error_response['status_code'] == '1') {
        $error_response['status_code'] = '1-Processing error';

       } else if ($error_response['status_code'] == '2') {
        $error_response['status_code'] = '2-Missing device token';

       } else if ($error_response['status_code'] == '3') {
        $error_response['status_code'] = '3-Missing topic';

       } else if ($error_response['status_code'] == '4') {
        $error_response['status_code'] = '4-Missing payload';

       } else if ($error_response['status_code'] == '5') {
        $error_response['status_code'] = '5-Invalid token size';

       } else if ($error_response['status_code'] == '6') {
        $error_response['status_code'] = '6-Invalid topic size';

       } else if ($error_response['status_code'] == '7') {
        $error_response['status_code'] = '7-Invalid payload size';

       } else if ($error_response['status_code'] == '8') {
        $error_response['status_code'] = '8-Invalid token';

       } else if ($error_response['status_code'] == '255') {
        $error_response['status_code'] = '255-None (unknown)';

       } else {
        $error_response['status_code'] = $error_response['status_code'].'-Not listed';

       }
       echo '<br><b>+ + + + + + ERROR</b> Response Command:<b>' . $error_response['command'] . '</b>&nbsp;&nbsp;&nbsp;Identifier:<b>' . $error_response['identifier'] . '</b>&nbsp;&nbsp;&nbsp;Status:<b>' . $error_response['status_code'] . '</b><br>';

 }
}


}