<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

foreach(array_merge(include "frm/conf/conversion.php",include "app/conf/common.php") as $item=>$value){
    $GLOBALS[$item] = $value;
}
function __autoload($classname) {
    //按路径搜索
    $search_path = array("app/controller", "app/model");
    foreach ($search_path as $path) {
        //拼装完整路径
        $full_path = $path . "/{$classname}.class.php";
        if (file_exists($full_path)) {
            require $full_path;
        }
    }
}

//产生一个模型对象
function D($model) {
    require_once "app/model/{$model}.class.php";
    return new $model();
}

require_once frm."/Model.class.php";
require_once frm."/View.class.php";
require_once frm."/Controller.class.php";

$controller = isset($_GET['controller']) ? $_GET['controller'] : "user";
$action = isset($_GET['action']) ? $_GET['action'] : "index";

$c = new $controller();
$c->$action();
