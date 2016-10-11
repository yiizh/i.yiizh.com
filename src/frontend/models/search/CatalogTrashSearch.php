<?php

namespace frontend\models\search;

use common\models\Catalog;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CatalogSearch represents the model behind the search form about `common\models\Catalog`.
 */
class CatalogTrashSearch extends Catalog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parentId', 'linkCount', 'createdAt', 'updatedAt'], 'integer'],
            [['name', 'content', 'seoTitle', 'seoKeywords', 'seoDescription', 'imageUrl', 'deleted'], 'safe'],
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
        $query = Catalog::find()
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
            'parentId' => $this->parentId,
            'linkCount' => $this->linkCount,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'seoTitle', $this->seoTitle])
            ->andFilterWhere(['like', 'seoKeywords', $this->seoKeywords])
            ->andFilterWhere(['like', 'seoDescription', $this->seoDescription])
            ->andFilterWhere(['like', 'imageUrl', $this->imageUrl])
            ->andFilterWhere(['like', 'deleted', $this->deleted]);

        return $dataProvider;
    }
}
