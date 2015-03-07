<?php

$app->config(array('templates.path' => 'admin-templates'));

$app->get('/',
    function () use ($app) {
        $app->redirect(SITE_ROOT . 'dashboard/');
    }
);

$app->map('/dashboard/',
    function () use ($dashboard, $app) {
        if ($app->request()->isPost()) {
            if ($app->request->post('moduleName') != '') {
                $id = $dashboard->_saveModule($app);
                $app->flash('message', "Module Created Successfully");
                $app->redirect(SITE_ROOT . 'dashboard/');
            }
        }
        // get active modules
        $modules = $dashboard->_getModules();
        $app->render('/dashboard.php', array('modules' => $modules));
    })->via('GET', 'POST');

$app->map('/dashboard/contact-support/',
    function () use ($app, $mediaManager) {
        if ($app->request()->isPost()) {
            $app->flash('message', "Support Message Sent Successfully. <strong>We will be in contact with you shortly.</strong>");
            $app->redirect(SITE_ROOT . 'dashboard/');
        }

    })->via('GET', 'POST');

$app->map('/dashboard/change-language/',
    function () use ($app, $mediaManager) {
        if ($app->request()->isPost()) {
            $_SESSION['language'] = $app->request->post('language');
            $app->flash('message', "Language Changed Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/');
        }

    })->via('GET', 'POST');

$app->map('/dashboard/media-manager/',
    function () use ($app, $mediaManager) {

        if ($app->request()->isPost()) {
            if (!isset($_FILES['uploads'])) {
                return;
            }
            $mediaManager->_uploadFiles($app);
            $app->flash('message', "Image Uploaded Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/media-manager/');
        }


        $images = $mediaManager->_getImages();
        $app->render('media-manager.php', array('images' => $images));

    })->via('GET', 'POST');

$app->map('/dashboard/pages/',
    function () use ($dashboard, $app, $pages) {
        // get pages
        $pages = $pages->_getPages('page', true);
        $app->render('pages.php', array('pages' => $pages));

    })->via('GET', 'POST');

$app->map('/dashboard/pages/add-page-item/',
    function () use ($dashboard, $app, $pages, $adminTools) {
        if ($app->request()->isPost()) {
            $pages->_createPage($app);
            $app->flash('message', "Page Created Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/pages/');
        }
        $pageTemplates = $adminTools->_getTemplates('page');

        $app->render('create-page.php', array('pageTemplates' => $pageTemplates, 'pageType' => 'page'));

    })->via('GET', 'POST');

$app->map('/dashboard/pages/edit-page-item/:id',
    function ($id) use ($dashboard, $app, $pages, $adminTools) {
        if ($app->request()->isPost()) {
            $page = $pages->_updatePage($id, $app);
            $app->flash('message', "Page Updated Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/pages/');
        }
        $pageTemplates = $adminTools->_getTemplates('page');
        $pageData = $pages->_getPage($id);
        $app->render('edit-page.php', array('pageTemplates' => $pageTemplates, 'pageData' => $pageData, 'pageType' => 'page'));
    })->via('GET', 'POST');

$app->map('/dashboard/pages/page-data/:id',
    function ($id) use ($dashboard, $app, $pages) {
        if ($app->request()->isPost()) {

        }
        $getPageData = $pages->_getPageData($id, true);
        $app->render('page-data.php', array('curentPageId' => $id, 'pageData' => $getPageData));
    })->via('GET', 'POST');

$app->map('/dashboard/pages/add-page-data/:id',
    function ($id) use ($dashboard, $app, $pages) {
        $moduleList = $dashboard->_getModules();
        $app->render('create-page-data.php', array('curentPageId' => $id, 'moduleList' => $moduleList));
    })->via('GET', 'POST');


$app->map('/dashboard/pages/add-page-data/:id/:moduleid',
    function ($id, $moduleid) use ($dashboard, $app, $pages) {
        if ($app->request()->isPost()) {
            $pages->_addDataItem($app);
            $app->flash('message', "Page Data Item Added Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/pages/page-data/' . $id);
        }
        $moduleList = $dashboard->_getModules();
        $moduleData = $dashboard->_getModule($moduleid);
        $moduleItems = $dashboard->_getModuleItems($moduleid, true, true);
        $moduleFields = $dashboard->_getModuleFields($moduleid, true);
        $app->render('create-page-data.php', array('curentPageId' => $id, 'moduleid' => $moduleid, 'moduleList' => $moduleList, 'moduleData' => $moduleData, 'moduleItems' => $moduleItems, 'moduleFields' => $moduleFields));
    })->via('GET', 'POST');


$app->map('/dashboard/landing-pages/',
    function () use ($dashboard, $app, $pages) {
        // get pages
        $pages = $pages->_getLandingPages('landingpage', true);
        $app->render('landing-pages.php', array('pages' => $pages));

    })->via('GET', 'POST');

$app->map('/dashboard/pages/edit-page-data/:id/:dataid',
    function ($id, $dataid) use ($dashboard, $app, $pages) {
        if ($app->request()->isPost()) {
            $pages->_editDataItem($app);
            $app->flash('message', "Page Data Item Edited Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/pages/page-data/' . $id);
        }
        $moduleList = $dashboard->_getModules();
        $pageDataElements = $pages->_getPageData($id);
        $moduleData = $dashboard->_getModule($pageDataElements[0]['moduleid']);
        $moduleItems = $dashboard->_getModuleItems($pageDataElements[0]['moduleid'], true, true);
        $moduleFields = $dashboard->_getModuleFields($pageDataElements[0]['moduleid'], true);
        $app->render('edit-page-data.php', array('curentPageId' => $id, 'moduleList' => $moduleList, 'dataid' => $dataid, 'dataElements' => $pageDataElements, 'moduleData' => $moduleData, 'moduleItems' => $moduleItems, 'moduleFields' => $moduleFields));
    })->via('GET', 'POST');

$app->map('/dashboard/pages/delete-page-data/:id',
    function ($id) use ($dashboard, $app, $pages) {
        if ($app->request()->isPost()) {
            $pages->_deletePageDataItem($app);
            $app->flash('message', "Page Data Removed Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/pages/');
        }
        $app->render('delete-page-data.php', array('dataId' => $id));
    })->via('GET', 'POST');

$app->map('/dashboard/landing-pages/add-page-item/',
    function () use ($dashboard, $app, $pages, $adminTools) {
        if ($app->request()->isPost()) {
            $pages->_createPage($app);
            $app->flash('message', "Landing Page Created Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/landing-pages/');
        }
        $pageTemplates = $adminTools->_getTemplates('landingpage');
        $app->render('create-landing-page.php', array('pageTemplates' => $pageTemplates, 'pageType' => 'landingpage'));

    })->via('GET', 'POST');

$app->map('/dashboard/landing-pages/edit-page-item/:id',
    function ($id) use ($dashboard, $app, $pages, $adminTools) {
        if ($app->request()->isPost()) {
            $page = $pages->_updatePage($id, $app);
            $app->flash('message', "Landing Page Updated Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/landing-pages/');
        }
        $pageTemplates = $adminTools->_getTemplates('landingpage');
        $pageData = $pages->_getPage($id);
        $app->render('edit-landing-page.php', array('pageTemplates' => $pageTemplates, 'pageData' => $pageData, 'pageType' => 'landingpage'));
    })->via('GET', 'POST');

$app->map('/dashboard/blog-posts/',
    function () use ($dashboard, $app, $pages) {
        // get pages
        $pages = $pages->_getBlogPosts('blog', true);
        $app->render('blog-posts.php', array('pages' => $pages));

    })->via('GET', 'POST');

$app->map('/dashboard/blog-posts/add-page-item/',
    function () use ($dashboard, $app, $pages, $adminTools) {
        if ($app->request()->isPost()) {
            $pages->_createPage($app);
            $app->flash('message', "Blog Post Created Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/blog-posts/');
        }
        $pageTemplates = $adminTools->_getTemplates('blog');
        $app->render('create-blog-post.php', array('pageTemplates' => $pageTemplates, 'pageType' => 'blog'));

    })->via('GET', 'POST');

$app->map('/dashboard/blog-posts/edit-page-item/:id',
    function ($id) use ($dashboard, $app, $pages, $adminTools) {
        if ($app->request()->isPost()) {
            $page = $pages->_updatePage($id, $app);
            $app->flash('message', "Blog Post Updated Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/blog-posts/');
        }
        $pageTemplates = $adminTools->_getTemplates('blog');
        $pageData = $pages->_getPage($id);
        $app->render('edit-blog-post.php', array('pageTemplates' => $pageTemplates, 'pageData' => $pageData, 'pageType' => 'blog'));
    })->via('GET', 'POST');

$app->map('/dashboard/pages/delete-page-item/:id',
    function ($id) use ($dashboard, $app, $pages) {
        if ($app->request()->isPost()) {
            $pages->_deletePage($id);
            $app->flash('message', "Page Deleted Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/pages/');
        }
        $app->render('delete-page.php', array('id' => $id));
    })->via('GET', 'POST');

$app->map('/dashboard/landing-pages/delete-page-item/:id',
    function ($id) use ($dashboard, $app, $pages) {
        if ($app->request()->isPost()) {
            $pages->_deletePage($id);
            $app->flash('message', "Landing Page Deleted Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/landing-pages/');
        }
        $app->render('delete-page.php', array('id' => $id));
    })->via('GET', 'POST');

$app->map('/dashboard/blog-posts/delete-page-item/:id',
    function ($id) use ($dashboard, $app, $pages) {
        if ($app->request()->isPost()) {
            $pages->_deletePage($id);
            $app->flash('message', "Blog Post Deleted Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/blog-posts/');
        }
        $app->render('delete-page.php', array('id' => $id));
    })->via('GET', 'POST');

$app->map('/dashboard/media-manager/crop/:img',
    function ($img) use ($app, $mediaManager) {
        if ($app->request()->isPost()) {
            $jpeg_quality = 85;

            $src = 'assets/' . $app->request->post('original');
            $srcNew = 'assets/' . rand(1111111, 9999999) . $app->request->post('original');
            $img_r = imagecreatefromjpeg($src);
            $dst_r = ImageCreateTrueColor($app->request->post('w'), $app->request->post('h'));

            imagecopyresampled($dst_r, $img_r, 0, 0, $app->request->post('x'), $app->request->post('y'),
                $app->request->post('w'), $app->request->post('h'), $app->request->post('w'), $app->request->post('h'));

            imagejpeg($dst_r, $srcNew, $jpeg_quality);
            $app->redirect(SITE_ROOT . 'dashboard/media-manager/');
        }
        $size = getimagesize('assets/' . $img);
        $app->render('media-manager-crop.php', array('img' => $img, 'size' => $size));

    })->via('GET', 'POST');

$app->map('/dashboard/media-manager/delete/:img',
    function ($img) use ($app, $mediaManager) {
        if ($app->request()->isPost()) {
            // delete moduleitems with image name
            $mediaManager->_deleteImage($img);
            $app->flash('message', "Image Removed Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/media-manager/');
            // delete from uploads folder
        }
        // find out if image is being used for modules
        $attachments = $mediaManager->_countAttachmentsByImageName($img);
        $app->render('delete-media-image.php', array('image' => $img, 'attachments' => $attachments));
    })->via('GET', 'POST');

$app->map('/dashboard/edit-module/:id',
    function ($id) use ($app, $dashboard) {
        if ($app->request()->isPost()) {

            if ($app->request->post('updateshowhide') == 1) {
                $dashboard->_saveModuleField($app, true);
                $app->flash('message', "Fields Updated Successfully");
            } else {
                $dashboard->_saveModuleField($app);
                $app->flash('message', "Field Saved Successfully");

            }
            $app->redirect(SITE_ROOT . 'dashboard/edit-module/' . $id);

        }
        if ($id != '') {
            // get active modules
            $moduleData = $dashboard->_getModule($id);
            $moduleList = $dashboard->_getModules();
            $moduleFields = $dashboard->_getModuleFields($id);
            $app->render('edit-module.php', array(
                'moduleData' => $moduleData,
                'moduleList' => $moduleList,
                'moduleFields' => $moduleFields,
                'id' => $id
            ));
        }
    })->via('GET', 'POST');

$app->map('/dashboard/delete-module/:id',
    function ($id) use ($app, $dashboard) {
        if ($app->request()->isPost()) {
            $dashboard->_deleteModule($id);
            $app->flash('message', "Module and Module Data Removed Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/');
        }

        $moduleFields = $dashboard->_getmoduleFields($id);
        $moduleItems = $dashboard->_countModuleItems($id);

        $app->render('delete-module.php', array(
            'id' => $id,
            'moduleFields' => count($moduleFields),
            'moduleItems' => $moduleItems
        ));

    }


)->via('GET', 'POST');

$app->map('/dashboard/edit-module/:id/edit-field/:fieldid',
    function ($id, $fieldid) use ($app, $dashboard) {
        if ($app->request()->isPost()) {
            $dashboard->_updateFieldSettings($id, $fieldid, $app);
            $app->flash('message', "Field Edited Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/edit-module/' . $id);
        }
        if ($fieldid != '') {

            $fieldData = $dashboard->_getFieldById($id, $fieldid);
            $app->render('edit-module-field.php', array(
                'label' => $fieldData[0]['label'],
                'desc' => $fieldData[0]['desc']
            ));
        }
    })->via('GET', 'POST');

$app->map('/dashboard/edit-module/:id/delete-field/:fieldid',
    function ($id, $fieldid) use ($app, $dashboard) {
        if ($app->request()->isPost()) {
            $deletedField = $dashboard->_deleteField($id, $fieldid);
            $app->flash('message', "Field Removed Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/edit-module/' . $id);
        }
        if ($fieldid != '') {
            // find number of entries where module id or relationshipid == $id and $fieldid = get variable
            $activeRecords = $dashboard->_countItemsByModuleField($id, $fieldid);
            $app->render('delete-module-field.php', array(
                'activeRecords' => $activeRecords,
                'id' => $id,
                'fieldid' => $fieldid
            ));
        }
    })->via('GET', 'POST');


$app->map('/dashboard/edit-module/:moduleid/:relationshipid',
    function ($moduleid, $relationshipid) use ($app, $dashboard) {
        if ($app->request()->isPost()) {
            $dashboard->_saveModuleRelationshipField($app);
            $app->flash('message', "Field Saved Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/edit-module/' . $moduleid);
        }
        if ($moduleid != '') {
            // get active modules
            $moduleData = $dashboard->_getModule($moduleid);
            $moduleList = $dashboard->_getModules();
            $moduleFields = $dashboard->_getModuleFields($moduleid);
            $relationshipModuleData = $dashboard->_getModule($relationshipid);
            $relationshipFields = $dashboard->_getModuleFields($relationshipid, '', true);
            $app->render('edit-module.php', array(
                'moduleData' => $moduleData,
                'moduleList' => $moduleList,
                'moduleFields' => $moduleFields,
                'relationshipModuleData' => $relationshipModuleData,
                'relationshipFields' => $relationshipFields,
                'moduleid' => $moduleid,
                'relationshipid' => $relationshipid
            ));
        }
    })->via('GET', 'POST');

$app->get(
    '/dashboard/view-data-list/:id',
    function ($id) use ($app, $dashboard) {
        if ($id != '') {
            $moduleData = $dashboard->_getModule($id);
            $moduleItems = $dashboard->_getModuleItems($id, true);
            $moduleFields = $dashboard->_getModuleFields($id, true);
            $app->render('view-data-list.php', array(
                'moduleData' => $moduleData,
                'moduleItems' => $moduleItems,
                'moduleFields' => $moduleFields,
                'id' => $id
            ));
        }
    }
);

$app->map(
    '/dashboard/manage-media/:moduleid/:id',
    function ($moduleid, $id) use ($app, $dashboard, $mediaManager) {
        if ($app->request()->isPost()) {
            $mediaManager->_attachImages($id, $moduleid, $app);
            $app->flash('message', "Images Updated Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/manage-media/' . $moduleid . '/' . $id);
        }
        $images = $mediaManager->_getImages();
        $moduleData = $dashboard->_getModule($moduleid);
        $moduleFields = $dashboard->_getModuleFields($moduleid);
        $moduleItem = $dashboard->_getModuleItem($id);
        $moduleGalleryImages = $dashboard->_getModuleImages($id, 'imagegallery');
        $app->render('media-module.php', array(
            'moduleData' => $moduleData,
            'moduleItem' => $moduleItem,
            'moduleGallery' => $moduleGalleryImages,
            'moduleFields' => $moduleFields,
            'id' => $id,
            'images' => $images
        ));

    })->via('GET', 'POST');


$app->map(
    '/dashboard/edit-data-item/:id',
    function ($id) use ($app, $dashboard) {
        if ($app->request()->isPost()) {
            $moduleID = $dashboard->_getModuleByGroup($id);
            $dashboard->_updateModuleItem($app, $id, $moduleID);
            $app->flash('message', "Item Updated Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/edit-data-item/' . $id);
        }

        $moduleItem = $dashboard->_getModuleItem($id);
        $moduleID = $dashboard->_getModuleByGroup($id);
        $moduleData = $dashboard->_getModule($moduleID);
        $moduleFields = $dashboard->_getModuleFields($moduleID);
        $app->render('edit-data-item.php', array(
            'moduleItem' => $moduleItem,
            'moduleID' => $moduleID,
            'moduleData' => $moduleData,
            'moduleFields' => $moduleFields,
            'id' => $id
        ));

    })->via('GET', 'POST');

$app->map(
    '/dashboard/delete-data-item/:id',
    function ($id) use ($app, $dashboard) {
        if ($app->request()->isPost()) {
            $moduleID = $dashboard->_getModuleByGroup($id);
            $moduleFields = $dashboard->_deleteModuleItem($id);
            $app->flash('message', "Item Removed Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/view-data-list/' . $moduleID);
        }
        $app->render('delete-module-item.php', array('id' => $id));

    })->via('GET', 'POST');

$app->map(
    '/dashboard/add-data-item/:id',
    function ($id) use ($app, $dashboard) {
        if ($app->request()->isPost()) {
            $moduleFields = $dashboard->_saveModuleItem($app, $id);
            $app->flash('message', "Item Added Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/view-data-list/' . $id);
        }
        if ($id != '') {
            $moduleData = $dashboard->_getModule($id);
            $moduleFields = $dashboard->_getModuleFields($id);
            $app->render('create-data-item.php', array(
                'moduleData' => $moduleData,
                'moduleFields' => $moduleFields,
                'id' => $id
            ));
        }
    })->via('GET', 'POST');


$app->map('/login/',
    function () use ($dashboard, $app, $users) {
        if ($app->request()->isPost()) {
            // attempt to login
            $email = $app->request()->post('email');
            $password = $app->request()->post('password');
            $authenticate = $users->_authenticate($email, $password);
            if ($authenticate == true) {
                $_SESSION['user'] = $authenticate[0]['name'];
                $_SESSION['user-id'] = $authenticate[0]['id'];
                $_SESSION['user-email'] = $authenticate[0]['email'];
                $_SESSION['SITE_ROOT'] = SITE_ROOT;
                $app->redirect(SITE_ROOT . 'dashboard/');
            } else {
                $app->flash('message', "Login Failed");
            }
        }
        $app->render('login.php');

    })->via('GET', 'POST');

$app->get('/dashboard/logout/',
    function () use ($dashboard, $app) {
        // clear session
        unset($_SESSION['user']);
        unset($_SESSION['user-id']);
        unset($_SESSION['user-email']);
        unset($_SESSION['language']);
        $app->view()->setData('user', null);
        $app->redirect(SITE_ROOT . 'login/');
    }
);


$app->get('/dashboard/users/',
    function () use ($dashboard, $app, $users) {
        $activeUsers = $users->_getAllUsers();
        $app->render('manage-users.php', array('users' => $activeUsers));
    }
);

$app->map('/dashboard/users/add-user',
    function () use ($dashboard, $app, $users) {
        if ($app->request()->isPost()) {
            // create user
            $newUser = $users->_createUser($app);
            $app->flash('message', "User Added Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/users/');

        }
        $userPrivilegeOptions = $users->_getComponentsPrivileges();
        // load form 
        $app->render('create-user.php', array('userPrivilegeOptions' => $userPrivilegeOptions));

    })->via('GET', 'POST');

$app->map('/dashboard/users/edit-user/:id',
    function ($userId) use ($dashboard, $app, $users) {
        if ($app->request()->isPost()) {
            // update user
            $updateUser = $users->_updateUser($app);
            $app->flash('message', "User Updated Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/users/');
        }
        $userData = $users->_getUser($userId);
        $componentPrivilegeOptions = $users->_getComponentsPrivileges();
        $userPrivilegeOptions = $users->_getUserPrivileges($userId);
        $app->render('edit-user.php', array('userData' => $userData, 'componentPrivilegeOptions' => $componentPrivilegeOptions, 'userPrivilegeOptions' => $userPrivilegeOptions));

    })->via('GET', 'POST');

$app->map('/dashboard/users/delete-user/:id',
    function ($userId) use ($dashboard, $app, $users) {
        if ($app->request()->isPost()) {
            // DELETE USER
            $users->_deleteUser($userId);
            $app->flash('message', "User Removed Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/users/');
        }
        $app->render('delete-user.php', array('userId' => $userId));
    })->via('GET', 'POST');

$app->map('/dashboard/admin-tools/analytics/',
    function () use ($dashboard, $app, $adminTools) {
        $analytics = $adminTools->_getAnalytics(true);
        $app->render('analytics.php', array('analytics' => $analytics));

    })->via('GET', 'POST');

$app->map('/dashboard/admin-tools/analytics/create-analytic/',
    function () use ($dashboard, $app, $adminTools) {
        if ($app->request()->isPost()) {
            $adminTools->_addAnalytics($app);
            $app->flash('message', "Analytics Added Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/admin-tools/analytics');
        }

        $app->render('create-analytics.php');

    })->via('GET', 'POST');


$app->map('/dashboard/admin-tools/analytics/edit-analytic/:id',
    function ($id) use ($dashboard, $app, $adminTools) {
        if ($app->request()->isPost()) {
            $adminTools->_editAnalytics($id, $app);
            $app->flash('message', "Analytics Updated Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/admin-tools/analytics');
        }
        $analyticsData = $adminTools->_getAnalytic($id);
        $app->render('edit-analytics.php', array('analyticsData' => $analyticsData));

    })->via('GET', 'POST');

$app->map('/dashboard/admin-tools/site-settings/',
    function () use ($dashboard, $app, $adminTools) {
        if ($app->request()->isPost()) {
            $adminTools->_updateSiteSettings($app);
            $app->flash('message', "Site Settings Updated Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/admin-tools/site-settings/');
        }
        $siteSettings = $adminTools->_getSiteSettings();
        foreach ($siteSettings as $key => $setting) {
            if ($setting['name'] == 'siteName') {
                $siteName = $setting['value'];
            }
            if ($setting['name'] == 'siteDesc') {
                $siteDesc = $setting['value'];
            }
        }
        $app->render('site-settings.php', array('siteName' => $siteName, 'siteDesc' => $siteDesc));

    })->via('GET', 'POST');

$app->map('/dashboard/admin-tools/site-languages/',
    function () use ($dashboard, $app, $adminTools) {
        if ($app->request()->isPost()) {
            $adminTools->_updateSiteLanguages($app);
            $app->flash('message', "Site Languages Updated Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/admin-tools/site-languages/');
        }
        $siteLanguages = $adminTools->_getSiteLanguages();

        $app->render('site-languages.php', array('siteLanguages' => $siteLanguages));

    })->via('GET', 'POST');


$app->map('/dashboard/admin-tools/templates/',
    function () use ($dashboard, $app, $adminTools) {
        $templates = $adminTools->_getTemplates();
        $app->render('templates.php', array('templates' => $templates));

    })->via('GET', 'POST');

$app->map('/dashboard/admin-tools/templates/create-template/',
    function () use ($dashboard, $app, $adminTools) {
        if ($app->request()->isPost()) {
            $adminTools->_createTemplate($app);
            $app->flash('message', "Template Created Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/admin-tools/templates/');
        }
        $templates = $adminTools->_getTemplateTypes();
        $app->render('create-template.php', array('templates' => $templates));

    })->via('GET', 'POST');


$app->map('/dashboard/admin-tools/templates/edit-template/:id',
    function ($id) use ($dashboard, $app, $adminTools) {
        if ($app->request()->isPost()) {
            $adminTools->_updateTemplate($id, $app);
            $app->flash('message', "Template Updated Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/admin-tools/templates/');
        }
        $templateData = $adminTools->_getTemplate($id);
        $templates = $adminTools->_getTemplateTypes();
        $app->render('edit-template.php', array('templates' => $templates, 'templateData' => $templateData));
    })->via('GET', 'POST');

$app->post('/dashboard/pages/inline-update/', function () use ($app, $pages) {
    //update page
    if ($app->request->isAjax() && isset($_SESSION['user-id'])) {
        $id = $app->request->post('pageId');


        if ($app->request->post('activeLanguage') != '') {
            $page = $pages->_updatePageLanguage($id, $app);
        } else {
            $page = $pages->_updatePage($id, $app);
        }
        $app->flash('message', "Page Content Updated Successfully");
        return true;
    }
});

$app->map('/dashboard/admin-tools/url-redirects/',
    function () use ($dashboard, $app, $adminTools) {
        // get pages
        $urlRedirects = $adminTools->_getURLRedirects();
        $app->render('url-redirects.php', array('urlRedirects' => $urlRedirects));

    })->via('GET', 'POST');

$app->map('/dashboard/admin-tools/url-redirects/delete-redirect/:id',
    function ($id) use ($dashboard, $app, $adminTools) {
        if ($app->request()->isPost()) {
            $adminTools->_deleteRedirect($id);
            $app->flash('message', "Redirect Removed Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/admin-tools/url-redirects/');
        }
        $app->render('delete-redirect.php', array('redirectId' => $id));

    })->via('GET', 'POST');

$app->map('/dashboard/admin-tools/analytics/delete-analytic/:id',
    function ($id) use ($dashboard, $app, $adminTools) {
        if ($app->request()->isPost()) {
            $adminTools->_deleteAnalytic($id);
            $app->flash('message', "Analytics Script Removed Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/admin-tools/analytics/');
        }
        $app->render('delete-analytics.php', array('analyticsId' => $id));

    })->via('GET', 'POST');

$app->map('/dashboard/admin-tools/url-redirects/create-redirect/',
    function () use ($dashboard, $app, $adminTools) {
        if ($app->request()->isPost()) {
            $adminTools->_saveURLRedirect($app);
            $app->flash('message', "Redirect Created Successfully");
            $app->redirect(SITE_ROOT . 'dashboard/admin-tools/url-redirects/');
        }
        $app->render('create-redirect.php');

    })->via('GET', 'POST');