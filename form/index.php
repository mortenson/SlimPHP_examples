<?php
session_start();
require '../Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->get('/', function() use ($app){
    $app->render('form.php');
});

$app->post('/', function() use ($app){
    $req = $app->request();
    $errors = array();
    $params = array(
        'email' => array(
            'name'=>'Email',
            'required'=>true,
            'max_length'=>64,
        ),
        'subject' => array(
            'name'=>'Subject',
            'required'=>true,
            'max_length'=>256,
        ),
        'message' => array(
            'name'=>'Message',
            'required'=>true,
            'max_length'=>512,
        ),
    );
    foreach($params as $param=>$options){
        $value = $req->params($param);
        if($options['required']){
            if(!$value){
                $errors[] = $options['name'].' is required!';
            }
        }
        if($value and strlen($value) > $options['max_length']){
            $errors[] = $options['name'].' must be less than '.$options['max_length'].' characters long!';
        }
    }
    if($errors){
        $app->flash('errors',$errors);
    }
    else{
        //submit_to_db($email, $subject, $message);
        $app->flash('message','Form submitted!');
    }
    $app->redirect('./');
});

$app->run();