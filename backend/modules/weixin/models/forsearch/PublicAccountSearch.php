<?php

namespace backend\modules\weixin\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\weixin\models\PublicAccount;

/**
 * PublicAccountSearch represents the model behind the search form about `backend\modules\weixin\models\PublicAccount`.
 */
class PublicAccountSearch extends PublicAccount
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'level'], 'integer'],
            [['name', 'header_img', 'qrcode_img', 'accountName', 'original', 'country', 'province', 'city', 'signature', 'access_token', 'hash', 'token', 'EncodingAESKey', 'username', 'password', 'key', 'secret', 'welcome', 'default'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PublicAccount::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'accountName', $this->accountName]);
        return $dataProvider;
    }
}
