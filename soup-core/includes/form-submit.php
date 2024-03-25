<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // form data
    $soup_name = $_POST['name'];
    $soup_email = $_POST['email'];
    $soup_phone = $_POST['phone'];
    $soup_date = $_POST['date'];
    $soup_attendents = $_POST['attendents'];
    $soup_sentTO = $_POST['senttomail'];
    $soupSub = $_POST['senttitle'];
    $soupFrom = $_POST['sentfrom'];
 
    if(empty($soup_name ) || empty($soup_email ) || empty($soup_phone ) || empty($soup_date ) || empty($soup_attendents ) ){
         http_response_code(403);
        echo 'Please Fill Out All Fields.';
        exit;
    }
    $soup_mail_to = $soup_sentTO;
    $soup_mail_sub = $soupSub;
    $soup_mail_from = $soupFrom;

    $soup_mail_msg = "Reservation Details\n";
    $soup_mail_msg .= "Name: ".$soup_name."\n";
    $soup_mail_msg .= "Email: ".$soup_email."\n";  
    $soup_mail_msg .= "Phone: ".$soup_phone."\n";  
    $soup_mail_msg .= "Date: ".$soup_date."\n";  
    $soup_mail_msg .= "Attendents: ".$soup_attendents."\n";   
    $soup_mail_headers = "From: ".$soup_mail_sub." <".$soup_mail_from.">" . "\r\n"; 

    if(mail($soup_mail_to,$soup_mail_sub,$soup_mail_msg,$soup_mail_headers)){
        http_response_code(200);
        echo "Thank you for booking! We will get back to you as soon as possible";
    }else{
        http_response_code(500);
        echo "There was a problem";
    }


}else{
    http_response_code(403);
    echo "There was a problem";
}

  