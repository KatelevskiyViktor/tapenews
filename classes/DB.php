<?php
class DB{
	private $dbh;
	private $className = 'stdClass';
	public function __construct(){
		/*mysql_connect('localhost', 'root', '');
		mysql_select_db('news');(id-0)*/
		
		$this->dbh = new PDO('mysql:dbname=news;host=localhost','root','');
		
	}
	
	public function setClassName($className){
		$this->className = $className;
	}
	
	public function query($sql, $params=[]){
		$sth = $this->dbh->prepare($sql);
		$sth->execute($params);
		return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
	}
	
	public function execute($sql, $params=[]){
		$sth = $this->dbh->prepare($sql);
		return $sth->execute($params);
		
	}
	
	public function lastIsertId(){
		return $thid->dbh->lastIsertId();
	}
	/*public function query($sql, $class = 'stdClass'){
		$res = mysql_query($sql);
		if(false === $res){
			return false;	
		}
		else if($res === true){
			return true;
		}
		$ret = [];
		while($row = mysql_fetch_object($res, $class)){
			$ret[] = $row;	
		}
		return $ret;
	}*/
}
?>