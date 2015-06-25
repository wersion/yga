<?php

namespace backend\modules\weixin\models\forsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\weixin\models\Wechats;

/**
 * WechatsSearch represents the model behind the search form about `backend\modules\weixin\models\Wechats`.
 */
class WechatsSearch extends Wechats
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['weid', 'type', 'uid', 'level', 'default_period', 'lastupdate', 'styleid', 'parentid'], 'integer'],
            [['hash', 'token', 'EncodingAESKey', 'access_token', 'name', 'account', 'original', 'signature', 'country', 'province', 'city', 'username', 'password', 'welcome', 'default', 'default_message', 'key', 'secret', 'payment', 'shortcuts', 'quickmenu', 'subwechats', 'siteinfo', 'menuset', 'groups', 'accountlink', 'jsapi_ticket'], 'safe'],
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
        $query = Wechats::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'weid' => $this->weid,
            'type' => $this->type,
            'uid' => $this->uid,
            'level' => $this->level,
            'default_period' => $this->default_period,
            'lastupdate' => $this->lastupdate,
            'styleid' => $this->styleid,
            'parentid' => $this->parentid,
        ]);

        $query->andFilterWhere(['like', 'hash', $this->hash])
            ->andFilterWhere(['like', 'token', $this->token])
            ->andFilterWhere(['like', 'EncodingAESKey', $this->EncodingAESKey])
            ->andFilterWhere(['like', 'access_token', $this->access_token])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'account', $this->account])
            ->andFilterWhere(['like', 'original', $this->original])
            ->andFilterWhere(['like', 'signature', $this->signature])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'welcome', $this->welcome])
            ->andFilterWhere(['like', 'default', $this->default])
            ->andFilterWhere(['like', 'default_message', $this->default_message])
            ->andFilterWhere(['like', 'key', $this->key])
            ->andFilterWhere(['like', 'secret', $this->secret])
            ->andFilterWhere(['like', 'payment', $this->payment])
            ->andFilterWhere(['like', 'shortcuts', $this->shortcuts])
            ->andFilterWhere(['like', 'quickmenu', $this->quickmenu])
            ->andFilterWhere(['like', 'subwechats', $this->subwechats])
            ->andFilterWhere(['like', 'siteinfo', $this->siteinfo])
            ->andFilterWhere(['like', 'menuset', $this->menuset])
            ->andFilterWhere(['like', 'groups', $this->groups])
            ->andFilterWhere(['like', 'accountlink', $this->accountlink])
            ->andFilterWhere(['like', 'jsapi_ticket', $this->jsapi_ticket]);

        return $dataProvider;
    }
}
