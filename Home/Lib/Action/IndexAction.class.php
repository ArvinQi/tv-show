<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        $this->display();
    }
    public function inte(){
        //$data=array();
		    $inte=M('supplier_log');
        $data = $inte->query("SELECT SUM(sup), DATE_FORMAT(FROM_UNIXTIME( `regTime`),'%y年%m月') sdate  FROM `j_supplier_log` GROUP BY sdate");
        for(var i = 0; i < $data.length; i++){

        }
				echo json_encode($data);
    }
}