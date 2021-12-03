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
 * @property string $publikasi_filename
 * @property string $publikasi_path
 * @property string $publikasi_ukuran
 * @property string $publikasi_deskripsi
 */
class Publikasi extends \yii\db\ActiveRecord
{
    public $publikasi_upload;

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
            [['publikasi_judul', 'publikasi_daterilis', 'publikasi_path', 'publikasi_ukuran', 'publikasi_deskripsi', 'publikasi_upload', 'publikasi_filename'], 'required'],
            [['publikasi_daterilis'], 'safe'],
            [['publikasi_upload'], 'file'],
            [['publikasi_path', 'publikasi_deskripsi'], 'string'],
            [['publikasi_judul', 'publikasi_filename'], 'string', 'max' => 1020],
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
            'publikasi_judul' => 'Judul publikasi',
            'publikasi_nokatalog' => 'Nomor katalog',
            'publikasi_nobuku' => 'Nomor buku',
            'publikasi_daterilis' => 'Tanggal rilis',
            'publikasi_upload' => 'Upload Publikasi',
            'publikasi_filename' => 'Nama File',
            'publikasi_path' => 'Path',
            'publikasi_ukuran' => 'Ukuran Publikasi',
            'publikasi_deskripsi' => 'Deskripsi',
        ];
    }
}
