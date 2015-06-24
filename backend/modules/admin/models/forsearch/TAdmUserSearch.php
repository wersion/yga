<?php

namespace backend\modules\admin\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\admin\models\TAdmUser;

/**
 * TAdmUserSearch represents the model behind the search form about `backend\models\TAdmUser`.
 */
class TAdmUserSearch extends TAdmUser {
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [ 
				[['uid'],'integer'],
				[['username','password'],'safe'
				] 
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function scenarios() {
		// bypass scenarios() implementation in the parent class
		return Model::scenarios ();
	}
	
	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params        	
	 * @return ActiveDataProvider
	 */
	public function search($params) {
		$query = TAdmUser::find ();
		
		$dataProvider = new ActiveDataProvider ( [ 
				'query' => $query 
		] );
		
		if (! ($this->load ( $params ) && $this->validate ())) {
			return $dataProvider;
		}
		
		$query->andFilterWhere ( [ 
				'uid' => $this->uid 
		] );
		
		$query->andFilterWhere ( [ 
				'like','username',$this->username 
		] )->andFilterWhere ( [ 
				'like','password',$this->password 
		] );
		
		return $dataProvider;
	}
}
