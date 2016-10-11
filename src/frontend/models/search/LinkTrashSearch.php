<?php

namespace frontend\models\search;

use common\models\Link;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * LinkSearch represents the model behind the search form about `common\models\Link`.
 */
class LinkTrashSearch extends Link
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'createdAt', 'updatedAt'], 'integer'],
            [['title', 'titleColor', 'linkUrl', 'imageUrl', 'deleted', 'expireDate'], 'safe'],
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
        $query = Link::find()
            ->deleted();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'expireDate' => $this->expireDate,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'titleColor', $this->titleColor])
            ->andFilterWhere(['like', 'linkUrl', $this->linkUrl])
            ->andFilterWhere(['like', 'imageUrl', $this->imageUrl]);

        return $dataProvider;
    }
}
