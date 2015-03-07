<?php

class mediaManager
{

    function _uploadFiles($app)
    {

        $imgs = array();

        $files = $_FILES['uploads'];

        $cnt = count($files['name']);
        for ($i = 0; $i < $cnt; $i++) {
            if ($files['error'][$i] === 0) {

                $ext = "." . pathinfo($files['name'][$i], PATHINFO_EXTENSION);
                $filename = str_replace("$ext", "-" . rand(100000, 999999), $files['name'][$i]);
                $name = $filename . $ext;

                if (move_uploaded_file($files['tmp_name'][$i], 'assets/' . $name) === true) {
                    $imgs[] = array('url' => '/assets/' . $name, 'name' => $files['name'][$i]);
                }

            }
        }

        $imageCount = count($imgs);
        if ($imageCount == 0) {
            echo 'No files uploaded!!  <p><a href="/">Try again</a>';
            return;
        }

    }

    function _getImages()
    {
        return $images = glob('assets/' . "*.{jpg,png,gif,JPG,PNG,GIF}", GLOB_BRACE);

    }

    function _countAttachmentsByImageName($img)
    {
        $moduleItems = R::getAll('SELECT id FROM moduleitems WHERE value=:value',
            [':value' => $img]);

        return count($moduleItems);
    }

    function _deleteImage($img)
    {
        $rows = R::exec('DELETE FROM moduleitems WHERE value=:value',
            [':value' => $img]);

        unlink('assets/' . $img);
        return true;
    }

    function _attachImages($itemid, $moduleid, $app)
    {
        if ($app->request()->post('imagegallery') == 1) {
            // delete all active gallery image entries
            $firstRun = true;
        }

        foreach ($app->request()->post() as $key => $value) {
            if ($key == 'imagegallery' OR $key == 'image') {
                continue;
            }
            // check if fieldid is already in moduleitems if so then we update
            if ($app->request()->post('image') == 1) {
                $moduleItems = R::getAll('SELECT * FROM moduleitems WHERE groupid = :groupId AND fieldid = :fieldId',
                    [':fieldId' => $key, 'groupId' => $itemid]);
                if (count($moduleItems) == 0) {
                    $module = R::dispense('moduleitems');
                    $module->groupid = $itemid;
                    $module->moduleid = $moduleid;
                    $module->fieldid = $key;
                    $module->value = $value;
                    R::store($module);
                    return true;
                } else if (count($moduleItems) == 1) {
                    R::exec('UPDATE moduleitems SET value=:itemValue WHERE groupid=:id AND fieldid=:key',
                        [':itemValue' => $value, ':id' => $itemid, ':key' => $key]);
                }
            } else if ($app->request()->post('imagegallery') == 1) {
                if ($firstRun == true) {
                    $rows = R::exec('DELETE FROM moduleitems WHERE groupid=:id AND fieldid=:key',
                        [':id' => $itemid, ':key' => $key]);
                    $firstRun = false;
                }
                foreach ($value as $image) {
                    $module = R::dispense('moduleitems');
                    $module->groupid = $itemid;
                    $module->moduleid = $moduleid;
                    $module->fieldid = $key;
                    $module->value = $image;
                    R::store($module);
                }

            }
        }

    }

}