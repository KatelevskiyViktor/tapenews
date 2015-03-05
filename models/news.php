<?php

class news extends AbstractModel{
	public $id;
	public $title;
	public $date;
	public $text;
	public $img;
	
	protected static $table = 'newsInfo';
	protected static $class = 'news';
}
?>