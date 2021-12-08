<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "berita".
 *
 * @property int $berita_id
 * @property int $berita_user
 * @property string $berita_daterilis
 * @property string $berita_text
 * @property string $berita_photo
 * @property string $berita_body
 * @property string $berita_active
 */
class Berita extends \yii\db\ActiveRecord
{
    public $berita_uploadfoto;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berita';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['berita_daterilis', 'berita_text', 'berita_photo', 'berita_body', 'berita_active'], 'required'],
            [['berita_user'], 'safe'],
            [['berita_uploadfoto'], 'file'],
            [['berita_user'], 'integer'],
            [['berita_daterilis'], 'safe'],
            [['berita_text', 'berita_photo', 'berita_body', 'berita_active'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'berita_id' => 'Berita ID',
            'berita_user' => 'Pembuat Berita',
            'berita_daterilis' => 'Tanggal',
            'berita_text' => 'Judul Berita',
            'berita_uploadfoto' => 'Foto Berita',
            'berita_photo' => 'Foto Berita',
            'berita_body' => 'Isi Berita',
            'berita_active' => 'Status Berita',
        ];
    }
}
