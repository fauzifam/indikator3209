<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indikator".
 *
 * @property int $indikator_id
 * @property int $indikator_metadata_id
 * @property string $indikator_kategori
 * @property string $indikator_subjek
 * @property string $indikator_judul
 *
 * @property Metadata $indikatorMetadata
 * @property IndikatorTahun[] $indikatorTahuns
 */
class Indikator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indikator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['indikator_metadata_id', 'indikator_kategori', 'indikator_subjek', 'indikator_judul'], 'required'],
            [['indikator_metadata_id'], 'integer'],
            [['indikator_kategori'], 'string'],
            [['indikator_subjek'], 'string', 'max' => 255],
            [['indikator_judul'], 'string', 'max' => 1020],
            [['indikator_metadata_id'], 'exist', 'skipOnError' => true, 'targetClass' => Metadata::className(), 'targetAttribute' => ['indikator_metadata_id' => 'metadata_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'indikator_id' => 'ID',
            'indikator_metadata_id' => 'Metadata Indikator',
            'indikator_kategori' => 'Kategori',
            'indikator_subjek' => 'Subjek',
            'indikator_judul' => 'Judul',
        ];
    }

    /**
     * Gets query for [[IndikatorMetadata]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndikatorMetadata()
    {
        return $this->hasOne(Metadata::className(), ['metadata_id' => 'indikator_metadata_id']);
    }

    /**
     * Gets query for [[IndikatorTahuns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndikatorTahuns()
    {
        return $this->hasMany(IndikatorTahun::className(), ['indikator_id' => 'indikator_id']);
    }
}