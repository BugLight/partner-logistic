<?php
require_once 'forms.php';

use Forms\Field;
use Forms\Form;

$fields = [
    new Field('companyName'),
    new Field('loadCity', true),
    new Field('endCity', true),
    new Field('clientFullName', true),
    new Field('clientPhone', true, function($val) {
        return preg_match('/^\+?\d+$/', $val);
    }),
    new Field('clientMail', false, function($val) {
        $regexp = '/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/';
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
            echo json_encode([
                'code' => 200,
                'message' => 'OK'
            ]);
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
