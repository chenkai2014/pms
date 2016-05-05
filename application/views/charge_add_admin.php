<div class="container">
    <div class="row">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="/index.php/member_admin/index">用户管理</a></li>
            <li role="presentation"><a href="/index.php/carport_admin/index">停车位管理</a></li>
            <li role="presentation"><a href="/index.php/repair_admin/index">报修管理</a></li>
            <li role="presentation"><a href="/index.php/charge_admin/index">缴费管理</a></li>
            <li role="presentation"><a href="/index.php/building_admin/index">楼宇管理</a></li>
            <li role="presentation"><a href="/index.php/house_admin/index">住户管理</a></li>
            <li role="presentation"><a href="/index.php/complain_admin/index">投诉管理</a></li>
            <li role="presentation"><a href="/index.php/Welcome/logout">登出</a></li>
            <li role="presentation" class="active"><a href="/index.php/charge_admin/add">增加缴费</a></li>
        </ul>
    </div>
    <div class="row">
      <form method="post" action="/index.php/charge_admin/save">
          <div class="form-group">缴费类型：<?php
              echo '<select class="form-control" name="type_id">';
              foreach($charge_type_list as $key=>$charge_type_info){
                  echo '<option value="'.$charge_type_info['type_id'].'" >'.$charge_type_info['type_name'].'</option>';
              }
              echo '</select>';
              ?></div>
          <div class="form-group">房间名：<?php
              echo '<select class="form-control" name="house_id">';
              foreach($house_list as $key=>$house_info){
                  echo '<option value="'.$house_info['house_id'].'" >'.$house_info['house_name'].'</option>';
              }
              echo '</select>';
              ?></div>
          <div class="form-group">单据填写人员：<input class="form-control" type="text" name="handleName" ></div>
          <div class="form-group">单据编号：<input class="form-control" type="text" name="invoiceNum" ></div>
          <div class="form-group">缴费金额：<input class="form-control" type="text" name="paymentMoney" ></div>
          <div class="form-group">备注：<input class="form-control" type="text" name="remark" ></div>
          <div class="form-group"><input class="form-control btn-success" type="submit" name="添加" ></div>
      </form>
    </div>
</div>