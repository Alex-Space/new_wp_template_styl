<?php

////////////////////////////////////
//    Настройки рассылок          //
////////////////////////////////////
return array(
    'subject'         => 'projectname@info.ru',                                            // тема письма
    'subscribers'     => array('af@tolstovgroup.ru'),                  // список e-mail`ов для рассылки
    'phones'          => array('79087961293'),                         // список мобильных для рассылки
    'sender'          => 'PROJECTNAME',                                       // sender в smsc
    'sms_login'       => 'tolstovgroup',
    'sms_pass'        => 'f7385bb53173fd6b9980e515f1c827b7',
    'sms_template'    => '%s %s',                                     // %s - плейсхолдер, Порядок параметров имя_цели, имя, телефон, email
    'email_template'  => 'Имя: %s, Телефон: %s', // %s - плейсхолдер, Порядок параметров имя_цели, имя, email, телефон
    'sms_enabled'     => false,                                          // отправлять смс
    'email_enabled'   => true,                                          // отправлять email
    'modarate'        => false,                                          // выгружать на модерацию в клиентскую систему
    'profile'         => '',                         // флаг проекта для которого мы выгружаем
    'success_page'    => 'thanks.html'                                     // страница "Спасибо"
);