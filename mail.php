<?php 


$MessageStatus =false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['Email']) && $_POST['Email'] !=''){
                    if( filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL )  ){
                            $name =  sendMail( $_POST['name']);
                             $email = sendMail($_POST['Email']);
                            $message = sendMail($_POST['Message']);


        
                            $mailheader = " From: ".$name."<".$email.">\r\n";

                            $recepient = "hyssoncleaners@gmail.com";

                            mail($recepient, $message, $mailheader) or die('Error');


                            $MessageStatus= true;
    }
}
        else{
            $EmailErr="Email Required";
        }


    if (empty($_POST["name"])) {
        $NameErr = "Name is required";
      } else {
        $name = test_input($_POST["name"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $NameErr = "Only letters and white space allowed";
        }
      }

      if (empty($_POST["Message"])) {
        $message = "";
      } else {
          if(preg_match("/^[a-zA-Z-']*$/",$message)){
        $message = test_input($_POST["Message"]);
      }
      }
  
  
}
function sentMail($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data= htmlspecialchars($data);
    return $data;
    
}

?>