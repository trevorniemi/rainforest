<?php


class dashboard
{

    function _getModules()
    {
        $modules = R::getAll('SELECT * FROM modules');

        foreach ($modules as $key => $module) {
            $moduleItems = self::_countModuleItems($module['id']);
            $modules[$key]['count'] = $moduleItems;
        }

        return $modules;
    }

    function _saveModule($app)
    {
        $module = R::dispense('modules');
        $module->name = $app->request->post('moduleName');
        $module->label = $app->request->post('moduleDesc');
        $id = R::store($module);

        return $id;
    }

    function _deleteModule($id)
    {
        $module = R::dispense('modules');
        $module->id = $id;
        R::trash($module);

        $deleteFields = R::exec('DELETE FROM modulefields WHERE module=:moduleid',
            [':moduleid' => $id]);


        $deleteFields = R::exec('DELETE FROM moduleitems WHERE moduleid=:moduleid',
            [':moduleid' => $id]);

        return true;
    }

    function _getUrlPathComponents($url, $users)
    {
        $currentPath = ltrim($url, '/');
        $currentPath = rtrim($currentPath, '/');
        $pathPieces = explode("/", $currentPath);
        if (isset($pathPieces[1])) {
            // set component id
            if ($pathPieces[1] == 'media-manager') {
                $componentPrivileges = $users->_getComponentPrivileges(2);
            } else if ($pathPieces[1] == 'users') {
                $componentPrivileges = $users->_getComponentPrivileges(4);
            } else if ($pathPieces[1] == 'change-language' OR $pathPieces[1] == 'edit-data-item' OR $pathPieces[1] == 'contact-support' OR $pathPieces[1] == 'manage-media' OR $pathPieces[1] == 'delete-data-item' OR $pathPieces[1] == 'delete-module' OR $pathPieces[1] == 'add-data-item' OR $pathPieces[1] == 'edit-module' OR $pathPieces[1] == 'view-data-list') {
                $componentPrivileges = $users->_getComponentPrivileges(1);
            } else if ($pathPieces[1] == 'pages' OR $pathPieces[1] == 'landing-pages' OR $pathPieces[1] == 'blog-posts') {
                $componentPrivileges = $users->_getComponentPrivileges(3);
            } else if ($pathPieces[1] == 'admin-tools') {
                $componentPrivileges = $users->_getComponentPrivileges(5);
            }
        } else {
            // page is /dashboard/ (rainforest cms homepage)
            $componentPrivileges = $users->_getComponentPrivileges(1);
        }
        return $componentPrivileges;
    }

    function _getModuleFields($id, $limited = null, $relationship = null)
    {
        if ($limited == true) {
            $moduleFields = R::getAll('SELECT * FROM modulefields WHERE module = :moduleId AND show_in_list = 1',
                [':moduleId' => $id]);
        } else if ($relationship == true) {
            $moduleFields = R::getAll("SELECT * FROM modulefields WHERE module = :moduleId AND type != 'image' AND type != 'imagegallery' AND type != 'relationship'",
                [':moduleId' => $id]);
            return $moduleFields;
        } else {
            $moduleFields = R::getAll('SELECT * FROM modulefields WHERE module = :moduleId',
                [':moduleId' => $id]);
        }
        // get relationship data
        foreach ($moduleFields as $key => $moduleField) {
            if ($moduleField['type'] == 'relationship') {
                // query the values from moduleitems
                $relationshipData = R::getAll('SELECT value FROM moduleitems WHERE moduleid = :moduleId AND fieldid=:fieldid',
                    [':moduleId' => $moduleField['module_relationship_id'], ':fieldid' => $moduleField['relationship_field_id']]);

                $moduleFields[$key]['value'] = $relationshipData;
            }
        }
        return $moduleFields;
    }


    function _getModule($id)
    {
        return R::getRow('SELECT * FROM modules WHERE id = :moduleId',
            [':moduleId' => $id]);
    }

    function _saveModuleField($app, $limited = null)
    {

        if ($limited == true) {
            // only update show_in_list
            foreach ($app->request->post() as $key => $value) {
                R::exec('UPDATE modulefields SET show_in_list=:showOnList WHERE id=:id',
                    [':showOnList' => $value, ':id' => $key]);

            }
            return true;
        }

        $module = R::dispense('modulefields');
        $module->module = $app->request->post('moduleId');
        $module->label = $app->request->post('moduleLabel');
        $module->name = $app->request->post('moduleName');
        $module->type = $app->request->post('moduleType');
        $module->desc = $app->request->post('moduleDesc');
        $module->show_in_list = $app->request->post('show_in_list', 0);
        $id = R::store($module);

        // check if module has entries, if so we need to add a blank value to all groups
        $moduleItemCount = self::_countModuleItems($app->request->post('moduleId'));
        if ($moduleItemCount > 0) {
            $moduleItems = self::_getModuleGroups($app->request->post('moduleId'));
            foreach ($moduleItems as $moduleItem) {
                $module = R::dispense('moduleitems');
                $module->groupid = $moduleItem['groupid'];
                $module->moduleid = $app->request->post('moduleId');
                $module->fieldid = $id;
                $module->value = '';
                R::store($module);
            }
        }
        return $id;
    }

    function _saveModuleRelationshipField($app)
    {

        $module = R::dispense('modulefields');
        $module->module = $app->request->post('moduleId');
        $module->label = $app->request->post('relationshipLabel');
        $module->name = $app->request->post('relationshipLabel');
        $module->module_relationship_id = $app->request->post('moduleName');
        $module->relationship_field_id = $app->request->post('moduleField');
        $module->type = $app->request->post('moduleType');
        $module->desc = $app->request->post('desc');
        $id = R::store($module);

        $moduleItemCount = self::_countModuleItems($app->request->post('moduleId'));
        if ($moduleItemCount > 0) {
            $moduleItems = self::_getModuleGroups($app->request->post('moduleId'));
            foreach ($moduleItems as $moduleItem) {
                $module = R::dispense('moduleitems');
                $module->groupid = $moduleItem['groupid'];
                $module->moduleid = $app->request->post('moduleId');
                $module->fieldid = $id;
                $module->relationshipid = $app->request->post('moduleName');
                $module->value = '';
                R::store($module);
            }
        }
        return $id;

    }

    function _updateFieldSettings($id, $fielid, $app)
    {
        $fieldLabel = $app->request->post('fieldName');
        $fieldDesc = $app->request->post('fieldDesc');
        $module = R::dispense('modulefields');
        $module->id = $fielid;
        $module->module = $id;
        $module->label = $fieldLabel;
        $module->desc = $fieldDesc;
        R::store($module);
        return true;
    }

    function _getFieldById($id, $fielid)
    {
        $fieldData = R::getAll('SELECT * FROM modulefields WHERE module = :moduleId AND id=:id',
            [':moduleId' => $id, ':id' => $fielid]);
        return $fieldData;
    }

    function _getModuleGroups($id)
    {
        $items = R::getAll('SELECT DISTINCT groupid FROM moduleitems WHERE moduleid = :moduleId',
            [':moduleId' => $id]);
        return $items;
    }

    function _getModuleItems($id, $limited = null, $pageData = null)
    {

        $items = R::getAll('SELECT DISTINCT groupid FROM moduleitems WHERE moduleid = :moduleId',
            [':moduleId' => $id]);


// build groups
        $groups = array();
        $i = 0;
        foreach ($items as $item) {
            $currentGroup = R::getAll('SELECT value,fieldid FROM moduleitems WHERE groupid = :groupId',
                [':groupId' => $item['groupid']]);


            foreach ($currentGroup as $groupData) {
                // if limired is true only show the show_on_list data
                if ($limited == true) {
                    $fieldCheck = R::getAll('SELECT show_in_list FROM modulefields WHERE module = :moduleid AND id = :fieldid',
                        [':moduleid' => $id, ':fieldid' => $groupData['fieldid']]);
                    if ($fieldCheck[0]['show_in_list'] == 1) {
                        $groups[$i][] = $groupData['value'];
                    }
                }


            }
            if ($pageData == true) {
                $groups[$i]['id'] = $item['groupid'];
            }
            $groups[$i]['media'] = $item['groupid'];
            $groups[$i]['edit'] = $item['groupid'];
            $i++;
        }
        return $groups;
    }

    function _countItemsByModuleField($id, $fieldid)
    {
        $currentGroup = R::getAll('SELECT value FROM moduleitems WHERE (fieldid = :fieldid AND moduleid = :moduleid AND value != "") OR  (fieldid = :fieldid AND relationshipid = :moduleid AND value != "")',
            [':fieldid' => $fieldid, ':moduleid' => $id]);
        return count($currentGroup);
    }

    function _deleteField($id, $fieldid)
    {

        // delete unique items
        $deleteField = R::exec('DELETE FROM moduleitems WHERE (fieldid = :fieldid AND moduleid = :moduleid) OR  (fieldid = :fieldid AND relationshipid = :moduleid)',
            [':fieldid' => $fieldid, ':moduleid' => $id]);

        // delete field
        $deleteField = R::exec('DELETE FROM modulefields WHERE id = :fieldid AND module = :moduleid',
            [':fieldid' => $fieldid, ':moduleid' => $id]);

        return count($deleteField);
    }

    function _getModuleItem($id, $fieldNameKey = null)
    {
        $currentGroup = R::getAll('SELECT * FROM moduleitems WHERE groupid = :groupId',
            [':groupId' => $id]);
        $i = 0;
        foreach ($currentGroup as $groupData) {
            if ($fieldNameKey == true) {
                // get field name and make field name the key

                $key = R::getRow("SELECT name FROM modulefields WHERE id=:fieldid", [':fieldid' => $groupData['fieldid']]);
            } else {
                $key['name'] = $groupData['fieldid'];
            }
            $groups[$i][$key['name']] = $groupData['value'];
        }

        $groups[$i]['edit'] = $id;

        return $groups;
    }

    function _getModuleImages($id, $type = null)
    {
        $moduleId = self::_getModuleByGroup($id);

        // get module fields
        if ($type !== null) {
            $imageFields = R::getAll('SELECT id FROM modulefields WHERE module = :moduleId AND type =:type',
                [':moduleId' => $moduleId, ':type' => $type]);
        } else {
            $imageFields = R::getAll('SELECT id FROM modulefields WHERE module = :moduleId AND (type =:type OR type =:type2)',
                [':moduleId' => $moduleId, ':type' => 'image', ':type2' => 'imagegallery']);
        }
        $images = array();

        if (count($imageFields) > 0) {
            foreach ($imageFields as $imageField) {

                // get module items
                $images[$imageField['id']] = R::getAll('SELECT * FROM moduleitems WHERE groupid = :groupId AND moduleid = :moduleid AND fieldid = :fieldid',
                    [':groupId' => $id, ':moduleid' => $moduleId, ':fieldid' => $imageField['id']]);
            }
        } else {
            return '';
        }
        return $images;
    }

    function _getModuleByGroup($id)
    {
        $currentGroup = R::getAll('SELECT moduleid FROM moduleitems WHERE groupid = :groupId LIMIT 1',
            [':groupId' => $id]);
        return $currentGroup[0]['moduleid'];
    }

    function _countModuleItems($id)
    {
        $itemCount = R::getAll('SELECT DISTINCT groupid FROM moduleitems WHERE moduleid = :moduleId',
            [':moduleId' => $id]);

        return count($itemCount);
    }

    function _saveModuleItem($app, $id)
    {
// find latest group
        $latestGroup = R::getRow('SELECT groupid FROM moduleitems ORDER BY groupid DESC LIMIT 1',
            [':moduleId' => $id]);

        $latestGroup = $latestGroup['groupid'] + 1;
        foreach ($app->request->post() as $key => $value) {
            $module = '';
            if ($key != 'moduleid' && $key != 'relationshipid' && $key != 'relationship_field_id' && $key != 'relationship_module_id') {
                $module = R::dispense('moduleitems');
                $module->groupid = $latestGroup;
                $module->moduleid = $id;
                $module->fieldid = $key;
                $module->value = $value;
                R::store($module);

            } else if ($key == 'relationshipid') {
                // save
                $module = R::dispense('moduleitems');
                $module->groupid = $latestGroup;
                $module->moduleid = $id;
                $module->relationshipid = $app->request->post('relationship_module_id');
                $module->fieldid = $app->request->post('relationship_field_id');
                $module->value = $value;
                R::store($module);
            }


        }
        return $id;
    }


    function _updateModuleItem($app, $id, $moduleID = null)
    {
        foreach ($app->request->post() as $key => $value) {
            if ($key != 'moduleid' && $key != 'relationship_module_id' && $key != 'relationship_field_id') {
                if ($key == 'relationshipid') {
                    $key = $app->request->post('relationship_field_id');
                }
                $module = R::dispense('moduleitems');
                $module->groupid = $id;
                $module->fieldid = $key;
                $module->value = $value;

                R::exec('UPDATE moduleitems SET value=:itemValue WHERE groupid=:id AND fieldid=:key',
                    [':itemValue' => $value, ':id' => $id, ':key' => $key]);

            }

        }
        return $id;
    }

    function _deleteModuleItem($id)
    {
        $rows = R::exec('DELETE FROM moduleitems WHERE groupid = :groupId',
            [':groupId' => $id]);

        return true;
    }


}