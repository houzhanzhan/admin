<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            X-admin v1.0
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="./css/x-admin.css" media="all">
    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>会员管理</cite></a>
              <a><cite>产品管理</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
            <xblock><a href="?r=category/category_list_add"><button class="layui-btn layui-btn-danger" ><i class="layui-icon"></i>添加</button></a><span class="x-right" style="line-height:40px">共有数据：<?php echo $count?> 条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>商品ID</th>
                        <th>商品名称</th>
                        <th>年化利率</th>
                        <th>计划金额</th>
                        <th>已投金额 </th>
                        <th>投资期限</th>
                        <th>产品状态</th>
                        <th>产品开始时间</th>
                        <th>产品结束时间</th>
                        <th>回款方式</th>
                        <th>产品添加时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody id="x-link">

                <?php foreach($data as $k=>$v){?>
                    <tr>
                        <td><?php echo $v['id']?></td>
                        <td><?php echo $v['product_name']?></td>
                        <td><?php echo $v['rate']?></td>
                        <td><?php echo $v['product_amount']?></td>
                        <td><?php echo $v['actual_amount']?></td>
                        <td><?php echo $v['deadling']?></td>
                        <td>
                            <?php if($v['product_status']==1){?>
                                <span class="layui-btn layui-btn-normal layui-btn-mini">即将上线</span>
                            <?php }elseif($v['product_status']==2){?>
                                <span class="layui-btn layui-btn-small layui-btn-mini">正在募集</span>
                            <?php }elseif($v['product_status']==3){?>
                                <span class="layui-btn layui-btn-warm layui-btn-mini">正在回款</span>
                            <?php }else{?>
                                <span class="layui-btn layui-btn-danger layui-btn-mini">回款完毕</span>
                            <?php }?>
                        </td>
                        <td><?php echo date('Y-m-d H:i:s',$v['start_time'])?></td>
                        <td><?php echo date('Y-m-d H:i:s',$v['end_time'])?></td>
                        <td>
                            <?php if($v['repayment']==1){?>
                                <span class="layui-btn layui-btn-normal layui-btn-mini">等额本息</span>
                            <?php }elseif($v['repayment']==2){?>
                                <span class="layui-btn layui-btn-small layui-btn-mini">按月付息</span>
                            <?php }else{?>
                                <span class="layui-btn layui-btn-danger layui-btn-mini">到期还本</span>
                            <?php }?>
                        </td>
                        <td><?php echo date('Y-m-d H:i:s',$v['add_time'])?></td>
                        <td class="td-manage"><a title="删除" href="?r=category/category_list_del&id=<?php echo $v['id']?>" onclick="commemt_del(this,'1')" style="text-decoration:none"><i class="layui-icon">&#xe640;</i></a></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>

            <div id="page"></div>
        </div>
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script>
//            alert(1);
        </script>
        <script src="./js/x-layui.js" charset="utf-8"></script>
        <script>
            layui.use(['element','laypage','layer','form'], function(){
                $ = layui.jquery;//jquery
              lement = layui.element();//面包导航
              laypage = layui.laypage;//分页
              layer = layui.layer;//弹出层
              form = layui.form();//弹出层


          })

              

              //以上模块根据需要引入

            //批量删除提交
             function delAll () {
                layer.confirm('确认要删除吗？',function(index){
                    //捉到所有被选中的，发异步进行删除
                    layer.msg('删除成功', {icon: 1});
                });
             }
            
            
            /*删除*/
            function commemt_del(obj,id){
                layer.confirm('确认要删除吗？',function(index){
                    //发异步删除数据
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                });
            }
            </script>
            <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </body>
</html>