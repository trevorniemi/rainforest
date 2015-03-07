<?php

class publicRouter
{

    function _checkUrl($url)
    {
        if (substr($url, -1) != '/') {
            $url = $url . "/";
        }
        $urlStatus = R::getAll('SELECT * FROM pages WHERE url = :url',
            [':url' => $url]);
        if (count($urlStatus) === 0) {
            return false;
        } else {
            return $urlStatus;
        }
    }

    function _getModuleItem($id)
    {
        $currentGroup = R::getAll('SELECT * FROM moduleitems WHERE groupid = :groupId',
            [':groupId' => $id]);
        $i = 0;
        foreach ($currentGroup as $groupData) {

            $key = R::getRow("SELECT name,type FROM modulefields WHERE id=:fieldid", [':fieldid' => $groupData['fieldid']]);
            if ($key['type'] == 'image' OR $key['type'] == 'imagegallery') {
                //  unset($groups[$i]);
            } else {
                $groups[$i][$key['name']] = $groupData['value'];
            }
        }

        return $groups;
    }

    function _getModuleImages($id, $type = null)
    {
        $moduleId = self::_getModuleByGroup($id);

        // get module fields
        if ($type !== null) {
            $imageFields = R::getAll('SELECT id,name FROM modulefields WHERE module = :moduleId AND type =:type',
                [':moduleId' => $moduleId, ':type' => $type]);
        } else {
            $imageFields = R::getAll('SELECT id,name FROM modulefields WHERE module = :moduleId AND (type =:type OR type =:type2)',
                [':moduleId' => $moduleId, ':type' => 'image', ':type2' => 'imagegallery']);
        }
        $images = array();

        if (count($imageFields) > 0) {
            foreach ($imageFields as $imageField) {

                // get module items 
                $images[$imageField['name']] = R::getAll('SELECT * FROM moduleitems WHERE groupid = :groupId AND moduleid = :moduleid AND fieldid = :fieldid',
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

    function _getURLRedirect($url)
    {
        $redirect = R::getAll('SELECT * FROM redirects WHERE oldurl=:oldurl', [':oldurl' => $url]);

        if (!isset($redirect[0])) {
            if (substr($url, -1) == '/') {
                $url = rtrim($url, '/');
            } else {
                $url = $url . "/";
            }
            $redirect = R::getAll('SELECT * FROM redirects WHERE oldurl=:oldurl', [':oldurl' => $url]);
        }
        return $redirect;
    }

    function _getPageContentByLanguage($id, $language)
    {
        return R::getRow('SELECT pagecontent FROM pageslanguages WHERE pageid=:id AND language=:language', [':id' => $id, ':language' => $language]);
    }


}