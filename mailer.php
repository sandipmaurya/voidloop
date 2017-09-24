<?php
    

   // Get the form field , remove html tags whitespace 
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);
    
//check the data
    
if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: http://www.tripurari.in/index.php?success=-1#contact-msg");
    exit;
}
    
// Set the recipient email address
    
    $recipient = "voidlooprobotech@gmail.com";
    
// Set the subject 
    
    $subject = "New contact from $name";
    
// Build email content
    
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message: \n$message\n";
    
// Build the email Header
    
    $email_headers = "From: $name <$email>";
    
//send the email 
    
    mail($recipient, $subject, $email_content, $email_headers);
  
//redirect to main 
        
header("Location: http://www.tripurari.in/index.php?success=1#contact-msg");
        

?>