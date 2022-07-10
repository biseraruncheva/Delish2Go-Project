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

        $korisnikID = $_GET['KorisnikID'];
        $sql = "SELECT * FROM korisnik WHERE KorisnikID = $korisnikID";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count>0) {
            while($row=mysqli_fetch_assoc($res)) {
                $ime = $row['Ime'];
                $prezime = $row['Prezime'];
                $email = $row['Email'];
            }
        }

        $mail->setFrom('delish2gophp@gmail.com', 'Delish2Go');
        $mail->addAddress($email);

        $body = '<p>Почитуван/а '. $ime . ' ' . $prezime . ',<br><br> Ве известуваме дека Вашата нарачка е успешна.</p>';

        $mail->isHTML(true);
        $mail->Subject = 'Uspeshna Narachka';

        $mail->Body = $body;
        $mail->AltBody = strip_tags($body);
        $mail->send();
        $_SESSION['mailNaracka'] = "<div class='success'>Проверете го Вашиот mail за потврда за успешна нарачка.</div>";
        header('location:'.MAINURL.'user/Kosnicka');
    }catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>