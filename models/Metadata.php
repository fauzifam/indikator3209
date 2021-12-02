<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "metadata".
 *
 * @property int $metadata_id
 * @property string|null $metadata_text
 * @property string|null $metadata_kondef
 * @property string|null $metadata_kegunaan
 * @property string|null $metadata_interpretasi
 * @property string|null $metadata_sumber
 *
 * @property Indikator[] $indikators
 */
class Metadata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'metadata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['metadata_text', 'metadata_kondef', 'metadata_kegunaan', 'metadata_interpretasi', 'metadata_sumber'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'metadata_id' => 'Metadata ID',
            'metadata_text' => 'Judul',
            'metadata_kondef' => 'Konsep Definisi',
            'metadata_kegunaan' => 'Kegunaan',
            'metadata_interpretasi' => 'Interpretasi',
            'metadata_sumber' => 'Sumber',
        ];
    }

    /**
     * Gets query for [[Indikators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndikators()
    {
        return $this->hasMany(Indikator::className(), ['indikator_metadata_id' => 'metadata_id']);
    }
}
