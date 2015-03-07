<?php

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

/**
 * Required Modules
 */
require 'modules/dashboard.php';
require 'modules/users.php';
require 'modules/mediamanager.php';
require 'modules/pages.php';
require 'modules/admintools.php';
require 'modules/router.php';

$dashboard = new Dashboard();
$users = new Users();
$mediaManager = new mediaManager();
$pages = new Pages();
$adminTools = new adminTools();
$publicRouter = new publicRouter();

/**
 * Core Slim Framework
 */

require '_Slim/Slim.php';


\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
$app->add(new \Slim\Middleware\SessionCookie());

/**
 * Database ORM - redbean php http://redbeanphp.com/
 */

require '_ORM/rb.php';
R::setup('mysql:host=' . $database['host'] . ';dbname=' . $database['database'] . '', $database['user'], $database['password']);
R::freeze( TRUE );

if (!$app->request->isAjax()) {
    $app->hook('slim.before.router', function () use ($app, $dashboard, $publicRouter, $pages, $adminTools) {
        /**
         * If user session is set, create the global variables
         */
        $app->view()->setTemplatesDirectory(RAINFOREST_ROOT . 'admin-templates');
        $modules = '';
        if (isset($_SESSION['user']) && isset($_SESSION['SITE_ROOT']) && $_SESSION['SITE_ROOT'] == SITE_ROOT) {
            $user = $_SESSION['user'];
            $userId = $_SESSION['user-id'];
            $userEmail = $_SESSION['user-email'];

            $app->view()->setData('user', $user);
            $app->view()->setData('userId', $userId);
            $app->view()->setData('userEmail', $userEmail);
            $modules = $dashboard->_getModules();
        }

        /**
         *
         * DASHBOARD ROUTER
         *
         *
         */
        if (strpos($app->request()->getPathInfo(), 'dashboard') == 1 && strpos($app->request()->getPathInfo(), 'logout') === false) {

            if (!isset($user)) {
                $app->redirect(SITE_ROOT . 'login/');
            } else {

                $users = new Users();

                $componentPrivileges = $dashboard->_getUrlPathComponents($app->request()->getPathInfo(), $users);
                $userPrivilegeStatus = $users->_getUsersPrivilegeByComponentPrivileges($componentPrivileges, $userId);
                $app->view()->setData('componentPrivileges', $userPrivilegeStatus);


                if (!$app->request->isPost()) {
                    $app->render('/header.php', array('modules' => $modules));
                }
            }
        } else {
            /**
             *
             * FRONT-END / PUBLIC ROUTER
             *
             *
             */

            $siteLanguages = $adminTools->_getSiteLanguages(true);
            // check if the url has a language tag at the end
            if (count($siteLanguages) > 1) {
                $currentUrl = $app->request()->getPathInfo();
                $currentPath = ltrim($currentUrl, '/');
                $currentPath = rtrim($currentPath, '/');
                $pathPieces = explode("/", $currentPath);
                $possibleLanguage = end($pathPieces);

                $language = '';
                if (isset($siteLanguages[$possibleLanguage])) {
                    if ($possibleLanguage == 'en') {
                        $app->redirect(SITE_ROOT . substr($app->request()->getPathInfo(), 0, -strlen($possibleLanguage) - 1));
                    } else {
                        $app->environment['PATH_INFO'] = substr($app->request()->getPathInfo(), 0, -strlen($possibleLanguage) - 1);
                        $app->view()->setData('currentLanguage', $possibleLanguage);
                        $language = $possibleLanguage;
                    }
                }
            }
            /**
             * Check if URL is legit
             */
            $url = $publicRouter->_checkUrl($app->request()->getPathInfo());

            /**
             * Sitemap
             */
            if ($app->request()->getPathInfo() == '/sitemap.xml') {
                $allPages = $pages->_getPages('');

                $app->response()->header('Content-Type', 'application/xml');

                $xml = new SimpleXMLElement('<root/>');
                $i = 1;
                foreach ($allPages as $r) {
                    $item = $xml->addChild('item');
                    $item->addChild('id', $i);
                    $item->addChild('title', $r['pagetitle']);
                    $item->addChild('url', SITE_ROOT . ltrim($r['url'], "/"));
                    echo $item;
                    $i++;
                }
                echo $xml->asXml();
                $app->stop();

            } else if ($url[0]['id'] == '') {
                /**
                 * check redirects
                 */
                $redirect = $publicRouter->_getURLRedirect($app->request()->getPathInfo());
                if (isset($redirect[0]['newurl'])) {
                    $app->redirect(SITE_ROOT . ltrim($redirect[0]['newurl'], "/"), 301);
                }
            } else if ($url == false) {
                /**
                 * 404
                 */
            } else {
                /**
                 * Set Page Settings
                 */
                $app->view()->setData('pageId', $url[0]['id']);
                /**
                 * If landing page is set to private don't let google index,follow
                 */
                if ($url[0]['private'] == 1) {
                    $app->view()->setData('privatePage', true);
                }
                /**
                 * If secondary language is found we need to get that content
                 */
                if (isset($language) && $language != '') {
                    $languageContent = $publicRouter->_getPageContentByLanguage($url[0]['id'], $language);
                    if ($languageContent != '') {
                        $url[0]['pagecontent'] = $languageContent['pagecontent'];
                    }
                }
                /**
                 * Get Website Settings
                 */
                $siteSettings = $adminTools->_setSiteSettings($app);
                /**
                 * Get Website analytics
                 */
                $websiteAnalytics = $adminTools->_getAnalytics();
                /**
                 * Get Website Page Data
                 */
                $pageData = $pages->_getPageData($url[0]['id']);
                if ($pageData > 0) {
                    // get page data
                    $finalPageData = array();
                    foreach ($pageData as $key => $data) {
                        $finalPageData[$data['name']][] = $publicRouter->_getModuleItem($data['groupid']);

                    }
                    foreach ($pageData as $key => $data) {
                        $finalPageData[$data['name']]['images'] = $publicRouter->_getModuleImages($data['groupid']);
                    }
                }

                /**
                 * Check if debug parameter is ture
                 */
                if ($app->request->get('showData') == true) {
                    $debug = true;
                } else {
                    $debug = '';
                }
                /**
                 * Set Template Directory, Template Data and Load The Template Header, Body and Footer files.
                 */
                $app->view()->setTemplatesDirectory('templates');
                $app->view()->setData('pageData', $finalPageData);
                $app->render('/header.php', array('url' => $url[0], 'modules' => $modules));
                $app->render($url[0]['template'], array('url' => $url[0]));
                $app->render('/footer.php', array('url' => $url[0], 'analytics' => $websiteAnalytics, 'debug' => $debug));
                $app->stop();
            }
        }
    });
}

require('dashboard.php');

/**
 * Run application
 */
$app->run();

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);


if (!$app->request->isAjax() && strpos($app->request()->getPathInfo(), 'dashboard') == 1) {
    $app->render('footer.php', array('total_time' => $total_time));
}