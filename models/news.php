<?php

class news extends AbstractModel{
	public $id;
	public $title;
	public $date;
	public $text;
	public $img;
	
	protected static $table = 'newsInfo';
	protected static $class = 'news';
	
	public static function getOne(){
		$db = new DB;
		return $db->query('SELECT * FROM newsInfo WHERE id='.$id=$_GET['id'], 'news');	
		
	}
	public static function addNews(){
		$db = new DB;
		return $db->query("INSERT INTO newsInfo(title, date, text, img) VALUES('".$title = $_POST['title']."', '".$date = date('Y')."-".date('m')."-".date('d')."', '".$text = $_POST['text']."', '".$img = addImgFold('img')."')");
	}
}
?>