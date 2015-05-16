<?php
$settings = include 'settings.php';
function csvdump($in, $file = false){
    if(!$file){
        $file = 'conversion';
    }
    $csv = fopen( getcwd() . '/error/' . $file .'.dat', 'a');
    fputcsv($csv, $in, ';');
    fclose($csv);
}


if(strlen($_POST['city']) > 0){
    $city = $_POST['city'];
}
else{
    $ip = $_SERVER['REMOTE_ADDR'];
    $json = json_decode( file_get_contents('http://api.sypexgeo.net/json/' . $ip) );
    $city = strlen($json->city->name_ru) ? $json->city->name_ru : "Не определён";
}

$sms_text   = sprintf($settings['sms_template'], $_POST['name'], $_POST['phone']);
$email_text = sprintf($settings['email_template'], $_POST['name'], $_POST['phone'], $city);

$post = $_POST;
$post['ip'] = $_SERVER['REMOTE_ADDR'];
$post['agent'] = $_SERVER['HTTP_USER_AGENT'];
$post['city_'] = $city;
//csvdump( array(time(), implode(',', $post), 'main') );

if($settings['email_enabled']) {
    foreach($settings['subscribers'] as $subscriber){
        mail($subscriber, $settings['subject'], $email_text,
            'Content-Type: text/plain;charset=utf-8\r\n
            From: '. $settings['subject'] .' \r\n'
        );
    }
}

if($settings['sms_enabled']) {
    $opts = array(
        'http' => array(
            'method' => "GET",
            'header' => "HTTP/1.1 200 OK"
        )
    );

    $context = stream_context_create($opts);

    // Open the file using the HTTP headers set above
    foreach($settings['phones'] as $phone){
        $file = file_get_contents('http://smsc.ru/sys/send.php?login=' . $settings['sms_login'] . '&psw=' . $settings['sms_pass'] . '&sender=' . $settings['sender'] . '&phones=' . $phone . '&charset=utf-8&mes=' . $sms_text, false, $context);
    }
}

if($settings['modarate']){
    $post = $_POST;
    $post['profile'] = $settings['profile'];
    $data = json_encode($post);
    $ch = curl_init('http://clients.tolstovgroup.ru/jsonConversGateway');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
}
if($_POST['method'] != 'ajax'){
    header('Location: ' . $_SERVER['HTTP_ORIGIN'] . '/' . $settings['success_page']);
}
else{
    echo '1'; die;
}

