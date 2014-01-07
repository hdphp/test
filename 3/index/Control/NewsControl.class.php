<?php
//文章控制器类
class NewsControl extends Control{
	// 模型对象
	private $_db; // 模型对象变量
	public function __init(){ // 初始化，构造函数，hdphp专有
		$this->_db = K('news'); //将NewsModel实例化一个对象
		// K比M功能更强大，扩展性强，可以自由添加方法
		// M 也是实例化模型，但只有增删改查操作
	}
    function index(){
        header("Content-type:text/html;charset=utf-8");
        echo "文章显示";
    }
    function content(){
    	$db = M("news");
    	p($db->find(2));
    }
}
?>