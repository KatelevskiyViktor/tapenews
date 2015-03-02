<?php 


class NewsController{
		public function actionAll(){
			$items = news::getAll();
			include __DIR__.'/../views/index_view.php';
		}
		public function actionOne(){
				$id = $_GET['id'];
				$items = news::getOne();
				include __DIR__.'/../views/newspage_view.php';
			
		}
		public function actionAddNews(){
			if(!empty($_POST['text']) && !empty($_POST['title']) && !empty($_FILES)){
				require_once __DIR__.'/../blocks/func_lib.php';
				$items = news::addNews();
			}
				include __DIR__.'/../views/add_view.php';
			
		}
}

?>