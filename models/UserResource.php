<?php
namespace app\models;

use yii\base\Model;
use yii\web\Link;
use yii\web\Linkable;
use yii\helpers\Url;

class UserResource extends Model implements Linkable
{
    public $id ;
    public $email;

    public function fields()
    {
        return ['id', 'email'];
    }

    public function extraFields()
    {
        return ['profile'];
    }

    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['user/view','id'=>$this->id],true),
            'edit'=>Url::to(['user/view','id'=>$this->id],true),
            'profile'=>Url::to(['user/profile/view','id'=>$this->id],true),
            'index'=>Url::to(['user/index'],true)
        ];
    }
}