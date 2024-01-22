
<?php
// Make sure this file is being accessed through a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Replace contact@example.com with your real receiving email address
    $receiving_email_address = 'rounakchatterjee04@gmail.com';

    // Check if PHP Email Form library exists
    $php_email_form_path = '../assets/vendor/php-email-form/php-email-form.php';
    if (file_exists($php_email_form_path)) {
        require_once($php_email_form_path);
    } else {
        die('Unable to load the "PHP Email Form" Library!');
    }

    // Create PHP_Email_Form instance
    $contact = new PHP_Email_Form;
    $contact->ajax = true;

    // Set email parameters
    $contact->to = $receiving_email_address;
    $contact->from_name = $_POST['name'];
    $contact->from_email = $_POST['email'];
    $contact->subject = $_POST['subject'];

    // Uncomment below code if you want to use SMTP to send emails.
    // Enter your correct SMTP credentials
    
    $contact->smtp =(
        'host' => 'smtp.elasticemail.com',
        'username' => 'rounakchatterjee04@gmail.com',
        'password' => '8FB2EB0DC9AAAB680804D3AE2869063A36F0',
        'port' => '2525'
    );
    

    // Add message content
    $contact->add_message($_POST['name'], 'From');
    $contact->add_message($_POST['email'], 'Email');
    $contact->add_message($_POST['message'], 'Message');

    // Send the email and echo the result
    echo $contact->send();
} else {
    // If the file is not accessed through a POST request, return an error
    http_response_code(405); // Method Not Allowed
    echo "Error: Method Not Allowed";
}
?>
*/
