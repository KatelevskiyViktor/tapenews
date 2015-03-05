<?php 


class NewsController{
		public function actionAll(){
			/*echo NewsModel::getTable();
			die;(id-3)*/
			$db = new DB;
			$res = $db->query('SELECT * FROM newsInfo');
			var_dump($res);
			die;
			$items = news::getAll();
			$view = new view();
			$view->items = $items;
			$view->display('index_view.php');
		}
		public function actionOne(){
				$id = $_GET['id'];
				$items = news::getOne();
				$view = new view();
				/*Для себя, не обращайте внимания(id=2)!!!
				$view->assign('items', $items);*/
				$view->items = $items;
				$view->display('newspage_view.php');
			
		}
		
}

?>