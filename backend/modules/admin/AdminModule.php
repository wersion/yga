<?php

namespace backend\modules\admin;
use backend\base\BaseModule;

class AdminModule extends BaseModule {
	public $controllerNamespace = 'backend\modules\admin\controllers';
	public function init() {
		parent::init ();
		// custom initialization code goes here
	}
}
