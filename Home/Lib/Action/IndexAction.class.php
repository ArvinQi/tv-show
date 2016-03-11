<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        $this->display();
    }
    public function inte(){
        $da=array();
        $da['category'] = array();
        $da['data'] = array();
		    $inte=M('supplier_log');
        $data = $inte->query("SELECT SUM(sup) sum, DATE_FORMAT(FROM_UNIXTIME( `regTime`),'%y年%m月') sdate  FROM `j_supplier_log` GROUP BY sdate");
        foreach($data as $key=>$va){
          array_push($da['category'],$va[sdate]);
          array_push($da['data'],$va[sum]);

        }
				echo json_encode($da);
    }
}