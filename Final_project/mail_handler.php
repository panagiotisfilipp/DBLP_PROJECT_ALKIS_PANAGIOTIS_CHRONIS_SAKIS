<?php 
if(isset($_POST['submit'])){
    $to = "info@dblp.click2web.gr"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['author'];
  
    $subject = "Mail from dblp.click2web.gr";
    $subject2 = "Αντίγραφο απεσταλμένου email στο info@dblp.click2web.gr ";
    $message = $first_name . " απέστειλε το παρακάτω μήνυμα:" . "\n\n" . $_POST['comment'];
    $message2 = "Αντίγραφο απεσταλμένου email στο info@dblp.click2web.gr " . $first_name . "\n\n" . $_POST['comment'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Το mail απεστάλη. Ευχαριστούμε " . $first_name . ", θα επικοινωνήσουμε μαζί σας το συντομότερο δυνατό.";
   // header('Location: contact.php');
    // You cannot use header and echo together. It's one or the other.
    }
?>