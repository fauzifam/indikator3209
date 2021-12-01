<?php

namespace app\models;

use Codeception\Step\Meta;
use Yii;

/**
 * This is the model class for table "indikator".
 *
 * @property int $indikator_id
 * @property int $indikator_metadata_id
 * @property string $indikator_kategori
 * @property string $indikator_subjek
 * @property string $indikator_judul
 * @property float|null $indikator_2015
 * @property float|null $indikator_2016
 * @property float|null $indikator_2017
 * @property float|null $indikator_2018
 * @property float|null $indikator_2019
 * @property float|null $indikator_2020
 * @property float|null $indikator_2021
 * @property float|null $indikator_2022
 * @property float|null $indikator_2023
 * @property float|null $indikator_2024
 * @property float|null $indikator_2025
 *
 * @property Metadatum $indikatorMetadata
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
            [['indikator_2015', 'indikator_2016', 'indikator_2017', 'indikator_2018', 'indikator_2019', 'indikator_2020', 'indikator_2021', 'indikator_2022', 'indikator_2023', 'indikator_2024', 'indikator_2025'], 'number'],
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
            'indikator_id' => 'Indikator ID',
            'indikator_metadata_id' => 'Indikator Metadata ID',
            'indikator_kategori' => 'Indikator Kategori',
            'indikator_subjek' => 'Indikator Subjek',
            'indikator_judul' => 'Indikator Judul',
            'indikator_2015' => 'Indikator 2015',
            'indikator_2016' => 'Indikator 2016',
            'indikator_2017' => 'Indikator 2017',
            'indikator_2018' => 'Indikator 2018',
            'indikator_2019' => 'Indikator 2019',
            'indikator_2020' => 'Indikator 2020',
            'indikator_2021' => 'Indikator 2021',
            'indikator_2022' => 'Indikator 2022',
            'indikator_2023' => 'Indikator 2023',
            'indikator_2024' => 'Indikator 2024',
            'indikator_2025' => 'Indikator 2025',
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
}
