<?php
namespace Application\Controllers; 
 
use Application\models\NewsModel;

class NewsController{
		public function actionAll(){
			/*echo NewsModel::getTable();
			die;(id-3)*/
			
				$items = NewsModel::findAll();
				$view = new \view();
				$view->items = $items; 
				$view->display('index_view.php');
				/*
				$mailer = new PHPMailer();
				$mailer->send();
				*/
			
		}
		public function actionOne(){
				$id = $_GET['id'];
				$items = NewsModel::findOne($id);
				$view = new \view();
				/*Для себя, не обращайте внимания(id=2)!!!
				$view->assign('items', $items);*/
				$view->items = $items;
				$view->display('newspage_view.php');
			
		}
		
}

?>