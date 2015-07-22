<!-- page顶部 -->
<?php include(Yii::app()->basePath."/views/layouts/top.php");?>
<form class="form-horizontal" action="<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/update?op=<?php echo $op;?>" method="post">
  <ul class="nav nav-tabs" role="tablist" id="main-tablist">
      <li role="presentation" class="active"><a href="#patient" aria-controls="home" role="tab" data-toggle="tab">基本信息</a></li>
      <li role="presentation"><a href="#diagnostic" aria-controls="profile" role="tab" data-toggle="tab">诊断信息</a></li>
      <li role="presentation"><a href="#operation" aria-controls="messages" role="tab" data-toggle="tab">先心病介入手术</a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="patient">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">姓名</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="name" placeholder="姓名" value="<?php echo $patient['name'];?>" required autofocus>
              </div>
            </div>
            <div class="form-group">
              <label for="sex" class="col-sm-2 control-label">性别</label>
              <div class="col-sm-2">
                <?php foreach (Yii::app()->params['sex'] as $key => $value) { ?>
                <label class="radio-inline">
                  <input type="radio" name="sex" id="sex" value="<?php echo $key;?>" <?php echo $patient['sex'] == $key || (!$patient['sex'] && $key=='1') ? 'checked' : '';?>> <?php echo $value;?>
                </label>
                <?php } ?>
              </div>
            </div>
            <div class="form-group ">
              <label for="born" class="col-sm-2 control-label">出生日期</label>
              <div class="col-sm-3">
                <div class="input-group date">
                  <input class="form-control" type="text"  name="born" id="born" value="<?php echo $patient['born'] ? date('Y-m-d',$patient['born']) :'';?>" required >
                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group ">
              <label for="nationality" class="col-sm-2 control-label">民族</label>
              <div class="col-sm-2">
                <select class="form-control" id="nationality" name="nationality" required>
                  <?php foreach ($nationality as $key => $value) { ?>
                  <option value="<?php echo $value;?>" <?php echo $patient['nationality']==$key ? 'selected' : "";?>><?php echo $key;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group ">
              <label for="place" class="col-sm-2 control-label">籍贯</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="place" placeholder="籍贯" value="<?php echo $patient['place'];?>" required>
              </div>
            </div>
            <div class="form-group ">
              <label for="phone" class="col-sm-2 control-label">联系电话</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="联系电话" value="<?php echo $patient['phone'];?>" required>
              </div>
            </div>
            <div class="form-group ">
              <label for="address" class="col-sm-2 control-label">详细地址</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="address" placeholder="详细地址" value="<?php echo $patient['address'];?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="sex" class="col-sm-2 control-label">家族病史</label>
              <div class="col-sm-1">
                <select class="form-control" id="has_history" name="has_history">
                  <?php foreach ($have as $key => $value) { ?>
                  <option value="<?php echo $key;?>" <?php echo $patient['has_history'] == $key ? 'selected' : '';?> ><?php echo $value;?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-6"></div>
            </div>
            <div class="form-group ">
              <label for="height" class="col-sm-2 control-label">身高</label>
              <div class="col-sm-2">
                <div class="input-group">
                  <input type="number" class="form-control" name="height" placeholder="身高" aria-describedby="basic-addon-height" value="<?php echo $patient['height'];?>">
                  <span class="input-group-addon" id="basic-addon-height">cm</span>
                </div>
              </div>
            </div>
            <div class="form-group ">
              <label for="weight" class="col-sm-2 control-label">体重</label>
              <div class="col-sm-2">
                <div class="input-group">
                  <input type="number" class="form-control" name="weight" placeholder="体重" aria-describedby="basic-addon-weight" value="<?php echo $patient['weight'];?>">
                  <span class="input-group-addon" id="basic-addon-weight">kg</span>
                </div>
              </div>
            </div>
            <div class="form-group" style="<?php if( $op == 'add' || $op == 'edit') echo 'display:none;';?>">
              <label for="BMI" class="col-sm-2 control-label">BMI</label>
              <div class="col-sm-2">
                <input type="number" class="form-control" name="BMI" placeholder="BMI" value="<?php echo $patient['BMI'];?>" readonly>
              </div>
            </div>
            <div class="form-group ">
              <label for="follow_hospital" class="col-sm-2 control-label">随访医院</label>
              <div class="col-sm-4">
                <select class="form-control" id="follow_hospital" name="follow_hospital">
                  <?php foreach ($hospitals as $key => $value) { ?>
                  <option value="<?php echo $key;?>" <?php echo $patient['follow_hospital'] == $key || (!$patient['follow_hospital'] && $this->hospital == $key) ? 'selected' : "";?>><?php echo $value;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <!-- <div class="form-group ">
              <label for="hospital_no" class="col-sm-2 control-label">住院号</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="hospital_no" placeholder="住院号" value="<?php echo $patient['hospital_no'];?>">
              </div>
            </div> -->
          </div>
        </div>

      </div>
      <div role="tabpanel" class="tab-pane" id="diagnostic">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      心脏听诊
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="xztz_zy" class="col-sm-2 control-label">杂音</label>
                      <div class="col-sm-1">
                        <select class="form-control" id="xztz_zy" name="xztz_zy">
                          <?php foreach ($have as $key => $value) { ?>
                          <option value="<?php echo $key;?>" <?php echo $diagnostic['xztz_zy'] == $key ? 'selected' : '';?> ><?php echo $value;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="xztz_bw" class="col-sm-2 control-label">部位</label>
                      <div class="col-sm-6">
                        <?php foreach ($bw as $key => $value) { ?>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="xztz_bw[]" value="<?php echo $key; ?>" <?php echo $diagnostic['xztz_bw'] && in_array($key,$diagnostic['xztz_bw']) ? 'checked' : ''; ?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="xztz_sq" class="col-sm-2 control-label">时期</label>
                      <div class="col-sm-6">
                        <?php foreach ($sq as $key => $value) { ?>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="xztz_sq[]" value="<?php echo $key ?>" <?php echo $diagnostic['xztz_sq'] && in_array($key,$diagnostic['xztz_sq']) ? 'checked' : ''; ?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      可疑症象
                    </a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="kyzx_wykn" class="col-sm-2 control-label">喂养困难</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="kyzx_wykn" value="<?php echo $key;?>" <?php echo ($diagnostic['kyzx_wykn'] == $key) || (!$diagnostic['kyzx_wykn'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="kyzx_ffgm" class="col-sm-2 control-label">反复感冒、肺炎</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="kyzx_ffgm" value="<?php echo $key;?>" <?php echo ($diagnostic['kyzx_ffgm'] == $key) || (!$diagnostic['kyzx_ffgm'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="kyzx_tsmr" class="col-sm-2 control-label">特殊面容</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="kyzx_tsmr" value="<?php echo $key;?>" <?php echo ($diagnostic['kyzx_tsmr'] == $key) || (!$diagnostic['kyzx_tsmr'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="kyzx_hdnlc" class="col-sm-2 control-label">活动耐力差</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="kyzx_hdnlc" value="<?php echo $key;?>" <?php echo ($diagnostic['kyzx_hdnlc'] == $key) || (!$diagnostic['kyzx_hdnlc'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="kyzx_xxqlq" class="col-sm-2 control-label">心胸区隆起</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="kyzx_xxqlq" value="<?php echo $key;?>" <?php echo ($diagnostic['kyzx_xxqlq'] == $key) || (!$diagnostic['kyzx_xxqlq'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="kyzx_fg" class="col-sm-2 control-label">发绀</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="kyzx_fg" value="<?php echo $key;?>" <?php echo ($diagnostic['kyzx_fg'] == $key) || (!$diagnostic['kyzx_fg'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="kyzx_szfych" class="col-sm-2 control-label">生长发育迟缓</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="kyzx_szfych" value="<?php echo $key;?>" <?php echo ($diagnostic['kyzx_szfych'] == $key) || (!$diagnostic['kyzx_szfych'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="kyzx_hxjc" class="col-sm-2 control-label">呼吸急促</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="kyzx_hxjc" value="<?php echo $key;?>" <?php echo ($diagnostic['kyzx_hxjc'] == $key) || (!$diagnostic['kyzx_hxjc'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group ">
                      <div class="col-sm-2 col-sm-offset-2">
                        <div class="input-group">
                          <input type="number" class="form-control" name="kyzx_hxjc_ext"  aria-describedby="basic-addon-ci" value="<?php echo $diagnostic['kyzx_hxjc_ext'];?>">
                          <span class="input-group-addon" id="basic-addon-ci">次/分</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="kyzx_xdj" class="col-sm-2 control-label">喜蹲踞</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="kyzx_xdj" value="<?php echo $key;?>" <?php echo ($diagnostic['kyzx_xdj'] == $key) || (!$diagnostic['kyzx_xdj'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      经皮测氧数值 <span class="label label-primary">必填</span>
                    </a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    <div class="form-group ">
                      <label for="jpcysz_shou_1" class="col-sm-2 control-label">手(1)</label>
                      <div class="col-sm-2">
                        <div class="input-group">
                          <input type="number" class="form-control" name="jpcysz_shou_1" placeholder="" aria-describedby="basic-addon-shou1" value="<?php echo $diagnostic['jpcysz_shou_1'];?>" required>
                          <span class="input-group-addon" id="basic-addon-shou1">%</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="jpcysz_shou_1" class="col-sm-2 control-label">右足(1)</label>
                      <div class="col-sm-2">
                        <div class="input-group">
                          <input type="number" class="form-control" name="jpcysz_yz_1" placeholder="" aria-describedby="basic-addon-yz1" value="<?php echo $diagnostic['jpcysz_yz_1'];?>" required>
                          <span class="input-group-addon" id="basic-addon-yz1">%</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="jpcysz_shou_2" class="col-sm-2 control-label">手(2)</label>
                      <div class="col-sm-2">
                        <div class="input-group">
                          <input type="number" class="form-control" name="jpcysz_shou_2" placeholder="" aria-describedby="basic-addon-shou2" value="<?php echo $diagnostic['jpcysz_shou_2'];?>">
                          <span class="input-group-addon" id="basic-addon-shou2">%</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="jpcysz_shou_2" class="col-sm-2 control-label">右足(2)</label>
                      <div class="col-sm-2">
                        <div class="input-group">
                          <input type="number" class="form-control" name="jpcysz_yz_2" placeholder="" aria-describedby="basic-addon-yz2" value="<?php echo $diagnostic['jpcysz_yz_2'];?>">
                          <span class="input-group-addon" id="basic-addon-yz2">%</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="jpcysz_shou_3" class="col-sm-2 control-label">手(3)</label>
                      <div class="col-sm-2">
                        <div class="input-group">
                          <input type="number" class="form-control" name="jpcysz_shou_3" placeholder="" aria-describedby="basic-addon-shou3" value="<?php echo $diagnostic['jpcysz_shou_3'];?>">
                          <span class="input-group-addon" id="basic-addon-shou3">%</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="jpcysz_shou_1" class="col-sm-2 control-label">右足(3)</label>
                      <div class="col-sm-2">
                        <div class="input-group">
                          <input type="number" class="form-control" name="jpcysz_yz_3" placeholder="" aria-describedby="basic-addon-yz3" value="<?php echo $diagnostic['jpcysz_yz_3'];?>">
                          <span class="input-group-addon" id="basic-addon-yz3">%</span>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingFour">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      父母围孕产期不良事件 <span class="label label-primary">必填</span>
                    </a>
                  </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="fmwycqblsj_yzqgr" class="col-sm-2 control-label">孕早期感染</label>
                      <div class="col-sm-4">
                        <?php foreach ($notquite as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="fmwycqblsj_yzqgr" value="<?php echo $key;?>" <?php echo ($diagnostic['fmwycqblsj_yzqgr'] == $key) || (!$diagnostic['fmwycqblsj_yzqgr'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="fmwycqblsj_xy" class="col-sm-2 control-label">吸烟</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="fmwycqblsj_xy" value="<?php echo $key;?>" <?php echo ($diagnostic['fmwycqblsj_xy'] == $key) || (!$diagnostic['fmwycqblsj_xy'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="fmwycqblsj_dwjc" class="col-sm-2 control-label">毒物接触</label>
                      <div class="col-sm-4">
                        <?php foreach ($notquite as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="fmwycqblsj_dwjc" value="<?php echo $key;?>" <?php echo ($diagnostic['fmwycqblsj_dwjc'] == $key) || (!$diagnostic['fmwycqblsj_dwjc'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="fmwycqblsj_xj" class="col-sm-2 control-label">酗酒</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="fmwycqblsj_xj" value="<?php echo $key;?>" <?php echo ($diagnostic['fmwycqblsj_xj'] == $key) || (!$diagnostic['fmwycqblsj_xj'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="fmwycqblsj_sxjc" class="col-sm-2 control-label">射线接触</label>
                      <div class="col-sm-4">
                        <?php foreach ($notquite as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="fmwycqblsj_sxjc" value="<?php echo $key;?>" <?php echo ($diagnostic['fmwycqblsj_sxjc'] == $key) || (!$diagnostic['fmwycqblsj_sxjc'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingFive">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      心脏彩超 <span class="label label-primary">必填</span>
                    </a>
                  </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="xzcc_PDA" class="col-sm-2 control-label">PDA</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="xzcc_PDA" value="<?php echo $key;?>" <?php echo ($diagnostic['xzcc_PDA'] == $key) || (!$diagnostic['xzcc_PDA'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="xzcc_VSD" class="col-sm-2 control-label">VSD</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="xzcc_VSD" value="<?php echo $key;?>" <?php echo ($diagnostic['xzcc_VSD'] == $key) || (!$diagnostic['xzcc_VSD'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="xzcc_ASD" class="col-sm-2 control-label">ASD</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="xzcc_ASD" value="<?php echo $key;?>" <?php echo ($diagnostic['xzcc_ASD'] == $key) || (!$diagnostic['xzcc_ASD'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="xzcc_TFO" class="col-sm-2 control-label">TFO</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="xzcc_TFO" value="<?php echo $key;?>" <?php echo ($diagnostic['xzcc_TFO'] == $key) || (!$diagnostic['xzcc_TFO'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="xzcc_PS" class="col-sm-2 control-label">PS</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="xzcc_PS" value="<?php echo $key;?>" <?php echo ($diagnostic['xzcc_PS'] == $key) || (!$diagnostic['xzcc_PS'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="xzcc_Ebstein" class="col-sm-2 control-label">Ebstein畸形</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="xzcc_Ebstein" value="<?php echo $key;?>" <?php echo ($diagnostic['xzcc_Ebstein'] == $key) || (!$diagnostic['xzcc_Ebstein'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="xzcc_qt" class="col-sm-2 control-label">其他</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="xzcc_qt" value="<?php echo $key;?>" <?php echo ($diagnostic['xzcc_qt'] == $key) || (!$diagnostic['xzcc_qt'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group ">
                      <div class="col-sm-2 col-sm-offset-2">
                        <input type="text" class="form-control" name="xzcc_qt_ext" placeholder="" value="<?php echo $diagnostic['xzcc_qt_ext'];?>" >
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingSix">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                      其他畸形 <span class="label label-primary">必填</span>
                    </a>
                  </h4>
                </div>
                <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="qtjx" class="col-sm-2 control-label">其他畸形</label>
                      <div class="col-sm-2">
                        <?php foreach ($have as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="qtjx" value="<?php echo $key;?>" <?php echo ($diagnostic['qtjx'] == $key) || (!$diagnostic['qtjx'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group ">
                      <div class="col-sm-10 col-sm-offset-2">
                        <?php foreach ($qtjx as $key => $value) { ?>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="qtjx_ext[]" value="<?php echo $key; ?>" <?php echo $diagnostic['qtjx_ext'] && in_array($key,$diagnostic['qtjx_ext']) ? 'checked' : '';?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
      <div role="tabpanel" class="tab-pane" id="operation">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="panel-group" id="accordionOperation" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="operationHeadingZero">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordionOperation" href="#operationCollapseZero" aria-expanded="true" aria-controls="operationCollapseZero">
                      手术
                    </a>
                  </h4>
                </div>
                <div id="operationCollapseZero" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="operationHeadingZero">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="ssbh" class="col-sm-2 control-label">先心病介入手术</label>
                      <div class="col-sm-1">
                        <select class="form-control" id="xxbjrss" name="xxbjrss">
                          <?php foreach ($boolean as $key => $value) { ?>
                          <option value="<?php echo $key;?>" <?php echo $operation['xxbjrss'] == $key ? 'selected' : '';?> ><?php echo $value;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="operationHeadingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordionOperation" href="#operationCollapseOne" aria-expanded="true" aria-controls="operationCollapseOne">
                      手术基础信息
                    </a>
                  </h4>
                </div>
                <div id="operationCollapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="operationHeadingOne">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="ssbh" class="col-sm-2 control-label">手术编号</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="ssbh" placeholder="手术编号" value="<?php echo $operation['ssbh'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="sssj" class="col-sm-2 control-label">手术时间</label>
                      <div class="col-sm-3">
                        <div class="input-group date">
                          <input type="text" class="form-control" name="sssj" id="sssj" value="<?php echo $operation['sssj'] ? date('Y-m-d',$operation['sssj']) : '';?>">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="operationHeadingTwo">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordionOperation" href="#operationCollapseTwo" aria-expanded="false" aria-controls="operationCollapseTwo">
                      手术方式
                    </a>
                  </h4>
                </div>
                <div id="operationCollapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="operationHeadingTwo">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="ssfs_jrfd" class="col-sm-2 control-label">介入封堵</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ssfs_jrfd" value="<?php echo $key;?>" <?php echo ($operation['ssfs_jrfd'] == $key) || (!$operation['ssfs_jrfd'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ssfs_jrfd_qxmc" class="col-sm-2 control-label">器械名称</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="ssfs_jrfd_qxmc" placeholder="器械名称" value="<?php echo $operation['ssfs_jrfd_qxmc'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ssfs_jrfd_size" class="col-sm-2 control-label">size</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="ssfs_jrfd_size" placeholder="size" value="<?php echo $operation['ssfs_jrfd_size'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ssfs_wkkx" class="col-sm-2 control-label">外科开胸（根治手术、分次手术）</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ssfs_wkkx" value="<?php echo $key;?>" <?php echo ($operation['ssfs_wkkx'] == $key) || (!$operation['ssfs_wkkx'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ssfs_wxqkfd" class="col-sm-2 control-label">微笑切口封堵</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ssfs_wxqkfd" value="<?php echo $key;?>" <?php echo ($operation['ssfs_wxqkfd'] == $key) || (!$operation['ssfs_wxqkfd'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>


                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="operationHeadingThree">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordionOperation" href="#operationCollapseThree" aria-expanded="false" aria-controls="operationCollapseThree">
                      手术并发症
                    </a>
                  </h4>
                </div>
                <div id="operationCollapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="operationHeadingThree">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="ssbfz_rx" class="col-sm-2 control-label">溶血</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ssbfz_rx" value="<?php echo $key;?>" <?php echo ($operation['ssbfz_rx'] == $key) || (!$operation['ssbfz_rx'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ssbfz_cyl" class="col-sm-2 control-label">残余漏</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ssbfz_cyl" value="<?php echo $key;?>" <?php echo ($operation['ssbfz_cyl'] == $key) || (!$operation['ssbfz_cyl'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ssbfz_xlsc" class="col-sm-2 control-label">心律失常</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ssbfz_xlsc" value="<?php echo $key;?>" <?php echo ($operation['ssbfz_xlsc'] == $key) || (!$operation['ssbfz_xlsc'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ssbfz_xlsc_sxzb" class="col-sm-2 control-label">室性早搏</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="ssbfz_xlsc_sxzb" placeholder="室性早搏" value="<?php echo $operation['ssbfz_xlsc_sxzb'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ssbfz_xlsc_fscdzz" class="col-sm-2 control-label">房室传导阻滞</label>
                      <div class="col-sm-8">
                        <?php foreach ($xlsc as $key => $value) { ?>
                        <label class="radio-inline">
                          <input name="ssbfz_xlsc_fscdzz" type="radio" id="" value="<?php echo $key; ?>" <?php echo ($operation['ssbfz_xlsc_fscdzz'] == $key)  ? 'checked' : '';?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ssbfz_szcdzz" class="col-sm-2 control-label">束支传导阻滞</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ssbfz_szcdzz" value="<?php echo $key;?>" <?php echo ($operation['ssbfz_szcdzz'] == $key) || (!$operation['ssbfz_szcdzz'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ssbfz_fc" class="col-sm-2 control-label">房颤</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ssbfz_fc" value="<?php echo $key;?>" <?php echo ($operation['ssbfz_fc'] == $key) || (!$operation['ssbfz_fc'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ssbfz_Erosion" class="col-sm-2 control-label">Erosion</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ssbfz_Erosion" value="<?php echo $key;?>" <?php echo ($operation['ssbfz_Erosion'] == $key) || (!$operation['ssbfz_Erosion'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ssbfz_fdqtl" class="col-sm-2 control-label">封堵器脱落</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ssbfz_fdqtl" value="<?php echo $key;?>" <?php echo ($operation['ssbfz_fdqtl'] == $key) || (!$operation['ssbfz_fdqtl'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ssbfz_qt" class="col-sm-2 control-label">其他</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="ssbfz_qt" placeholder="其他" value="<?php echo $operation['ssbfz_qt'];?>">
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="operationHeadingFour">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordionOperation" href="#operationCollapseFour" aria-expanded="false" aria-controls="operationCollapseFour">
                      术后超声
                    </a>
                  </h4>
                </div>
                <div id="operationCollapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="operationHeadingFour">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="shcs_image" class="col-sm-2 control-label">影像上传</label>
                      <div class="col-sm-10">
                        <input type="file" class="file-loading" name="image" id="shcs_image">
                        <input type="hidden" value="<?php echo $operation['shcs_image'];?> " name="shcs_image" id="shcs_image_value">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="shcs_text" class="col-sm-2 control-label">文字描述</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="shcs_text" placeholder="其他" value="<?php echo $operation['shcs_text'];?>">
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="operationHeadingFive">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordionOperation" href="#operationCollapseFive" aria-expanded="false" aria-controls="operationCollapseFive">
                      术后随访
                    </a>
                  </h4>
                </div>
                <div id="operationCollapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="operationHeadingFive">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="shsf_date" class="col-sm-2 control-label">随访时间</label>
                      <div class="col-sm-3">
                        <div class="input-group date">
                          <input type="text" class="form-control" name="shsf_date" id="shsf_date" value="<?php echo $operation['shsf_date'] ? date('Y-m-d',$operation['shsf_date']) : '';?>">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="shsf_rx" class="col-sm-2 control-label">溶血</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="shsf_rx" value="<?php echo $key;?>" <?php echo ($operation['shsf_rx'] == $key) || (!$operation['shsf_rx'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="shsf_cyl" class="col-sm-2 control-label">残余漏</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="shsf_cyl" value="<?php echo $key;?>" <?php echo ($operation['shsf_cyl'] == $key) || (!$operation['shsf_cyl'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="shsf_xlsc" class="col-sm-2 control-label">心律失常</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="shsf_xlsc" value="<?php echo $key;?>" <?php echo ($operation['shsf_xlsc'] == $key) || (!$operation['shsf_xlsc'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="shsf_xlsc_sxzb" class="col-sm-2 control-label">室性早搏</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="shsf_xlsc_sxzb" placeholder="室性早搏" value="<?php echo $operation['shsf_xlsc_sxzb'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="shsf_xlsc_fscdzz" class="col-sm-2 control-label">房室传导阻滞</label>
                      <div class="col-sm-8">
                        <?php foreach ($xlsc as $key => $value) { ?>
                        <label class="radio-inline">
                          <input name="shsf_xlsc_fscdzz" type="radio" id="" value="<?php echo $key; ?>" <?php echo ($operation['shsf_xlsc_fscdzz'] == $key)  ? 'checked' : '';?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="shsf_szcdzz" class="col-sm-2 control-label">束支传导阻滞</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="shsf_szcdzz" value="<?php echo $key;?>" <?php echo ($operation['shsf_szcdzz'] == $key) || (!$operation['shsf_szcdzz'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="shsf_fc" class="col-sm-2 control-label">房颤</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="shsf_fc" value="<?php echo $key;?>" <?php echo ($operation['shsf_fc'] == $key) || (!$operation['shsf_fc'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="shsf_Erosion" class="col-sm-2 control-label">Erosion</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="shsf_Erosion" value="<?php echo $key;?>" <?php echo ($operation['shsf_Erosion'] == $key) || (!$operation['shsf_Erosion'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="shsf_fdqtl" class="col-sm-2 control-label">封堵器脱落</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="shsf_fdqtl" value="<?php echo $key;?>" <?php echo ($operation['shsf_fdqtl'] == $key) || (!$operation['shsf_fdqtl'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="shsf_qt" class="col-sm-2 control-label">其他</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="shsf_qt" placeholder="其他" value="<?php echo $operation['shsf_qt'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="shsf_cs_image" class="col-sm-2 control-label">超声影像</label>
                      <div class="col-sm-10">
                        <input type="file" class="file-loading" name="image" id="shsf_cs_image">
                        <input type="hidden" value="<?php echo $operation['shsf_cs_image'];?> " name="shsf_cs_image" id="shsf_cs_image_value">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="shsf_cs_text" class="col-sm-2 control-label">超声文字</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="shsf_cs_text" placeholder="其他" value="<?php echo $operation['shsf_cs_text'];?>">
                      </div>
                    </div>


                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
  </div>




<input name="code" type="hidden" value="<?php echo $patient['patient_code']; ?>">

<button id="submit" type="button" class="btn btn-default">下一步</button>
</form>
<button id="back" class="btn btn-default" onclick="javascript:history.back(-1);">返回</button>

<script type="text/javascript">
  $(document).ready(function(){
    //查看模式
    $('#back').hide();
    var op = '<?php echo $op;?>';
    if (op == 'view') {
      $('input,select').each(function(){
        $(this).attr('disabled','disabled');
      });
      $('#submit').hide();
      $('#back').show();
    }

  });
  $('#born').datepicker({
    format: "yyyy-mm-dd",
    clearBtn: true,
    language: "zh-CN"
  });
  $('#sssj').datepicker({
    format: "yyyy-mm-dd",
    clearBtn: true,
    language: "zh-CN"
  });
  $('#shsf_date').datepicker({
    format: "yyyy-mm-dd",
    clearBtn: true,
    language: "zh-CN"
  });

  $('#shcs_image').fileinput({
      language: 'zh',
      uploadAsync: true,
      uploadUrl: '<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/upload',
      maxFileCount: 1,
      initialPreviewShowDelete: false,
      <?php echo $operation['shcs_image'] ? 'initialPreview: ["<img src=\''.$operation['shcs_image'].'\' class=\'file-preview-image\'>",],initialPreviewConfig: [  {caption: "超声影像.jpg", width: "120px", url: "'.Yii::app()->request->baseUrl.'/admin/patient/uploadDel", key: 1},],' : ''; ?>

  });
  $('#shcs_image').on('fileuploaded', function(event, data, previewId, index) {
    if (data.response.code == 0) {
      $('#shcs_image_value').val(data.response.url)
    }else {
      alert('图片上传失败，请稍候再试');
    }
  });
  $('#shcs_image').on('filecleared', function(event) {
    $('#shcs_image_value').val('');
  });


  $('#shsf_cs_image').fileinput({
      language: 'zh',
      uploadAsync: true,
      uploadUrl: '<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/upload',
      maxFileCount: 1,
      initialPreviewShowDelete: false,
      <?php echo $operation['shsf_cs_image'] ? 'initialPreview: ["<img src=\''.$operation['shsf_cs_image'].'\' class=\'file-preview-image\'>",],initialPreviewConfig: [  {caption: "超声影像.jpg", width: "120px", url: "'.Yii::app()->request->baseUrl.'/admin/patient/uploadDel", key: 1},],' : ''; ?>
  });

  $('#shsf_cs_image').on('fileuploaded', function(event, data, previewId, index) {
    if (data.response.code == 0) {
      $('#shsf_cs_image_value').val(data.response.url)
    }else {
      alert('图片上传失败，请稍候再试');
    }
  });

  $('#shsf_cs_image').on('filecleared', function(event) {
    $('#shsf_cs_image_value').val('');
  });

  // 打开图片预览
  $('.file-preview-image').each(function() {
    $(this).click(function(){
      window.open($(this).attr('src'));
    });

  });

  $('#submit').click(function(){
    var href = $('#main-tablist li[class="active"] a').attr('href');
    if (href == '#patient') {
      $('#submit').text('下一步');
      $('#submit').attr('type','button');
      $('#main-tablist a[href="#diagnostic"]').tab('show');
      return false;
    }
    if (href == '#diagnostic') {

      $('#main-tablist a[href="#operation"]').tab('show');
      $('#submit').text('提交');
      $('#submit').attr('type','submit');
      return false;
    }
    var re = /^1\d{10}$/;
   if (!re.test($('#phone').val())){
     alert('手机号验证失败');
     return false;
   }

  });

  $('#main-tablist a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    var href = $(this).attr('href');
    if (href == '#patient') {
      $('#submit').text('下一步');
      $('#submit').attr('type','button');
    }
    if (href == '#diagnostic') {
      $('#submit').text('下一步');
      $('#submit').attr('type','button');
    }
    if (href == '#operation') {
      $('#submit').text('提交');
      $('#submit').attr('type','submit');
    }

  });
</script>
