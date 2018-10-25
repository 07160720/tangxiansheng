<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <style type="text/css">
        #select{}
        #select input{vertical-align: middle;margin: 0;}
        #select span{vertical-align: middle;margin: 0;padding: 0;}
        .paging{text-align: center;margin-top: 20px;margin-bottom:40px;color: #555555;font-size: 13px;}
        .paging a{display: inline-block;text-align: center;text-decoration: none;color: #555555;border:1px solid #CCCCCC;padding:2px 8px 2px 8px;}
        .paging a.current{border:1px solid #008080;background: #80BDCB;}
        .paging a:hover{background:#80BDCB;border:1px solid #008080;}
        .paging input[type="text"]{text-align: center;height: 12px;}
        
    </style>
</head>
<body >

    <p id="select">
        &nbsp;<span>全选</span>
        <input type="checkbox"  onclick="selectAll(this, 'checkboxes')" />&nbsp;
        <input type="submit" id="btnSubmit" disabled="true" value="删除选中项" />
        <input type="hidden" name="act" value="deleteAll" />
    </p>
    <?php
 //上下页
    echo '
    <div class="paging" >
            
            <span>共'.$sum.'条</span>
            <a href="'.$_SERVER['PHP_SELF'].'?page=1&&search_cat='.@$_GET['search_cat'].'&&keyword='.@$_GET['keyword'].'" > 首页</a>
            <a href="'.$_SERVER['PHP_SELF'].'?page='.($page-1).'&&search_cat='.@$_GET['search_cat'].'&&keyword='.@$_GET['keyword'].'" > 上一页</a>&nbsp;';
    if($pageSum < $item){ /**总页数小于5*/
        for ($i = 1; $i <= $pageSum; $i++){
            if($page == $i){
                echo '<a  href="'.$_SERVER['PHP_SELF'].'?page='.$i.'&&search_cat='.@$_GET['search_cat'].'&&keyword='.@$_GET['keyword'].'"  class="current"> '.$i.'</a>&nbsp;';
                continue;
            }
            echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'&&search_cat='.@$_GET['search_cat'].'&&keyword='.@$_GET['keyword'].'" > '.$i.'</a>&nbsp;';
        }
    }elseif($pageSum > $item){/**总页数大于5 */ 
        if ($page < $item){//小于等于4行操作 
            for ($i = 1; $i <= $item; $i++){
                if($page == $i){
                    echo '<a class="current" href="'.$_SERVER['PHP_SELF'].'?page='.$i.'&&search_cat='.$_GET[search_cat].'&&keyword='.$_GET['keyword'].'" > '.$i.'</a>&nbsp;';
                    continue;
                }
                echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'&&search_cat='.$_GET[search_cat].'&&keyword='.$_GET['keyword'].'" > '.$i.'</a>&nbsp;';
            }
            echo '...&nbsp;';
        }elseif ($item <= $page && $page < $pageSum-1 ){//大于4行操作
            for ($i = $page-2; $i <= $page+2; $i++){
                if($page == $i){
                    echo '<a class="current"  href="'.$_SERVER['PHP_SELF'].'?page='.$i.'&&search_cat='.$_GET[search_cat].'&&keyword='.$_GET['keyword'].'" > '.$i.'</a>&nbsp;';
                    continue;
                }
                echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'&&search_cat='.$_GET[search_cat].'&&keyword='.$_GET['keyword'].'" > '.$i.'</a>&nbsp;';
            }
            echo '...&nbsp;';
        }else {//最后两页操作
            for ($i = $pageSum-4; $i <= $pageSum; $i++){
                if($page == $i){
                    echo '<a class="current" href="'.$_SERVER['PHP_SELF'].'?page='.$i.'&&search_cat='.$_GET[search_cat].'&&keyword='.$_GET['keyword'].'" > '.$i.'</a>&nbsp;';
                    continue;
                }
                echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'&&search_cat='.$_GET[search_cat].'&&keyword='.$_GET['keyword'].'" > '.$i.'</a>&nbsp;';
            }
        }
    }
            
      echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.($page+1).'&&search_cat='.@$_GET['search_cat'].'&&keyword='.@$_GET['keyword'].'" >下一页</a>   
            <a href="'.$_SERVER['PHP_SELF'].'?page='.$pageSum.'&&search_cat='.@$_GET['search_cat'].'&&keyword='.@$_GET['keyword'].'" >尾页 </a>
        
            <span id="pageSum" sum="'.$pageSum.'">共'.$pageSum.'页, 到第</span>
            <input type="text" id="toPage" value="'.$page.'" size="1" />
            页
            <input type="button" value="确定" onclick="goPage()"/>
        
    </div>';
    
    
    
    ?>
</body>
</html>