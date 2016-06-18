<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class controller {

    public $see;
    public $data;
    public function __construct() {
       $view = new view();
       $this->see = $view->a; 
    }
    public function __set($name,$value){
        $this->data[$name] = $value;
    }
    public function assign($name,$value){
        $this->see->assign($name,$value);
    }
    public function display($tpl=NULL){
        global $controller,$action;
        //将data数据发送出去
        foreach($this->data as $name=>$value){
            $this->assign($name,$value);
        }
        if(empty($tpl)){
            $tpl = "frm/".$controller."/".$action;
        }
        $this->see->display($tpl.$GLOBALS['TPL_SUFFIX']);
    }
}
