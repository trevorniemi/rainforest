<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Users
{

    function _authenticate($email, $password)
    {
        $passwordMd5 = md5($password);
        $findUser = R::getAll('SELECT * FROM users WHERE email = :email AND password = :password',
            [':email' => $email, ':password' => $passwordMd5]);
        if (isset($findUser[0]['id'])) {
            return $findUser;
        } else {

            return false;
        }
    }

    function _getAllUsers()
    {
        $activeUsers = R::getAll('SELECT * FROM users');
        return $activeUsers;
    }

    function _getUser($user)
    {
        $activeUsers = R::getAll('SELECT * FROM users WHERE id = :id',
            [':id' => $user]);
        return $activeUsers[0];
    }

    function _createUser($app)
    {
        $module = R::dispense('users');
        $module->email = $app->request->post('userEmail');
        $module->name = $app->request->post('userName');
        $module->department = $app->request->post('userDepartment');
        $module->password = md5($app->request->post('userPassword1'));
        $id = R::store($module);
        // loop through privileges
        foreach ($app->request->post() as $key => $privilege) {
            if (is_numeric($key)) {
                $userPrivilegeModule = R::dispense('userprivileges');
                $userPrivilegeModule->userid = $id;
                $userPrivilegeModule->componentprivilegeid = $key;
                $userPrivilegeModule->status = $privilege;
                R::store($userPrivilegeModule);
            }
        }

        return $id;
    }

    function _updateUser($app)
    {
        R::exec('UPDATE users SET email=:userEmail, name =:userName, department = :userDepartment WHERE id=:id',
            [':userEmail' => $app->request->post('userEmail'), ':id' => $app->request->post('userId'), ':userName' => $app->request->post('userName'), 'userDepartment' => $app->request->post('userDepartment')]);


        // update privileges
        foreach ($app->request->post() as $key => $privilege) {
            if (is_numeric($key)) {
                R::exec('UPDATE userprivileges SET status=:status WHERE userid=:userid AND componentprivilegeid=:componentprivilegeid',
                    [':status' => $privilege, ':userid' => $app->request->post('userId'), ':componentprivilegeid' => $key]);
            }
        }

        if ($app->request->post('userPassword1') != '') {
            // update user password
            R::exec('UPDATE users SET password=:userPassword WHERE id=:id',
                [':userPassword' => md5($app->request->post('userPassword1')), ':id' => $app->request->post('userId')]);

        }
        return true;
    }

    function _getComponentsPrivileges()
    {
        $activeComponents = R::getAll('SELECT * FROM components WHERE active = 1');

        foreach ($activeComponents as $key => $component) {
            $componentPrivileges = R::getAll('SELECT * FROM componentprivileges WHERE component = :componentid', [':componentid' => $component['id']]);
            $activeComponents[$key]['privileges'] = $componentPrivileges;
        }
        return $activeComponents;
    }

    function _getComponentPrivileges($id)
    {

        $componentPrivileges = R::getAll('SELECT * FROM componentprivileges WHERE component = :componentid', [':componentid' => $id]);

        return $componentPrivileges;
    }

    function _getUsersPrivilegeByComponentPrivileges($privileges, $userid)
    {

        foreach ($privileges as $key => $privilege) {
            $userStatus = R::getAll('SELECT status FROM userprivileges WHERE userid = :userid AND componentprivilegeid = :componentid', [':componentid' => $privilege['id'], ':userid' => $userid]);
            $privileges[$key]['userStatus'] = $userStatus[0]['status'];
        }
        return $privileges;
    }


    function _getUserPrivileges($userid)
    {
        return R::getAll('SELECT * FROM userprivileges WHERE userid = :userid', [':userid' => $userid]);
    }

    function _deleteUser($user)
    {
        $deleteUser = R::exec('DELETE FROM users WHERE id = :id',
            ['id' => $user]);
        $deleteUser = R::exec('DELETE FROM userprivileges WHERE id = :id',
            ['id' => $user]);
        return true;
    }
}

