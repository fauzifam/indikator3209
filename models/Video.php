<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $video_id
 * @property string $video_kategori
 * @property string $video_link
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_kategori', 'video_link'], 'required'],
            [['video_kategori', 'video_link'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'video_id' => 'Video ID',
            'video_kategori' => 'Video Kategori',
            'video_link' => 'Video Link',
        ];
    }
}
