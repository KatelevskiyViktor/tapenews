<?php
abstract class AbstractModel
	implements IModel
{
		protected static $table;
		protected static $class;
		public static function getAll(){
		$db = new DB;
		return $db->query('SELECT * FROM '.static::$table.' ORDER BY date DESC', static::$class);	
	}
		public static function getOne(){
		$db = new DB;
		return $db->query('SELECT * FROM '.static::$table.' WHERE id='.$id=$_GET['id'], static::$class);	
	}
		public static function addNews(){
		$db = new DB;
		return $db->query("INSERT INTO ".static::$table." (title, date, text, img) VALUES('".$title = $_POST['title']."', '".$date = date('Y')."-".date('m')."-".date('d')."', '".$text = $_POST['text']."', '".$img = addImgFold('img')."')");
	}
}
?>