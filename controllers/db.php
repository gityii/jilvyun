<?php 
/* @author Skina
 * 数据库操作
 * */
namespace  base\controllers;

class db {
	private static $conn;
	private static $isconnect = false;
	private static $isconfigset = false;
	private static $config = array(
	'db_host'=>'localhost',
	'db_port'=>'3306',
	'db_user'=>'root',
	'db_pswd'=>'',
	'db_db'=>'myframe',
	'db_err_connect_fail'=>'can\'t connect to database'
	);
	
	private function __construct() {
	}
	
	public static function configinit(){
		if (!self::$isconfigset){
			global $_CONFIG;
			self::configset($_CONFIG['db']);
		}
	}
	public static function configset($configdata = array()){
		if (self::$isconfigset){
			return false;
		}
		self::$isconfigset = true;
		self::$config = array_merge(self::$config,$configdata);
	}
	
	private static function db_conn() {  //创建数据库连接
		$return = false;
		if (!self::$isconnect){
			self::configinit();
			if (!@self::$conn=mysqli_connect(self::$config['db_host'],self::$config['db_user'],self::$config['db_pswd'],self::$config['db_db'],self::$config['db_port'])) {
                exit(self::$config['db_err_connect_fail']);
				die();
			}
			if (self::$conn) {
				mysqli_query(self::$conn,'set names \'UTF8\'');
			}
			$return = true;
			self::$isconnect = true;
		}
		return $return;
	}

	private static function db_close_conn() {  //关闭数据库连接
		if(self::$isconnect) {
			mysqli_close(self::$conn);
			self::$isconnect = false;
		}
	}
	
	public static function query_get($sql) {//运行SQL语句   返回执行结果(二维数组[结果序列][列名])
		self::db_conn();
		$row = array();
		if(self::$conn && $sql && $result=mysqli_query(self::$conn,$sql)) {
			while ($r = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
				$row[] = $r;
			}
			mysqli_free_result($result);
		}
		return $row;
	}
	
    public static function update($table='',$value,$condition='') {  //修改$table表数据  $value为索引与$table表中字段名相对应的数组   $condition为执行条件  为空时则修改所有数据
		self::db_conn();
    	if(self::$conn && $table && $value) {
			$sql = $tg = '';
			foreach ($value as $k=>$kv)
			{
				$sql.=$tg.'`'.$k.'`=\''.$kv.'\'';
				$tg = ',';
			}
			$sql='UPDATE '.$table.' SET '.$sql.($condition?' WHERE '.$condition:'');
			if(mysqli_query(self::$conn,$sql)) {
				return true;
			}else {
				return false;
			}
		}
	}
	
	public static function insert($table='',$value=array(),$insert_id=false) {    //往$table表中中插入数据   $value为索引与$table表中字段名相对应的数组
		self::db_conn();
		if($table) {
			$sql = $sk = $sv = $tg = '';
			if (isset($value[0])){
				$sk = '`'.implode('`,`',$value[0]).'`';
				foreach ($value[1] as $v){
					$sv .= $tg.'(\''.implode('\',\'',$v).'\')';
					$tg = ',';
				}
				$sql='INSERT INTO '.$table.' ( '.$sk.' ) VALUES '.$sv;

			}else {
				$sk = '`'.implode('`,`',array_keys($value)).'`';
				$sv = '\''.implode('\',\'',$value).'\'';
				$sql='INSERT INTO '.$table.' ( '.$sk.' ) VALUES ( '.$sv.' ) ';
			}
			if (mysqli_query(self::$conn,$sql)) {
				return $insert_id?mysqli_insert_id(self::$conn):true;
			}else {
				return $insert_id?0:false;
			}
		}
	}
	
	public static function insert_id(){
		return mysqli_insert_id(self::$conn);
	}
	
	public static function key($table='') {   //往$table表中中插入数据   $value为索引与$table表中字段名相对应的数组
		self::db_conn();
		$i = 0;
		if($table && mysqli_query(self::$conn,'INSERT INTO '.$table.' () VALUES ()')) {
			$i = mysqli_insert_id(self::$conn);
		}
		return $i?$i:0;
	}
	
	
	public static function delete($table='',$condition='') {   //删除$table表中满足$condition条件的数据，$condition为All时删除表中所有数据
		self::db_conn();
		if ($table && mysqli_query(self::$conn,($condition=='')?'DELETE FROM `'.$table.'`':'DELETE FROM `'.$table.'` WHERE '.$condition) ) {
			return true;
		}else {
			return false;
		}
	}	
	
    public static function first($sql) {
    	self::db_conn();
		$row = array();
		$result='';
		$result=self::$conn && $sql?mysqli_query(self::$conn,$sql.' limit 0,1'):false;
		if($result && $r=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$row=$r;
			mysqli_free_result($result);
		}
		return $row;
	}
	
	public static function query($sql) {
		self::db_conn();
		if(self::$conn && $sql!='' && mysqli_query(self::$conn,$sql)){
			return true;
		}else{
			return false;
		}
	}
	
	public static function row_exist($table,$where = ''){
		self::db_conn();
		$r = 0;
		if(self::$conn && $result = mysqli_query(self::$conn,'select 1 from `'.$table.'`'.self::where($where).' limit 1')){
			$r = mysqli_num_rows($result);
			mysqli_free_result($result);
		}
		return $r===0?false:true;
	}
	
	public static function count($tablename,$where=''){
		self::db_conn();
		$result = self::first('SELECT count(*) FROM '.$tablename.self::where($where));
		if (!empty($result)){
			return intval($result['count(*)']);
		}else {
			return 0;
		}
	}
	
	public static function table($tablename,$prepend='`',$append='`'){
		self::configinit();
		return $prepend.$tablename.$append;
	}
	
	public static function a(){
		return self::db_conn();
	}
	
	public static function z(){
		self::db_close_conn();
	}
	
	private static function where($where){
		$return = '';
		if (is_array($where)){
			$l = array();
			foreach ($where as $k=>$v){
				$l[] = '`'.$k.'`=\''.$v.'\'';
			}
			$return = implode(' and ',$l);
		}else {
			$return = $where;
		}
		return $return == '' ? '' : ' WHERE '.$return;
	}
}