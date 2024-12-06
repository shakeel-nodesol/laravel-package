<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use LaravelFCM\Android\AndroidConfig;
use LaravelFCM\Android\AndroidNotification;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Notification\Notification;

Route::get('/', function () {
    $token = "e2U3AAQPRe2GGvZHnxIZsW:APA91bG6U6yNFW4CK82OPvr9E9RaiKY344GK4naupp6BokpzBLHNaEQnwULu1CI8Mf0zvtjfdJieNVgDZcff-kvkPM898klFETvgV86dXuxJlysowq3dUA8BnisirFh1FoRz-eAd_kCE";

    $androidNotification = AndroidNotification::builder()
        ->setTitle('This is my title from Android')
        ->setBody('This is my body from Android')
        ->setSound('default')
        ->setClickAction('http://google.com')
        ->setNotificationCount(10)
        ->setTicker('test')
        ->build();
    $notification = new Notification('This is my notification', 'test');

    $androidConfig = AndroidConfig::builder()
        ->setNotification($androidNotification)
        ->setCollapseKey('home')
        ->build();

    $message = LaravelFCM\Message\Message::builder()
        ->setNotification($notification)
        ->setAndroidConfig($androidConfig)
        ->setTokens($token)
        ->build();

    FCM::send($message);

//    $notification = new \LaravelFCM\Notification\Notification('My Notification');
//    $message = new \LaravelFCM\Message\MessageBuilder;
//    $message = $message->setNotification($notification)->setToken($token)->build();

//    $downstreamResponse = FCM::send($message);

//    \Log::info(json_encode($downstreamResponse));
});

Route::view('categories/create', 'categories.form');

Route::controller(MainController::class)->group(function () {
    Route::post('categories/store', 'storeCategoryProduct');
    Route::get('categories/get', 'index');
});
