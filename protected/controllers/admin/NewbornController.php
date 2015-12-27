<?php
/**
 *
 * 病人
 * @author flynn
 *
 */
class NewbornController extends Admin
{

	public function init()
	{
			parent::init();
			$this->currentMenu = '1010';
	}

	public function actionIndex()
	{
		$this->actionList();

	}

	public function actionList()
	{
		//参数
		$name = Yii::app()->request->getParam("name", '');
		$hospital = Yii::app()->request->getParam("hospital", '');
		$page = Yii::app()->request->getParam("page", 1);

		// 限制医院权限
		$mHospital = $this->_userInfo['hospital'];
		$shareModel = new ShareModel();
		$shareSet = $shareModel->getTargetSetByCode($mHospital);
		$inArray = array_keys($shareSet);

		$hospitalModel = new ConfigModel();
		$allHos = $hospitalModel->getSetByType(Yii::app()->params['configType']['hospital']);

		$hospitals = $allHos;
		//查询
		$c =  new CDbCriteria();
		if ($this->_userInfo['role'] > 0) {
			$c->addInCondition('hospital', $inArray);
			$hospitals = array();
			foreach ($inArray as $value) {
				$hospitals[$value] = $allHos[$value];
			}
		}

		if ($name) {
			$c->addSearchCondition('name',$name);
		}
		if ($hospital) {
			$c->addCondition('hospital='.$hospital);
		}

		//分页
		$start = ($page - 1) * $this->_pagesize;

		$patientModel = new PatientModel();
		//总数
		$total = $patientModel->count($c);

		//分页
		$pages = new CPagination($total);
		$pages->pageSize = Yii::app()->params['paginavtion']['pagesize'];
		$pages->route = '/admin/newborn/list';
		$pages->applyLimit($c);

		$c->order = "create_time desc";


		$list = $patientModel->getRows($c);
		// var_dump($list);
		// exit;

		// var_dump($list, $total);exit;
		$this->setPageTitle('新生儿病例列表');
		$this->render('list', array('list'=>$list, 'pages'=>$pages, 'hospitals' =>$hospitals,'shareSet'=>$shareSet));
	}

	public function actionAdd()
	{
		$configModel = new ConfigModel();
		$tcfs = $configModel->getSetByType(Yii::app()->params['configType']['tcfs']);
		$sq = $configModel->getSetByType(Yii::app()->params['configType']['xztz_sq']);
		$qtjx = $configModel->getSetByType(Yii::app()->params['configType']['qtjx']);
		$xlsc = $configModel->getSetByType(Yii::app()->params['configType']['xlsc']);
		$hospitals = $configModel->getSetByType(Yii::app()->params['configType']['hospital']);


		$this->setPageTitle('新生儿新增病例');
		$this->currentMenu = '1011';
		$this->render('edit',array(
			'nationality' => Yii::app()->params['nationality'],
			'have' => Yii::app()->params['have'],
			'boolean' => Yii::app()->params['boolean'],
			'notquite' => Yii::app()->params['notquite'],
			'tcfs' => $tcfs,
			'sq' => $sq,
			'qtjx' => $qtjx,
			'xlsc' => $xlsc,
			'hospitals' => $hospitals,
			'op' => 'add',
			));
	}

	public function actionEdit()
	{
		$patient_code = Yii::app()->request->getParam("code", '');
		$op = Yii::app()->request->getParam("op", '');
		if (!$patient_code) {
			// ID不存在

			exit;
		}

		$patientModel = new PatientModel();
		$patient = $patientModel->getRowByCode($patient_code);

		$diagModel = new DiagnosticModel();
		$diagnostic = $diagModel->getRowByCode($patient_code);
		if ($diagnostic) {
			$diagnostic['xztz_bw'] = explode(',',$diagnostic['xztz_bw']);
			$diagnostic['xztz_sq'] = explode(',',$diagnostic['xztz_sq']);
			$diagnostic['qtjx_ext'] = explode(',',$diagnostic['qtjx_ext']);

		}
		$operationModel = new OperationModel();
		$operation = $operationModel->getRowByCode($patient_code);


		$configModel = new ConfigModel();
		$bw = $configModel->getSetByType(Yii::app()->params['configType']['xztz_bw']);
		$sq = $configModel->getSetByType(Yii::app()->params['configType']['xztz_sq']);
		$qtjx = $configModel->getSetByType(Yii::app()->params['configType']['qtjx']);
		$xlsc = $configModel->getSetByType(Yii::app()->params['configType']['xlsc']);
		$hospitals = $configModel->getSetByType(Yii::app()->params['configType']['hospital']);


		$this->setPageTitle($op=='view'? '查看病历':'编辑病历');
		$this->render('edit',array(
			'patient' => $patient,
			'diagnostic' => $diagnostic,
			'operation' => $operation,
			'nationality' => Yii::app()->params['nationality'],
			'have' => Yii::app()->params['have'],
			'boolean' => Yii::app()->params['boolean'],
			'notquite' => Yii::app()->params['notquite'],
			'bw' => $bw,
			'sq'=> $sq,
			'qtjx'=> $qtjx,
			'xlsc'=> $xlsc,
			'hospitals' => $hospitals,
			'op' => $op,
			));
	}

	public function actionUpdate()
	{
		$op = Yii::app()->request->getParam('op', '');
		$code = Yii::app()->request->getPost('code', '');

		$name= Yii::app()->request->getPost("name", '');
		$sex = Yii::app()->request->getPost("sex", 2);
		$TL = Yii::app()->request->getPost("TL",'');
		$TS = Yii::app()->request->getPost("TS", '');
		$CSTZ = Yii::app()->request->getPost("CSTZ", '');
		$CSRQ = Yii::app()->request->getPost("CSRQ", '');
		$TCFS = Yii::app()->request->getPost("TCFS", '');
		$XSEPF = Yii::app()->request->getPost('XSEPF',0);
		$hospital = Yii::app()->request->getPost('hospital', '');
		$fllow_hospital = Yii::app()->request->getPost('fllow_hospital', '');

		//monther
		$CSNY = Yii::app()->request->getPost('CSNY', "");
		$MZ = Yii::app()->request->getPost('MZ', '');
		$ZY = Yii::app()->request->getPost('ZY');
		$WHCD = Yii::app()->request->getPost('WHCD');
		$JTNSR = Yii::app()->request->getPost('JTNSR');
		$CZD = Yii::app()->request->getPost('CZD');
		$YZ = Yii::app()->request->getPost('YZ');
		$HYNN = Yii::app()->request->getPost('HYNN');
		$YCCS = Yii::app()->request->getPost('YCCS');
		$YWRSJJ = Yii::app()->request->getPost('YWRSJJ');
		$CSQXYYS = Yii::app()->request->getPost('CSQXYYS');
		$MZ_INPUT = Yii::app()->request->getPost('MZ_INPUT');
		$ZY_INTPUT = Yii::app()->request->getPost('ZY_INTPUT');
		$CSQXYYS_INPUT = Yii::app()->request->getPost('CSQXYYS_INPUT');
		$SJQSNXXBS = Yii::app()->request->getPost('SJQSNXXBS');
		$SJQSNXXBS_INPUT = Yii::app()->request->getPost('SJQSNXXBS_INPUT');
		$JZYCBS = Yii::app()->request->getPost('JZYCBS');
		$JZYCBS_INPUT = Yii::app()->request->getPost('JZYCBS_INPUT');
		$JQHPS = Yii::app()->request->getPost('JQHPS');
		$JQHPS_INPUT = Yii::app()->request->getPost('JQHPS_INPUT');

		//father
		$CSNY = Yii::app()->request->getPost('CSNY');
		$MZ = Yii::app()->request->getPost('MZ');
		$MZ_INPUT = Yii::app()->request->getPost('MZ_INPUT');
		$ZY = Yii::app()->request->getPost('ZY');
		$ZY_INPUT = Yii::app()->request->getPost('ZY_INPUT');
		$WHCD = Yii::app()->request->getPost('WHCD');
		$CZD = Yii::app()->request->getPost('CZD');
		$BLXG = Yii::app()->request->getPost('BLXG');
		$BLXG_OPTION = Yii::app()->request->getPost('BLXG_OPTION');
		$BLXG_INPUT = Yii::app()->request->getPost('BLXG_INPUT');
		$YHWZJC = Yii::app()->request->getPost('YHWZJC');
		$YHWZJC_OPTION = Yii::app()->request->getPost('YHWZJC_OPTION');
		$YHWZJC_INPUT = Yii::app()->request->getPost('YHWZJC_INPUT');
		$JWBS = Yii::app()->request->getPost('JWBS');
		$JWBS_INPUT = Yii::app()->request->getPost('JWBS_INPUT');
		$JZYCBS = Yii::app()->request->getPost('JZYCBS');
		$JZYCBS_INPUT = Yii::app()->request->getPost('JZYCBS_INPUT');


		//调查表
		$KYZX = Yii::app()->request->getPost('KYZX');
		$KYZX_OPTION = Yii::app()->request->getPost('KYZX_OPTION');
		$XWJX = Yii::app()->request->getPost('XWJX');
		$XWJX_OPTION = Yii::app()->request->getPost('XWJX_OPTION');
		$XZTZ = Yii::app()->request->getPost('XZTZ');
		$XZTZ_BW_OPTION = Yii::app()->request->getPost('XZTZ_BW_OPTION');
		$XZTZ_SQ_OPTION = Yii::app()->request->getPost('XZTZ_SQ_OPTION');
		$XYBHD_CSS_YS = Yii::app()->request->getPost('XYBHD_CSS_YS');
		$XYBHD_CSS_YJ = Yii::app()->request->getPost('XYBHD_CSS_YJ');
		$XYBHD_CYQ_YS = Yii::app()->request->getPost('XYBHD_CYQ_YS');
		$XYBHD_CYQ_YJ = Yii::app()->request->getPost('XYBHD_CYQ_YJ');
		$XZTZFZJG = Yii::app()->request->getPost('XZTZFZJG');
		$XZTZFZJG_ZYBW_OPTION = Yii::app()->request->getPost('XZTZFZJG_ZYBW_OPTION');
		$XZTZFZJG_SQ_OPTION = Yii::app()->request->getPost('XZTZFZJG_SQ_OPTION');
		$XZCC = Yii::app()->request->getPost('XZCC');
		$XZCC_OPTION = Yii::app()->request->getPost('XZCC_OPTION');
		$QTJC = Yii::app()->request->getPost('QTJC');
		$QTJC_INPUT = Yii::app()->request->getPost('QTJC_INPUT');
		$CSZD_OPTION = Yii::app()->request->getPost('CSZD_OPTION');
		$CSZD_INPUT = Yii::app()->request->getPost('CSZD_INPUT');
		$BZ_INPUT = Yii::app()->request->getPost('BZ_INPUT');
		$KYZX_INPUT = Yii::app()->request->getPost('KYZX_INPUT');
		$XWJX_INPUT = Yii::app()->request->getPost('XWJX_INPUT');
		$XZCC_INPUT = Yii::app()->request->getPost('XZCC_INPUT');


		$YYMC = Yii::app()->request->getPost('YYMC');
		$YYKS = Yii::app()->request->getPost('YYKS');
		$ZYH = Yii::app()->request->getPost('ZYH');
		$CHXM = Yii::app()->request->getPost('CHXM');
		$JTZZ = Yii::app()->request->getPost('JTZZ');
		$LXDH_FQ = Yii::app()->request->getPost('LXDH_FQ');
		$LXDH_MQ = Yii::app()->request->getPost('LXDH_MQ');
		$DCBTP = Yii::app()->request->getPost('DCBTP');


		// echo '$name'.!$name;
		// echo '$sex'.!$sex;
		// echo '$born'.!$born;
		// echo '$nationality'.!$nationality;
		// echo '$place'.!$place;
		// echo '$phone'.!$phone;
		// echo '$address'.!$address;
		// echo '$has_history'.!$has_history;
		// exit;
		if (!$name || !$born || !$nationality || !$place || !$phone || !$address  ) {
			$this->_output(-1, '参数错误');
		}



		$patientModel = new PatientModel();
		$patientModel['name'] = $name;
		$patientModel['sex'] = $sex;
		$patientModel['born'] = strtotime($born);
		$patientModel['nationality'] = $nationality;
		$patientModel['place'] = $place;
		$patientModel['phone'] = $phone;
		$patientModel['address'] = $address;
		$patientModel['has_history'] = $has_history;
		$patientModel['height'] = $height;
		$patientModel['weight'] = $weight;
		$patientModel['BMI'] = $height > 0 ? $weight/pow($height/100,2) : 0;//体重(公斤) / 身高2(米2)
		$patientModel['hospital'] = $this->_userInfo['hospital'];
		$patientModel['follow_hospital'] = $follow_hospital;
		$patientModel['xxbjrss'] = $xxbjrss;
		$patientModel['create_time'] = time();

		$diagnosticModel = new DiagnosticModel();
		$diagnosticModel['xztz_zy'] = $xztz_zy;
		$diagnosticModel['xztz_bw'] = $xztz_bw ? join(',',$xztz_bw) : '';
		$diagnosticModel['xztz_sq'] = $xztz_sq ? join(',',$xztz_sq) : '';
		$diagnosticModel['kyzx_wykn'] = $kyzx_wykn;
		$diagnosticModel['kyzx_ffgm'] = $kyzx_ffgm;
		$diagnosticModel['kyzx_tsmr'] = $kyzx_tsmr;
		$diagnosticModel['kyzx_hdnlc'] = $kyzx_hdnlc;
		$diagnosticModel['kyzx_xxqlq'] = $kyzx_xxqlq;
		$diagnosticModel['kyzx_fg'] = $kyzx_fg;
		$diagnosticModel['kyzx_szfych'] = $kyzx_szfych;
		$diagnosticModel['kyzx_hxjc'] = $kyzx_hxjc;
		$diagnosticModel['kyzx_hxjc_ext'] = $kyzx_hxjc_ext;
		$diagnosticModel['kyzx_xdj'] = $kyzx_xdj;
		$diagnosticModel['jpcysz_shou_1'] = $jpcysz_shou_1;
		$diagnosticModel['jpcysz_yz_1'] = $jpcysz_yz_1;
		$diagnosticModel['jpcysz_shou_2'] = $jpcysz_shou_2;
		$diagnosticModel['jpcysz_yz_2'] = $jpcysz_yz_2;
		$diagnosticModel['jpcysz_shou_3'] = $jpcysz_shou_3;
		$diagnosticModel['jpcysz_yz_3'] = $jpcysz_yz_3;
		$diagnosticModel['fmwycqblsj_yzqgr'] = $fmwycqblsj_yzqgr;
		$diagnosticModel['fmwycqblsj_xy'] = $fmwycqblsj_xy;
		$diagnosticModel['fmwycqblsj_dwjc'] = $fmwycqblsj_dwjc;
		$diagnosticModel['fmwycqblsj_xj'] = $fmwycqblsj_xj;
		$diagnosticModel['fmwycqblsj_sxjc'] = $fmwycqblsj_sxjc;
		$diagnosticModel['xzcc_PDA'] = $xzcc_PDA;
		$diagnosticModel['xzcc_VSD'] = $xzcc_VSD;
		$diagnosticModel['xzcc_ASD'] = $xzcc_ASD;
		$diagnosticModel['xzcc_TFO'] = $xzcc_TFO;
		$diagnosticModel['xzcc_PS'] = $xzcc_PS;
		$diagnosticModel['xzcc_Ebstein'] = $xzcc_Ebstein;
		$diagnosticModel['xzcc_qt'] = $xzcc_qt;
		$diagnosticModel['xzcc_qt_ext'] = $xzcc_qt_ext;
		$diagnosticModel['qtjx'] = $qtjx;
		$diagnosticModel['qtjx_ext'] = $qtjx_ext ? join(',',$qtjx_ext) : '';


		$operationModel = new OperationModel();

		$operationModel['ssbh'] = $ssbh;
		$operationModel['sssj'] = strtotime($sssj);
		$operationModel['ssfs_jrfd'] = $ssfs_jrfd;
		$operationModel['ssfs_jrfd_qxmc'] = $ssfs_jrfd_qxmc;
		$operationModel['ssfs_jrfd_size'] = $ssfs_jrfd_size;
		$operationModel['ssfs_wkkx'] = $ssfs_wkkx;
		$operationModel['ssfs_wxqkfd'] = $ssfs_wxqkfd;
		$operationModel['ssbfz_rx'] = $ssbfz_rx;
		$operationModel['ssbfz_cyl'] = $ssbfz_cyl;
		$operationModel['ssbfz_xlsc'] = $ssbfz_xlsc;
		$operationModel['ssbfz_xlsc_sxzb'] = $ssbfz_xlsc_sxzb;
		$operationModel['ssbfz_xlsc_fscdzz'] = $ssbfz_xlsc_fscdzz;
		$operationModel['ssbfz_szcdzz'] = $ssbfz_szcdzz;
		$operationModel['ssbfz_fc'] = $ssbfz_fc;
		$operationModel['ssbfz_Erosion'] = $ssbfz_Erosion;
		$operationModel['ssbfz_fdqtl'] = $ssbfz_fdqtl;
		$operationModel['ssbfz_qt'] = $ssbfz_qt;
		$operationModel['shcs_image'] = $shcs_image;
		$operationModel['shcs_text'] = $shcs_text;
		$operationModel['shsf_date'] = strtotime($shsf_date);
		$operationModel['shsf_rx'] = $shsf_rx;
		$operationModel['shsf_cyl'] = $shsf_cyl;
		$operationModel['shsf_xlsc'] = $shsf_xlsc;
		$operationModel['shsf_xlsc_sxzb'] = $shsf_xlsc_sxzb;
		$operationModel['shsf_xlsc_fscdzz'] = $shsf_xlsc_fscdzz;
		$operationModel['shsf_szcdzz'] = $shsf_szcdzz;
		$operationModel['shsf_fc'] = $shsf_fc;
		$operationModel['shsf_Erosion'] = $shsf_Erosion;
		$operationModel['shsf_fdqtl'] = $shsf_fdqtl;
		$operationModel['shsf_qt'] = $shsf_qt;
		$operationModel['shsf_cs_image'] = $shsf_cs_image;
		$operationModel['shsf_cs_text'] = $shsf_cs_text;



		//更新
		if ($op == 'edit' && $code && $patient = $patientModel->getRowByCode($code)) {

			$patientModel['id'] = $patient['id'];
			$patientModel['patient_code'] = $patient['patient_code'];
			$patientModel['hospital'] = $patient['hospital'];
			$patientModel->update();

			if ($diagnostic = $diagnosticModel->getRowByCode($code))
			{
				$diagnosticModel['id'] = $diagnostic['id'];
				$diagnosticModel['patient_code'] = $patient['patient_code'];
				$diagnosticModel->update();
			}else {
				$diagnosticModel['patient_code'] = $patient['patient_code'];
				$diagnosticModel->setIsNewRecord(1);
				$diagnosticModel->save();
			}
			if ($operation = $operationModel->getRowByCode($code)) {
				$operationModel['id'] = $operation['id'];
				$operationModel['patient_code'] = $patient['patient_code'];
				$operationModel->update();
			}else {
				$operationModel['patient_code'] = $patient['patient_code'];
				$operationModel->setIsNewRecord(1);
				$operationModel->save();
			}

		}
		// 新增
		if($op == 'add')
		{

			$patientModel['patient_code'] = $this->getPatientCode();
			$patientModel->setIsNewRecord(1);

			$flag = $patientModel->save();

			$diagnosticModel['patient_code'] = $patientModel['patient_code'];
			$diagnosticModel->setIsNewRecord(1);
			$diagnosticModel->save();
			$operationModel['patient_code'] = $patientModel['patient_code'];
			$operationModel->setIsNewRecord(1);
			$operationModel->save();

		}

		$this->redirect(Yii::app()->getBaseUrl()."/admin/patient/list");

	}


	//上传图片
	public function actionUpload()
	{
		$uploadHandler = CUploadedFile::getInstanceByName('image');
		$path = Yii::app()->BasePath."/../assets/filestore/image/";
		$realname = Yii::app()->filestore->createRealName($path, $uploadHandler->name);
		if (!$uploadHandler->saveAs($realname))
		{
			$errmsg = $uploadHandler->getErrorMessage();
			echo json_encode(array('code' => -1,'error' => $errmsg));exit;
		}

		// //图片文件大小(最大宽度为720px)
		// $imageHandler = new Zebra_Image();
		// $imageHandler->source_path = $imageHandler->target_path = $realname;
		// if(!$imageHandler->resize(720, 0, ZEBRA_IMAGE_CROP_CENTER))
		// {
		// 	$errmsg = $imageHandler->getErrorMessage($imageHandler->error, $imageHandler->source_path, $imageHandler->target_path);
		// 	echo json_encode(array('error' => -6, 'message' => $errmsg));exit;
		// }

		//图片保存访问地址
		$url = Yii::app()->filestore->getUrl($realname);

		echo json_encode(array('code' => 0,'url' => $url));
		Yii::app()->end();
	}

	public function actionDel()
	{
		$code = Yii::app()->request->getParam('code', '');
		if (!isset($code)) {

			exit;
		}
		$operationModel = new OperationModel();
		$diagnosticModel = new DiagnosticModel();
		$patientModel = new PatientModel();

		$operationModel->deleteByCode($code);
		$diagnosticModel->deleteByCode($code);
		$patientModel->deleteByCode($code);

		$this->redirect(Yii::app()->getBaseUrl()."/admin/patient/list");
	}

	// 删除图片
	public function actionUploadDel()
	{

	}

	// 生成病人编号
	private function getPatientCode()
	{
		$code = $_SESSION['pid'];
		if (!isset($code)) {
			// 获取数据库中最大的patientid
			$patientModel = new PatientModel();
			$patient = $patientModel->getMaxPatientCode();
			if($patient){
				$code = $patient['patient_code'];
			}
		}
		if (!isset($code)) {
			$code = date('Ymd',time()).'0001';
		} else {
			// echo $code;
			// exit;
			$date = substr($code,0,8);
			if ($date == date('Ymd',time())) {
				$sequence = intval(substr($code,9));
				$sequence += 10001;
				$code = $date.substr(strval($sequence),1);
			} else {
				$code = date('Ymd',time()).'0001';
			}
		}
		$_SESSION['pid'] = $code;
		return $code;
	}

}
