<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    
        <div>
            
            <table class="table">
    <tbody>
        <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><tr>
        <th class="text-r" width="80">姓名：</th>
        <td><?php echo ($v["uname"]); ?></td>
      </tr>
      <tr>
        <th class="text-r">手机：</th>
        <td>13000000000</td>
      </tr>
      <tr>
        <th class="text-r">邮箱：</th>
        <td>admin@mail.com</td>
      </tr>
      <tr>
        <th class="text-r">地址：</th>
        <td>北京市 海淀区</td>
      </tr>
      <tr>
        <th class="text-r">注册时间：</th>
        <td>2014.12.20</td>
      </tr>
      <tr>
        <th class="text-r">积分：</th>
        <td>330</td>
      </tr><?php endforeach; endif; ?>
    </tbody>
  </table>
        </div>
      
    </body>
</html>