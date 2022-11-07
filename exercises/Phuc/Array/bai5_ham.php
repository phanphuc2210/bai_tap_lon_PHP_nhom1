<?php
function taoMang($n) {
    //tạo mảng có n phần tử, các phần tử có giá trị [0,20]
    $arr = array();

    for($i=0;$i<$n;$i++) {
        $x=rand(0,20);
        $arr[$i]=$x;
    }

    return $arr;
}

function xuatMang($arr) {
    $mang_str = "";
    foreach($arr as $i) {
        $mang_str .= $i."  ";
    }

    return $mang_str;
}

function timMax($arr) {
    $max = $arr[0];
    foreach($arr as $i) {
        if($max < $i) {
            $max = $i;
        }
    }

    return $max;
}

function timMin($arr) {
    $min = $arr[0];
    foreach($arr as $i) {
        if($min > $i) {
            $min = $i;
        }
    }

    return $min;
}

function tong($arr) {
    $sum = 0;
    foreach($arr as $i){
        $sum += $i;
    }

    return $sum;
}