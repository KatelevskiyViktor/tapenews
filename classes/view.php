<?php
	class view
		implements Iterator{
		protected $data = [];
		
		/*Для себя, не обращайте внимания(id=2)!!!
		public function assign($name, $value){
			$this->data[$name] = $value;
		}*/
		
		public function __set($key, $val){
			$this->data[$key] = $val;
		}
		
		public function __get($key){
			return $this->data[$key];
		}
		
		public function render($template){
			foreach($this->data as $key => $val){
				$$key = $val;
			}
			ob_start();
			include __DIR__.'/../views/view_pages/'.$template;
			$content = ob_get_contents();
			ob_end_clean();
			
			return $content;
		}
		public function display($template){
			echo $this->render($template);
		}
		/* это для себя, не обращайте внимания!!!(id=2)
		public function display($template){
			foreach($this->data as $key => $val)
			{
				$$key = $val;
			}
			include __DIR__.'/../views/view_pages/'.$template;
		}*/
		
		public function current(){
			
		}
		
		public function next(){
			
		}
		
		public function key(){
			
		}
		
		public function valid(){
			
		}
		
		public function rewind(){
			
		}
	}
?>