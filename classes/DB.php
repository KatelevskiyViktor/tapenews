<?php
class DB{
	private $dbh;
	
	public function __construct(){
		/*mysql_connect('localhost', 'root', '');
		mysql_select_db('news');(id-0)*/
		
		$this->dbh = new PDO('mysql:dbname=news;host=localhost','root','');
		
	}
	public function query($sql, $params=[]){
		$sth = $this->dbh->prepare($sql);
		$sth->execute($params);
		return $sth->fetchAll();
		
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