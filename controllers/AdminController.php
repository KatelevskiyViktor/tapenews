<?php 


class AdminController{
		
		public function actionAddNews(){
			if(!empty($_POST['text']) && !empty($_POST['title']) && !empty($_FILES)){
				require_once __DIR__.'/../blocks/func_lib.php';
				$items = news::addNews();
			}
				$view = new view();
				$view->assign('items', $items);
				$view->display('add_view.php');
		}
}

?>