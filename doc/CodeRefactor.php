<?php
/**
 * User: kendy
 * Date: 22/12/17
 * Time: 07:16 PM
 */

define("IOS_SOUND", "honk.wav");
define("ANDROID_SOUND", "default");
define("PUSH_ACTION", "Open");

public function post_confirm(){
    $id = Input::get('service_id');
    $driverId = Input::get('driver_id');
    $servicio = Service::find($id);

    if($servicio != NULL){
        switch ($servicio->status_id){
            case '1':
                if($servicio->driver_id == NULL){
                    Service::update($id, array('driver_id' => $driverId,"status_id" => '2'));

                    Driver::update($driverId, array("available" => 0));

                    $driverTemp = Driver::find($driverId);
                    Service::update($id, array('car_id' => $driverTemp->car_id));

                    $pushMessage = 'Tu servicio ha sido confirmado';

                    $servicio = Service::find($id);
                    $push = Push::make();

                    if(NULL != $servicio || NULL != $servicio->user || NULL == $servicio->user->uuid ||  $servicio->user->uuid == ''){
                        return Response::json(array('error' => '0'));
                    }

                    if($servicio->user->type == '1'){
                        $result = $push->ios($servicio->user->uuid, $pushMessage, 1, IOS_SOUND, PUSH_ACTION, array('serviceId' => $servicio->id));
                    } else {
                        $result = $push->android2($servicio->user->uuid, $pushMessage, 1, ANDROID_SOUND, PUSH_ACTION, array('serviceId' => $servicio->id));
                    }
                    return Response::json(array('error' => '0'));        
                } else {
                    return Response::json(array('error' => '1'));
                }
            break;
            
            case '6':
                return Response::json(array('error' => '2'));
            break;
            
            default:
                return Response::json(array('error' => '0'));
            break;
        }
        
    } else {
        return Response::json(array('error' => '2'));
    }
    
    return Response::json(array('error' => '2'));
}

