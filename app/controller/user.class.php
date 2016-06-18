<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class user extends controller {

    public function index() {
        $user = D("userModel");
        $rows = $user->select();

        //发送数据

        $this->rows=$rows;
        //驱动模板显示内容
        try {
            $this->display();
        } catch (SmartyCompilerException $ex) {
            echo $ex->getMessage();
        }
    }
    public function edit(){
        $user = D("userModel");
        $rows = $user->where(array("id"=>$_GET['id']))->select();
        $row = $rows[0];
        //发送数据
        $this->row=$row;
        //驱动模板显示内容
        $this->display();
    }
    public function update(){
        $user = D("userModel");
        if($user->create()==false){
            exit($user->getError());
        }
        $affected_rows = $user->where(array("id"=>$_POST['id']))->save();
        echo "修改成功，影响行数为".$affected_rows."<a href='index.php'>返回</a>";
    }
}
