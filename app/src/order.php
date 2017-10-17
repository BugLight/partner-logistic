<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require_once 'forms.php';

use Forms\Field;
use Forms\Form;

mb_internal_encoding('utf-8');

$fields = [
    new Field('companyName'),
    new Field('loadCity', true),
    new Field('endCity', true),
    new Field('clientFullName', true),
    new Field('clientPhone', true, function($val) {
        return preg_match('/^\+?\d+$/', $val);
    }),
    new Field('clientMail', false, function($val) {
        $regexp = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';
        return preg_match($regexp, $val);
    }),
    new Field('cargoType'),
    new Field('cargoWeight', true, function($val) {
        return preg_match('/^\d+$/', $val);
    }),
    new Field('cargoVolume', true, function($val) {
        return preg_match('/^\d+$/', $val);
    }),
    new Field('loadDate', false, function($val) {
        return preg_match('/^(\d\d\d\d)-(\d\d)-(\d\d)$/', $val);
    })
];

switch ($_SERVER['REQUEST_METHOD']) {
    case 'OPTIONS':
        header('Allow: OPTIONS, POST');
        break;

    case 'POST':
        $request =  json_decode(file_get_contents('php://input'), true);
        $form = new Form($fields, $request);
        $form_errors = $form->validate();
        if ($form_errors) {
            echo json_encode([
                'code' => 400,
                'errors' => $form_errors
            ]);
        }
        else {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = $_ENV['SMTP_HOST'];
                $mail->SMTPAuth = true;
                $mail->Username = $_ENV['SMTP_USER'];
                $mail->Password = $_ENV['SMTP_PASSWORD'];
                $mail->SMTPSecure = 'tls';
                $mail->Port = $_ENV['SMTP_PORT'];
                $mail->setFrom('noreply@partner-logistic.com');
                $mail->addAddress($_ENV['MAILBOX']);
                $mail->isHTML(true);
                $mail->CharSet = 'utf-8';
                $mail->Subject = 'Заказ на перевозку';
                $mail->Body = $form->datahtml();
                $mail->send();
                echo json_encode([
                    'code' => 200,
                    'message' => 'OK'
                ]);
            }
            catch (Exception $e) {
                echo json_encode([
                    'code' => 500,
                    'message' => 'Failed to send mail.'
                ]);
            }
        }
        break;

    default:
        echo json_encode([
            'code' => 405,
            'errors' => [
                'Method Not Allowed'
            ]
        ]);
        break;
}
?>
