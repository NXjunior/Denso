<?php

use yii\db\Migration;

/**
 * Class m240408_112522_init_rbac
 */
class m240408_112522_init_rbac extends Migration
{
    public function up()
    {
        // $auth = Yii::$app->authManager;

        // // add "createPeriod" permission
        // $createPeriod = $auth->createPermission('createPeriod');
        // $createPeriod->description = 'Create period';
        // $auth->add($createPeriod);

        // // add "updatePeriod" permission
        // $updatePeriod = $auth->createPermission('updatePeriod');
        // $updatePeriod->description = 'Update period';
        // $auth->add($updatePeriod);

        // // add "author" role and give this role the "createPeriod" permission
        // $author = $auth->createRole('author');
        // $auth->add($author);
        // $auth->addChild($author, $createPeriod);

        // // add "admin" role and give this role the "updatePeriod" permission
        // // as well as the permissions of the "author" role
        // $admin = $auth->createRole('admin');
        // $auth->add($admin);
        // $auth->addChild($admin, $updatePeriod);
        // $auth->addChild($admin, $author);

        // // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // // usually implemented in your User model.
        // $auth->assign($author, 2);
        // $auth->assign($admin, 1);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}
