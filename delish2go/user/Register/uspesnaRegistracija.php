<?php
    require('../../model/constants.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../../vendor/autoload.php';

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 1;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username   = 'delish2gophp@gmail.com'; 
        $mail->Password   = 'tqfiebalbmulbwtt';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $email = $_GET['Email'];

        $mail->setFrom('delish2gophp@gmail.com', 'Delish2Go');
        $mail->addAddress($email);

        $ime = $_GET['Ime'];
        $prezime = $_GET['Prezime'];

        $body = '<p>Почитуван/а '. $ime . ' ' . $prezime . ',<br><br> Успешно се регистриравте на нашата платформа.</p>';

        $mail->isHTML(true);
        $mail->Subject = 'Uspeshna Registracija';

        $mail->Body = $body;
        $mail->AltBody = strip_tags($body);
        $mail->send();
        $_SESSION['mailIspraten'] = "<div class='success'>Проверете го Вашиот mail за потврда за успешна регистрација.</div>";
        header('location:'.MAINURL.'user/Register?result=reload');
    }catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>