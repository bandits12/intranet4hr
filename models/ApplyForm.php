<?php
/**
 * Created by PhpStorm.
 * User: Leader
 * Date: 25.04.2016
 * Time: 14:09
 */

namespace app\models;

use yii;
use yii\base\Model;

class ApplyForm extends Model{

    public $name;
    public $surname;
    public $phone_number;
    //public $CV_file;
    public $submit_date;

//    public function rules(){
//        return [
//            [
//                ['name','surname','phone_number'],'require'
//            ]
//        ];
//    }
    public function rules()
    {
        return [
            [['name', 'surname','phone_number'], 'required'],
        ];
    }




}

