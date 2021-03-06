<?php
namespace tours\models;

/**
 * This is the model class for table "tours_videos".
 *
 * Columns:
* @property integer $id  
* @property integer $tours_id  
* @property string|null $name  
* @property string|null $description  
* @property string $path  
* @property string|null $thumb  
 */
class Videos extends \kyubi\base\ActiveRecord
{
    /**
     *
     * {@inheritdoc}
     * @see \yii\base\ActiveRecord:tableName()
     */
    public static function tableName(): string
    {
        return 'tours_videos';
    }

    /**
     * 
     * {@inheritdoc}
     * @return array
     */
    public function rules(): array
    {
        return [
			[['tours_id', 'path'], 'required'],
			[['id', 'tours_id'], 'is', 'type' => 'int'],
			[['name'], 'string', 'max' => 100],
			[['path', 'thumb'], 'string', 'max' => 255],
			[['tours_id'], 'exist', 'targetClass' => Tours::className(), 'targetAttribute' => ['tours_id' => 'id']]        
        ];
    }
}