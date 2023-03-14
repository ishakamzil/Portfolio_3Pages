<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assign Variables
    $user = filter_var($_POST['name'], FILTER_SANITIZE_STRING);  // the string filter 
    $suruser = filter_var($_POST['surname'], FILTER_SANITIZE_STRING);  // the string filter 
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //the email filter
    $subjectForm = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // FILTER_SANITIZE_NUMBER_INT  the phone filter


    // Creating Array of Errors
    $formErrors = array();
    if (strlen($user) <= 3) {
        $formErrors[] = 'Username must be larger than 3 characters';}


    // if no error send the email [ mail(To, Subject, Message, Headers, Parameters) ]

    $headers = 'From: ' . $email . '\r\n';
    $myEmail = 'amzilishak@gmail.com';
    $subject = 'contact Form';
    $allName = $user . ' ' . $suruser;
    $content = $subjectForm . '<br>' . $message;

    if(empty($formErrors)) {
            mail($myEmail, $subject, $content, $headers, $allName);
      
        // $success = 'div class="alert alert-success"> We have recieved your message </div>';
       }

}

?>