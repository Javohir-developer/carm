<?php

namespace backend\modules\companies\models;
use backend\models\BaseModel;
use common\models\User;
use common\models\UserPasswords;
use common\rbac\models\Role;
use common\widgets\Helper;
use Yii;
use yii\helpers\ArrayHelper;


class AuthItem extends BaseModel
{

    public static function tableName()
    {
        return 'auth_item';
    }
}
