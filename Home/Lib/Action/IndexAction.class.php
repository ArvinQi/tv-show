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
		    $supplier_log=M('supplier_log');
        $data = $supplier_log->query("SELECT SUM(sup) sum, DATE_FORMAT(FROM_UNIXTIME( `regTime`),'%y年%m月') sdate FROM `j_supplier_log` where regTime>1451577600 and supFrom like '%导入%' GROUP BY sdate");
        foreach($data as $key=>$va){
          array_push($da['category'],$va[sdate]);
          array_push($da['data'],$va[sum]);

        }
				echo json_encode($da);
    }
    public function inteRT(){
        $timestamp = $_GET['time']? $_GET['time'] : time(date('Y-m-d'));
        $supplier_log=M('supplier_log');
        $data = $supplier_log->query("SELECT SUM(sup) SUM FROM j_supplier_log WHERE regTime > ".$timestamp." AND supFrom NOT LIKE '%导入%' AND supFrom NOT LIKE '%测试%'");

        echo json_encode($data);
    }
}