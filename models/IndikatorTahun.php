<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indikator_tahun".
 *
 * @property int $indikator_id
 * @property string $indikator_tahun
 * @property float $indikator_nilai
 * @property string $indikator_satuan
 *
 * @property Indikator $indikator
 */
class IndikatorTahun extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indikator_tahun';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['indikator_tahun', 'indikator_nilai', 'indikator_satuan'], 'required'],
            [['indikator_id'], 'integer'],
            [['indikator_nilai'], 'number'],
            [['indikator_tahun'], 'string', 'max' => 4],
            [['indikator_satuan'], 'string', 'max' => 100],
            [['indikator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Indikator::className(), 'targetAttribute' => ['indikator_id' => 'indikator_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'indikator_id' => 'Indikator ID',
            'indikator_tahun' => 'Indikator Tahun',
            'indikator_nilai' => 'Indikator Nilai',
            'indikator_satuan' => 'Indikator Satuan',
        ];
    }

    /**
     * Gets query for [[Indikator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndikator()
    {
        return $this->hasOne(Indikator::className(), ['indikator_id' => 'indikator_id']);
    }
}
