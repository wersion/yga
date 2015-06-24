<?php

namespace backend\base;

class BaseModule extends \yii\base\Module {
	public function init() {
		parent::init ();
		$this->layout = '/main';
	}
}
