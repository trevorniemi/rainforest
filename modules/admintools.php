<?php

class adminTools
{

    function _getAnalytics($limited = null)
    {
        if ($limited == true) {
            $analytics = R::getAll('SELECT id,name,description FROM analytics');
            $i = 0;
            foreach ($analytics as $analytic) {
                $analytics[$i]['edit'] = $analytic['id'];
                $i++;
            }

            return $analytics;
        }
        return R::getAll('SELECT * FROM analytics');
    }

    function _getAnalytic($id)
    {
        return R::getAll('SELECT * FROM analytics WHERE id = :id', [':id' => $id]);
    }

    function _addAnalytics($app)
    {
        $analytics = R::dispense('analytics');
        $analytics->name = $app->request->post('analyticsName');
        $analytics->description = $app->request->post('analyticsDesc');
        $analytics->script = $app->request->post('analyticsScript');
        R::store($analytics);

    }

    function _deleteAnalytic($id)
    {
        $rows = R::exec('DELETE FROM analytics WHERE id = :id',
            [':id' => $id]);

        return true;
    }

    function _editAnalytics($id, $app)
    {
        $analytics = R::dispense('analytics');
        $analytics->id = $id;
        $analytics->name = $app->request->post('analyticsName');
        $analytics->description = $app->request->post('analyticsDesc');
        $analytics->script = $app->request->post('analyticsScript');
        R::store($analytics);
    }

    function _setSiteSettings($app)
    {
        $siteSettings = R::getAll('SELECT * FROM sitesettings');
        foreach ($siteSettings as $key => $setting) {
            if ($setting['name'] == 'siteName') {
                $app->view()->setData('siteName', $setting['value']);
            }
            if ($setting['name'] == 'siteDesc') {
                $app->view()->setData('siteDesc', $setting['value']);
            }
        }

    }

    function _getSiteLanguages($active = null)
    {
        $languages = R::getAll('SELECT * FROM sitelanguages');
        if ($active == true) {
            $languages = R::getAll('SELECT * FROM sitelanguages WHERE status = 1');
        }
        $finalLanguages = array();
        foreach ($languages as $language) {
            $finalLanguages[$language['url']] = $language;
        }
        return $finalLanguages;
    }

    function _updateSiteLanguages($app)
    {
        foreach ($app->request->post() as $key => $value) {
            R::exec('UPDATE sitelanguages SET status=1 WHERE name=:key',
                [':key' => $key]);
        }
    }

    function _getSiteSettings()
    {
        return R::getAll('SELECT * FROM sitesettings');

    }


    function _updateSiteSettings($app)
    {
        foreach ($app->request->post() as $key => $value) {
            R::exec('UPDATE sitesettings SET value=:itemValue WHERE name=:key',
                [':itemValue' => $value, ':key' => $key]);
        }
    }

    function _getURLRedirects()
    {
        $redirects = R::getAll('SELECT * FROM redirects');

        $i = 0;
        foreach ($redirects as $data) {
            $redirects[$i]['edit'] = $data['id'];
            $i++;
        }
        return $redirects;
    }


    function _deleteRedirect($id)
    {
        R::exec('DELETE FROM redirects WHERE id=:id', [':id' => $id]);
        return true;
    }

    function _saveURLRedirect($app)
    {
        $redirect = R::dispense('redirects');
        $oldUrl = str_replace(SITE_ROOT, '', $app->request->post('oldurl'));
        $newurl = str_replace(SITE_ROOT, '', $app->request->post('newurl'));
        if (substr($newurl, -1) != '/') {
            $newurl = $newurl . "/";
        }
        if (substr($newurl, 1) != '/') {
            $newurl = "/" . $newurl;
        }
        if (substr($oldUrl, 1) != '/') {
            $oldUrl = "/" . $oldUrl;
        }
        $redirect->oldurl = $oldUrl;
        $redirect->newurl = $newurl;
        R::store($redirect);
    }

    function _getTemplates($type = null)
    {
        if ($type !== null) {
            return R::getAll('SELECT * FROM templates WHERE type=:type', [':type' => $type]);
        }

        $templates = R::getAll('SELECT * FROM templates');

        $i = 0;
        foreach ($templates as $template) {
            $templates[$i]['edit'] = $template['id'];
            $i++;
        }

        return $templates;

    }

    function _getTemplate($id)
    {
        return R::getAll('SELECT * FROM templates WHERE id=:id', [':id' => $id]);
    }

    function _updateTemplate($id, $app)
    {
        $template = R::dispense('templates');
        $template->id = $id;
        $template->template = $app->request->post('templateFile');
        $template->nicename = $app->request->post('templateName');
        $template->type = $app->request->post('templateType');
        R::store($template);
    }

    function _getTemplateTypes()
    {
        return R::getAll('SELECT DISTINCT type FROM templates');
    }

    function _createTemplate($app)
    {
        $template = R::dispense('templates');
        $template->template = $app->request->post('templateFile');
        $template->nicename = $app->request->post('templateName');
        $template->type = $app->request->post('templateType');
        R::store($template);
    }

}