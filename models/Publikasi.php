<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "publikasi".
 *
 * @property int $publikasi_id
 * @property string $publikasi_judul
 * @property string|null $publikasi_nokatalog
 * @property string|null $publikasi_nobuku
 * @property string $publikasi_daterilis
 * @property string $publikasi_ukuran
 * @property string $publikasi_deskripsi
 */
class Publikasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publikasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publikasi_judul', 'publikasi_daterilis', 'publikasi_ukuran', 'publikasi_deskripsi'], 'required'],
            [['publikasi_daterilis'], 'safe'],
            [['publikasi_deskripsi'], 'string'],
            [['publikasi_judul'], 'string', 'max' => 1020],
            [['publikasi_nokatalog', 'publikasi_nobuku'], 'string', 'max' => 255],
            [['publikasi_ukuran'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'publikasi_id' => 'Publikasi ID',
            'publikasi_judul' => 'Publikasi Judul',
            'publikasi_nokatalog' => 'Publikasi Nokatalog',
            'publikasi_nobuku' => 'Publikasi Nobuku',
            'publikasi_daterilis' => 'Publikasi Daterilis',
            'publikasi_ukuran' => 'Publikasi Ukuran',
            'publikasi_deskripsi' => 'Publikasi Deskripsi',
        ];
    }
}
