<?php

namespace app\models;

class BaseModel extends \yii\db\ActiveRecord
{
    public function beforeSave($insert)
    {
        if($this->isNewRecord)
            $this->created_at = $this->updated_at = date('Y-m-d H:i:s');
        else
            $this->updated_at = date('Y-m-d H:i:s');

        return parent::beforeSave($insert);
    }
}
