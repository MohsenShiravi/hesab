<?php

use App\Models\File;
use Morilog\Jalali\CalendarUtils;

function uploadFile($object, $image, $path){
    $file_name = time() . '.' . $image->getClientOriginalName();
    $mime_type = $image->getClientMimeType();
    $image->storeAs($path, $file_name);
    $file = new File();
    $file->name = $file_name;
    $file->path = $path;
    $file->mime_type = $mime_type;
    $object->files()->save($file);
}

function jalaliToGregorian($date) {
    $dateString = CalendarUtils::convertNumbers($date, true); // 1395-02-19
    return CalendarUtils::createCarbonFromFormat('Y-m-d', $dateString)->format('Y-m-d H:i:s'); //2016-05-8
}

function gregorianToJalali($data)
{
    $date = CalendarUtils::strftime('Y-m-d', strtotime($data));
    return CalendarUtils::convertNumbers($date);
}
