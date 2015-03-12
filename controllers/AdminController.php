<?php 
namespace Application\Controllers; 

class AdminController{
		public $items;
		public function actionAddNews(){
			if(!empty($_POST['text']) && !empty($_POST['title']) && !empty($_FILES)){
				require_once __DIR__.'/../blocks/func_lib.php';
				$article = new NewsModel();
				$article->title = $_POST['title'];
				$article->date = date('Y')."-".date('m')."-".date('d');
				$article->text = $_POST['text'];
				$article->img = addImgFold('img');
				$this->items = $article->insert();
				
			}
			
				$view = new \view();
				$view->items = $this->items;
				$view->display('add_view.php');
				
}
		public function actionUpdNews(){
			if(!empty($_POST['text']) && !empty($_POST['title']) && !empty($_FILES)){
				require_once __DIR__.'/../blocks/func_lib.php';
				$article = new NewsModel();
				$article->title = $_POST['title'];
				$article->date = date('Y')."-".date('m')."-".date('d');
				$article->text = $_POST['text'];
				$article->img = addImgFold('img');
				$article->id = $_POST['id'];
				$this->items = $article->update();
				
			}
}
}
?>