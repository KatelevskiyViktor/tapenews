<?php
class AbstractModel{
		protected static $table;
		protected static $class;
		public static function getAll(){
		$db = new DB;
		return $db->query('SELECT * FROM '.static::$table.' ORDER BY date DESC', static::$class);	
	}
}
?>