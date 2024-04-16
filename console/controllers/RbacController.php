<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;

class RbacController extends Controller
{

  public $authItemData = [
    ['name' => 'admin', 'description' => 'ผู้ดูแลระบบ', 'type' => 1],
    ['name' => 'manager', 'description' => 'ผู้จัดการ', 'type' => 1],
    ['name' => 'company_manage', 'description' => 'จัดการข้อมูลบริษัท', 'type' => 2],
    ['name' => 'period_manage', 'description' => 'จัดการข้อมูลรอบ', 'type' => 2],
    ['name' => 'slot_manage', 'description' => 'จัดการข้อมูล Slot', 'type' => 2],
    ['name' => 'employee_manage', 'description' => 'จัดการข้อมูล Slot', 'type' => 2],
    ['name' => 'booking_manage', 'description' => 'จัดการข้อมูล Slot', 'type' => 2],
  ];

  public function actionInit()
  {
    $auth = Yii::$app->authManager;
    // $auth->removeAll();

    $admin = $auth->createRole('admin');
    $admin->description = 'ผู้ดูแลระบบ';
    $auth->add($admin);

    $manager = $auth->createRole('manager');
    $manager->description = 'ผู้จัดการ';
    $auth->add($manager);


    foreach ($this->authItemData as $a) {
      // Role Not A Permission
      if (in_array($a['name'], ['admin', 'manager'])) {
        continue;
      }

      $permission = $auth->createPermission($a['name']);
      $permission->description = $a['description'];
      $auth->add($permission);

      $auth->addChild($admin, $permission);
      if (!(bool) preg_match('/config_/', $a['name'])) {
        $auth->addChild($manager, $permission);
      }
    }

    foreach (User::find()->all() as $user) {
      if ((bool) preg_match('/^(admin_)\w+$/', $user->username)) {
        $auth->assign($admin, $user->id);
      } else {
        $auth->assign($manager, $user->id);
      }
    }
  }
}
