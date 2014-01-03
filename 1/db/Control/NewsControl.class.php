<?php
//新闻控制器类
class NewsControl extends Control{
    function index(){
        header("Content-type:text/html;charset=utf-8");
        echo "<div style='Font:36px/38px 微软雅黑;margin:35px;color:#333;'>欢迎使用 <b>HDPHP新闻管理系统</b></div>";
    }
    function addNews(){
    	echo "添加新闻";
    	if(IS_POST){ // 是否按下了提交按钮
    		echo "往数据库插入...";
    		$db = M("news"); // 打开表news
    		P($_POST); // 在前台打印post变量的值
    		if($db->add()){
    			echo "添加成功！";
    			// $this->success("发表成功");  // 跳转到当前页
    			$this->success("发表成功",'show'); // 跳转到指定页
    		}else{
    			echo "添加失败！";
    			//$this->error("发表失败");
    			$this->error("发表失败",'show'); // 跳转到指定页
    		}
    	}else{
    		$this->display();//显示添加新闻界面,在Tpl内创建News/addNews.html
    		// db.php?c=News&m=addNews  db.php/News/addNews/
    	}
    	
    }
    function updateNews(){
    	echo "修改新闻";
    }
    function delNews(){
    	echo "删除新闻";
    }
    function show2(){
    	echo "显示新闻";
    	$db = M("news");
    	$data = $db->all(); // 取出所有数据
    	p($data);
    	$this->assign("news",$data); // 将$data的值分配至模板变量data
    	$this->display(); //显示新闻界面,在Tpl内创建News/show.html
    }
    /**
    * 分页显示
    */
    function show(){
    	$db = M("news");
    	$total = $db->count(); // 统计个数
    	$page = new Page($total,4); // 创建分页对象，一共有$total条，每页4条
    	//$news = $db->all($page->limit()); // 取出部分数据
    	$news = $db->where($page->limit())->all();

    	// p($news); // 测试取出的数据
    	$this->assign("news",$news);
    	$this->assign("page",$page->show()); // 将分页效果分配给前台页面
    	$this->display();
    }
}
?>