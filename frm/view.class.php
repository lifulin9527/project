<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class view{
    public  $a;
    function __construct(){
        //引入模板
        require_once "frm/libs/Smarty.class.php";
        //实例化模板
        $smarty = new Smarty();
        //设置配置项
        $smarty->left_delimiter = "{";
        $smarty->right_delimiter = "}";
        //设置配置文件存放目录
        $smarty->template_dir = "frm/view";
        //设置编译文件存放目录
        $smarty->compile_dir = "app/runtime/tmp";
        $this->a = $smarty;
    }
    
}
