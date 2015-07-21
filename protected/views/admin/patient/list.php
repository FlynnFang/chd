<!-- page顶部 -->
<?php include(Yii::app()->basePath."/views/layouts/top.php");?>

<a role="button" class="btn btn-primary" style="margin-bottom:10px;" href="<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/add">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 新增
</a>

<div class="panel panel-default">
  <div class="panel-body">
    <form class="navbar-form navbar-left" role="search" action="<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/list" method="get">
      <div class="form-group">
        <label for="hospital">所属医院</label>
        <select class="form-control" name='hospital' select>
          <?php foreach ($hospitals as $key=>$value) {?>
            <option value="<?php echo $key; ?>"<?php echo $key == Yii::app()->request->getParam('hospital', '') ? ' selected="selected"':''; ?>><?php echo $value; ?></option>
            <?php }?>
          </select>
        </div>
        <div class="form-group">
          <label for="name">姓名</label>
          <input name="name" type="text" class="form-control" placeholder="姓名" value="<?php echo Yii::app()->request->getParam('name', ''); ?>">
        </div>

        <button type="submit" class="btn btn-default">检索</button>
      </form>
</div>

<div class="table-responsive">
  <table class="table  table-striped table-hover ">
    <thead>
      <tr>
        <th>编号</th>
        <th>姓名</th>
        <th>性别</th>
        <th>出生日期</th>
        <!-- <th>名族</th>
        <th>籍贯</th> -->
        <th>联系电话</th>
        <!-- <th>详细地址</th>
        <th>是否有家族病史</th>
        <th>身高(cm)</th>
        <th>体重(kg)</th>
        <th>BMI</th>
        <th>住院号</th> -->
        <th>建档医院</th>
        <th>建档日期</th>
        <th>随访医院</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list as $item) {?>
      <tr>
        <th><?php echo $item['patient_code'];?></th>
        <th><?php echo $item['name'];?></th>
        <th><?php echo Yii::app()->params['sex'][$item['sex']];?></th>
        <th><?php echo  date('Y-m-d',$item['born']);?></th>
        <!-- <th><?php echo $item['nationality'];?></th>
        <th><?php echo $item['place'];?></th> -->
        <th><?php echo $item['phone'];?></th>
        <!-- <th><?php echo $item['address'];?></th>
        <th><?php echo Yii::app()->params['have'][$item['has_history']];?></th>
        <th><?php echo $item['height'];?></th>
        <th><?php echo $item['weight'];?></th>
        <th><?php echo $item['BMI'];?></th>
        <th><?php echo $item['hospital_no'];?></th> -->
        <th><?php echo $hospitals[$item['hospital']];?></th>
        <th><?php echo date('Y-m-d',$item['create_time']);?></th>
        <th><?php echo $hospitals[$item['follow_hospital']];?></th>
        <th>
          <div class="btn-group" role="group" aria-label="...">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/edit?op=edit&code=<?php echo $item['patient_code']; ?>" role="button" class="btn btn-primary">编辑</a>
            <button type="button" class="btn btn-danger">删除</button>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/edit?op=view&code=<?php echo $item['patient_code']; ?>" role="button" class="btn btn-info">查看</a>
          </div>
        </th>
      </tr>
      <?php }?>

    </tbody>
  </table>
  </div>
</div>
  <nav>
    <?php $this->widget('BootLinkPager',array('pages' => $pages));?>
  </nav>
