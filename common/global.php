<?php

use yii\helpers\VarDumper;

use function PHPUnit\Framework\isNull;

function t($message)
{
    return Yii::t('app', $message);
}

function db()
{
    return Yii::$app->db;
}

function array_flatten($array)
{
    if (!is_array($array)) {
        return false;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, array_flatten($value));
        } else {
            $result[] = $value;
        }
    }

    return $result;
}

function mydump($input)
{
    VarDumper::dump($input, 10, true);
}

function user()
{
    return Yii::$app->user->identity;
}


function userId()
{
    if (isset(Yii::$app->user))
        return Yii::$app->user->id;
    else return 0;
}


function userRole()
{
    return ucfirst(array_keys(Yii::$app->authManager->getRolesByUser(userId()))[0]);
}
function can($permission)
{
    return Yii::$app->user->can($permission);
}

function params($key)
{
    return isset(Yii::$app->params[$key]) ? Yii::$app->params[$key] : null;
}

function labelOrderStatus($status, $wording)
{

    $arrayStatusColor = [
        -4 => '" style="background-color:#DF3126;',
        -3 => '" style="background-color:#A5A7BE;',
        -2 => '" style="background-color:#A5A7BE;',
        -1 => '" style="background-color:#A5A7BE;',
        0 => '" style="background-color:#616161;',
        1 => '" style="background-color:#C4D0FA;',
        2 => '" style="background-color:#7C4DFF;',
        3 => '" style="background-color:#F4ED49;',
        4 => '" style="background-color:#8D6E63;',
        5 => '" style="background-color:#E5662A;',
        6 => '" style="background-color:#24C041;',
        7 => '" style="background-color:#1c7dbd;',
        8 => 'style-success',
    ];

    return '<span class="label ' . $arrayStatusColor[$status] . '">' . $wording . '</span>';
}

function labelPaymentMethod($status, $wording)
{

    $arrayStatusColor = [
        -4 => '" style="background-color:#DF3126;',
        -3 => '" style="background-color:#A5A7BE;',
        -2 => '" style="background-color:#A5A7BE;',
        -1 => '" style="background-color:#A5A7BE;',
        0 => '" style="background-color:#24C041;',
        1 => '" style="background-color:#7C4DFF;',
        2 => '" style="background-color:#1c7dbd;',
        3 => '" style="background-color:#8D6E63;',
        4 => '" style="background-color:#E5662A;',
        5 => '" style="background-color:#F4ED49;',
        6 => '" style="background-color:#C4D0FA;',
        7 => '" style="background-color:#616161;',
        8 => 'style-success',
    ];

    return '<span class="label ' . $arrayStatusColor[$status] . '">' . $wording . '</span>';
}

function labelStatus($status, $wording)
{

    $arrayStatusColor = [
        -3 => 'style-gray-light',
        -2 => 'style-gray-light',
        -1 => 'style-danger',
        0 => 'label-danger',
        1 => '" style="background-color:#24C041;',
        2 => '" style="background-color:#607D8B;',
        3 => '" style="background-color:#8BC34A;',
        4 => '',
        5 => '" style="background-color:#0fcbfa;',
        6 => '" style="background-color:#1c7dbd;',
        7 => 'style-success',
        10 => 'style-success',
    ];

    return '<span class="label ' . $arrayStatusColor[$status] . '">' . $wording . '</span>';
}

function labelReason($status, $wording)
{

    $arrayStatusColor = [
        -2 => 'style-gray-light',
        -1 => 'style-danger',
        0 => '" style="background-color:#616161;',
        10 => '" style="background-color:#7C4DFF;',
        20 => '" style="background-color:#607D8B;',
        30 => '" style="background-color:#8BC34A;',
        40 => '" style="background-color:#1c7dbd;',
        50 => '" style="background-color:#4DD0E1;',
        5 => '" style="background-color:#0fcbfa;',
        6 => '" style="background-color:#1c7dbd;',
        7 => 'style-success',
    ];

    return '<span class="label ' . $arrayStatusColor[$status] . '">' . $wording . '</span>';
}

function badgeYesNo($status, $stage)
{
    if (!is_null($stage))
        $wording = $stage ? 'Yes' : 'No';
    else {
        $status = 'secondary';
        $wording = 'N/A';
    }

    return '<h5><span class="badge fw-normal text-bg-' . $status . ' text-white">' . $wording . '</span></h5>';
}

function badgeStatus($model)
{
    switch($model->status){
        case 20:
            $output = badge('success',$model->listStatus()[$model->status]);
            break;
        case 10:
            $output = badge('info',$model->listStatus()[$model->status]);
            break;
        case -1:
            $output = badge('danger',$model->listStatus()[$model->status]);
            break;
        case -2:
            $output = badge('warning',$model->listStatus()[$model->status]);
            break;
    }
    return $output ?? 'unknown';
}

function badge($status, $wording)
{
    return '<h5><span class="badge fw-normal text-bg-' . $status . ' text-white">' . $wording . '</span></h5>';
}




function labelGeo($geo, $wording)
{

    $arrayStatusColor = [
        0 => '" style="background-color:#616161;',
        1 => '" style="background-color:#7C4DFF;',
        2 => '" style="background-color:#607D8B;',
        3 => '" style="background-color:#8BC34A;',
        4 => '" style="background-color:#1c7dbd;',
        5 => '" style="background-color:#4DD0E1;',
        6 => '" style="background-color:#0fcbfa;',
        7 => '" style="background-color:#1c7dbd;',
        8 => 'style-success',
    ];

    return '<span class="label ' . $arrayStatusColor[$geo] . '">' . $wording . '</span>';
}

function driverName()
{
    return Yii::$app->db->driverName;
}

function isPg()
{
    return Yii::$app->db->driverName == 'pgsql';
}

function session()
{
    return Yii::$app->session;
}

function arabic2Thai($string)
{
    $string = str_replace('1', '๑', $string ?? '');
    $string = str_replace('2', '๒', $string ?? '');
    $string = str_replace('3', '๓', $string ?? '');
    $string = str_replace('4', '๔', $string ?? '');
    $string = str_replace('5', '๕', $string ?? '');
    $string = str_replace('6', '๖', $string ?? '');
    $string = str_replace('7', '๗', $string ?? '');
    $string = str_replace('8', '๘', $string ?? '');
    $string = str_replace('9', '๙', $string ?? '');
    $string = str_replace('0', '๐', $string ?? '');

    return $string;
}

//if (!function_exists('getallheaders'))
//{
//    function getallheaders()
//    {
//        $headers = '';
//        foreach ($_SERVER as $name => $value)
//        {
//
//            if (strpos($name,'COOKIE') !== false) {
//                continue;
//            }
//
//            if (substr($name, 0, 5) == 'HTTP_')
//            {
//                $k = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))));
//                if (!isset($headers[$k])) $headers[$k] = $value;
//
//            }
//        }
//        return $headers;
//    }
//}

function readNumber($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) {
        return $ret;
    }

    if ($number > 1000000) {
        $ret .= readNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }

    $divider = 100000;
    $pos = 0;
    while ($number > 0) {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : ((($divider == 10) && ($d == 1)) ? "" : ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
}

function BahtText($amount_number)
{
    $amount_number = number_format($amount_number, 2, ".", "");
    $pt = strpos($amount_number, ".");
    $number = $fraction = "";
    if ($pt === false) {
        $number = $amount_number;
    } else {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }

    $ret = "";
    $baht = readNumber($number);
    if ($baht == "") {
        $ret .= $baht . "ศูนย์บาท";
    }
    if ($baht != "") {
        $ret .= $baht . "บาท";
    }

    $satang = readNumber($fraction);
    if ($satang != "") {
        $ret .= $satang . "สตางค์";
    } else {
        $ret .= "ถ้วน";
    }

    return $ret;
}

function repeatGlobal($number, $letter = '&nbsp;')
{
    $output = "";
    for ($x = 0; $x <= $number - 1; $x++) {
        $output .= $letter;
    }
    return $output;
}


function citizenWithBlockGlobal($citizen)
{
    if ($citizen == '-') {
        return '';
    }

    if (strlen($citizen !== 13)) {
        return $citizen;
    }

    $citizenArr = str_split($citizen);
    return $citizenArr[0] . ' - ' . $citizenArr[1] . $citizenArr[2] . $citizenArr[3] . $citizenArr[4] . ' - ' . $citizenArr[5] . $citizenArr[6] . $citizenArr[7] . $citizenArr[8] . $citizenArr[9] . ' - ' . $citizenArr[10] . $citizenArr[11] . ' - ' . $citizenArr[12];
}

function citizenWithSpaceGlobal($citizen, $spacer)
{
    if (strlen($citizen) == 13) {
        $formatted = substr($citizen, 0, 1) . $spacer . substr($citizen, 1, 4) . $spacer . substr($citizen, 5, 5) . $spacer . substr($citizen, 10, 2) . $spacer . $citizen[12];
        return $formatted;
    }
    return $citizen;
}

function notApplicable()
{
    return '<small class="text-body-secondary">ไม่ได้ระบุ</small>';
}

function nullAble($value, $default = '<small class="text-body-secondary">ไม่ได้ระบุ</small>')
{
    return (is_null($value) || empty($value)) ? $default : $value;
}
