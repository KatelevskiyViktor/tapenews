<?php
abstract class AbstractModel
	/*implements IModel*/
{
		protected static $table;
		protected $data = [];
		public function __set($key, $val){
			$this->data[$key] = $val;
		}
		
		public function __get($key){
			return $this->data[$key];
		}
		
		public function __isset($key){
			return isset($this->data[$k]);
		}
	
	public static function findAll(){
		$class = get_called_class();// Возвращает имя класса который метод будет использовать
		$sql = 'SELECT * FROM ' . static::$table . ' ORDER BY date DESC';
		$db = new DB();
		$db->setClassName($class);
		$res = $db->query($sql);
		if(empty($res)){
			throw new E404Exception('Не были извлечены данные из базы');
		}
		return $res;
	}
	
	public static function findOne($id){
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
		$db = new DB();
		$res = $db->query($sql, [':id' => $id]);
		if(empty($res)){
			throw new E404Exception('Не были извлечены данные из базы');
		}
		return $res;
	}
	
	protected function insert(){
		$cols = array_keys($this->data);
		$data = [];
		foreach($cols as $col){
			$data[':'.$col] = $this->data[$col];
		}
		$sql = 'INSERT INTO ' . static::$table . '('.implode(', ', $cols).') VALUES ('.implode(', ', array_keys($data)).') ';
		
		$db = new DB();
		$db->execute($sql, $data);
		$this->id = $db->lastInsertId();
		
		
	}
	
	protected function update(){
		
		$data = [];
		$cols = [];
		foreach($this->data as $k => $v){
			$data[':'.$k] = $v;
			if('id' == $k){
				continue;
			}
			$cols[] = $k . '=:' . $k;
		}
		
		$sql = 'UPDATE ' . static::$table . ' SET '.implode(', ', $cols).' WHERE id=:id';
		$db = new DB();
		$db->execute($sql, $data);
		
	}
	
	public function save(){
		if(!isset($this->id)){
			$this->insert();
		}else{
			$this->update();
		}
	}
	
	public static function delete($id){
		$sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
		$db = new DB();
		return $db->query($sql, [':id' => $id]);
	}
	
	public static function findByColumn($column, $value){
		$db = new DB();
		$db->setClassName(get_called_class());
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' = :value';
		$res = $db->query($sql, [':value' => $value]);
		
		if(empty($res)){
			throw new E404Exeption('404');
		}
		return $res;
		
	}
		/*protected static $class;
		public static function getAll(){
		$db = new DB;
		return $db->query('SELECT * FROM '.static::$table.' ORDER BY date DESC', static::$class);	
	}
		/*public static function getOne(){
		$db = new DB;
		return $db->query('SELECT * FROM '.static::$table.' WHERE id='.$id=$_GET['id'], static::$class);	
	}
		public static function addNews(){
		$db = new DB;
		return $db->query("INSERT INTO ".static::$table." (title, date, text, img) VALUES('".$title = $_POST['title']."', '".$date = date('Y')."-".date('m')."-".date('d')."', '".$text = $_POST['text']."', '".$img = addImgFold('img')."')");
	}*/
	
}
?>