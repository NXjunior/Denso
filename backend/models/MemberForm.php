<?php 
namespace backend\models;

use yii\base\Model;

class MemberForm extends Model{
    public $firstname;
    public $lastname;
    public $gender;
    public $phone;
    public $role;
    public $position;
    public $house_no;
    public $moo;
    public $soi;
    public $road;
    public $tambon;
    public $ampher;
    public $province;
    public $zip_code;


    public function rules(){
        return [
            [
                [
                    'firstname',
                    'lastname',
                    'gender',
                    'phone',
                    'role',
                    'house_no',
                    'road',
                    'tambon',
                    'ampher',
                    'province',
                    'zip_code'
                ],
                'required'
            ],
            [
                'phone','string','min'=>10,'max'=>10
            ],
            [
                'zip_code','string','min'=>5,'max'=>5
            ]
        ];
    }

    public function attributeLabels(){
        return [
            'firstname' => 'ชื่อจริง',
            'lastname' => 'นามสกุล',
            'gender' => 'เพศ',
            'phone' => 'หมายเลขโทรศัพท์',
            'role' => 'ประเภท',
            'position' => 'ตำแหน่ง',
            'house_no' => 'บ้านเลขที่',
            'moo' => 'หมู่ที่',
            'soi' => 'ซอย',
            'road' => 'ถนน',
            'tambon' => 'ตำบล',
            'ampher' => 'อำเภอ',
            'province' => 'จังหวัด',
            'zip_code' => 'รหัสไปรษณีย์',
        ];
    }
}