<?php

class Pages
{

    function _getPages($type, $limited = null)
    {
        if ($limited == true) {
            $pages = R::getAll('SELECT id,pagetitle,url FROM pages WHERE type=:type', [':type' => $type]);
            $i = 0;
            foreach ($pages as $page) {
                $pages[$i]['edit'] = $page['id'];
                $pages[$i]['data'] = $page['id'];
                $i++;
            }
            return $pages;
        }
        return R::getAll('SELECT * FROM pages');
    }

    function _getBlogPosts($type, $limited = null)
    {
        if ($limited == true) {
            $pages = R::getAll('SELECT id,date,pagetitle,url FROM pages WHERE type=:type', [':type' => $type]);
            $i = 0;
            foreach ($pages as $page) {
                $pages[$i]['edit'] = $page['id'];
                $i++;
            }
            return $pages;
        }
        return R::getAll('SELECT * FROM pages');
    }

    function _getLandingPages($type, $limited = null)
    {
        if ($limited == true) {
            $pages = R::getAll('SELECT id,pagetitle,url FROM pages WHERE type=:type', [':type' => $type]);
            $i = 0;
            foreach ($pages as $page) {
                $pages[$i]['edit'] = $page['id'];
                $i++;
            }
            return $pages;
        }
        return R::getAll('SELECT * FROM pages');
    }

    function _getPage($id)
    {
        return R::getAll('SELECT * FROM pages WHERE id=:id', [':id' => $id]);
    }


    function _createPage($app)
    {
        $page = R::dispense('pages');
        $url = $app->request->post('pageUrl');
        if (substr($url, -1) != '/') {
            $url = $url . "/";
        }
        if (substr($url, 1) != '/') {
            $url = "/" . $url;
        }

        if ($app->request->post('publishDate') != '') {
            $page->date = $app->request->post('publishDate');
        }
        $page->url = $url;
        $page->pagetitle = $app->request->post('pageName');
        $page->pagecontent = $app->request->post('pageContent');
        $page->template = $app->request->post('pageTemplate');
        $page->type = $app->request->post('pageType');

        if ($app->request->post('private') !== null) {
            $page->private = 1;
        }

        R::store($page);
    }


    function _updatePage($id, $app)
    {
        $page = R::dispense('pages');
        $page->id = $id;

        if ($app->request->post('pageName') !== null) {
            $page->pagetitle = $app->request->post('pageName');
        }
        $page->pagecontent = $app->request->post('pageContent');
        if ($app->request->post('pageTemplate') !== null) {
            $page->template = $app->request->post('pageTemplate');
        }

        if ($app->request->post('private') === null) {
            $page->private = 0;
        } else {
            $page->private = 1;
        }

        R::store($page);
    }

    function _updatePageLanguage($id, $app)
    {
        // check if the pageid and language id exist in the pageslanguages table already
        $pageData = R::getRow('SELECT id FROM pageslanguages WHERE pageid=:pageid AND language=:language', [':pageid' => $id, ':language' => $app->request->post('activeLanguage')]);
        if (isset($pageData['id'])) {
            // update the entry
            R::exec('UPDATE pageslanguages SET pagecontent=:pagecontent WHERE id=:pageid', [':pagecontent' => $app->request->post('pageContent'), ':pageid' => $pageData['id']]);
        } else {
            // add the entry
            $page = R::dispense('pageslanguages');
            $page->pageid = $app->request->post('pageId');
            $page->pagecontent = $app->request->post('pageContent');
            $page->language = $app->request->post('activeLanguage');
            R::store($page);
        }
        return true;
    }

    function _deletePage($id)
    {
        $page = R::dispense('pages');
        $page->id = $id;
        R::trash($page);
    }

    function _getPageData($id, $limited = null)
    {

        if ($limited == true) {
            $groupedData = R::getAll('SELECT DISTINCT name FROM pagedata WHERE pageid=:pageid', [':pageid' => $id]);
            foreach ($groupedData as $key => $dataElement) {
                $pageData[] = R::getRow('SELECT id,name,groupid,moduleid FROM pagedata WHERE pageid=:pageid AND name=:name LIMIT 1', [':pageid' => $id, ':name' => $dataElement['name']]);
            }
        } else {
            $pageData = R::getAll('SELECT id,name,groupid,moduleid FROM pagedata WHERE pageid=:pageid', [':pageid' => $id]);
        }
        if (isset($pageData)) {
            $i = 0;
            foreach ($pageData as $data) {
                $pageData[$i]['edit'] = $data['id'];
                $i++;
            }
            return $pageData;
        } else {
            return array();
        }
    }

    function _addDataItem($app)
    {
        foreach ($app->request->post('dataItems') as $dataItem) {
            $data = R::dispense('pagedata');
            $data->name = $app->request->post('pageName');
            $data->pageid = $app->request->post('currentPage');
            $data->moduleid = $app->request->post('currentModule');
            $data->groupid = $dataItem;
            $id = R::store($data);
        }
    }

    function _editDataItem($app)
    {

        // delete all data entries with the data name
        $deleteFields = R::exec('DELETE FROM pagedata WHERE name=:dataName',
            [':dataName' => $app->request->post('pageName')]);

        foreach ($app->request->post('dataItems') as $dataItem) {
            $data = R::dispense('pagedata');
            $data->name = $app->request->post('pageName');
            $data->pageid = $app->request->post('currentPage');
            $data->moduleid = $app->request->post('currentModule');
            $data->groupid = $dataItem;
            $id = R::store($data);
        }
    }


    function _deletePageDataItem($app)
    {
        // get name to see if there are more then one entry
        $pageName = R::getRow('SELECT name FROM pagedata WHERE id=:id', [':id' => $app->request->post('id')]);
        $pageIDs = R::getAll('SELECT id FROM pagedata WHERE name=:name', [':name' => $pageName['name']]);
        foreach ($pageIDs as $id) {
            $pagedata = R::dispense('pagedata');
            $pagedata->id = $id['id'];
            R::trash($pagedata);
        }
    }


}