<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <link href="<?= RAINFOREST_ROOT_URL; ?>libraries/css/foundation.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?= RAINFOREST_ROOT_URL; ?>libraries/js/vendor/jquery.js"></script>
    <script type="text/javascript" src="<?= RAINFOREST_ROOT_URL; ?>libraries/js/foundation.min.js"></script>
    <script type="text/javascript" src="<?= RAINFOREST_ROOT_URL; ?>libraries/js/jquery.tablesorter.min.js"></script>
    <script type="text/javascript" src="<?= RAINFOREST_ROOT_URL; ?>libraries/js/jquery.uitablefilter.js"></script>
    <script type="text/javascript" src="<?= RAINFOREST_ROOT_URL; ?>libraries/js/vendor/modernizr.js"></script>
    <script type="text/javascript" src="<?= RAINFOREST_ROOT_URL; ?>libraries/ckeditor/ckeditor.js"></script>
</head>

<body>
<div class="panel">
    <?php if (isset($flash['message'])) { ?>
        <div class="row">
            <div class="large-12 columns">
                <div data-alert class="alert-box alert radius">
                    <?php echo $flash['message']; ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="large-12 columns">
            <h2 class="text-center">Login</h2>
        </div>
    </div>
    <form action="" method="post">
        <div class="row">
            <div class="large-4 large-centered columns">
                <label>Email
                    <input name="email" type="text"/>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="large-4 large-centered columns">
                <label>Password
                    <input name="password" type="password"/>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="large-4 large-centered  columns">
                <a href="" style="font-size: 13px;">Forgot Password</a> <input type="submit" class="button right"
                                                                               value="Submit"/>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="large-4  large-centered columns">
            <p>
            <hr/>
            </p>
            <p class="text-center"><a href="<?= SITE_ROOT; ?>" class="button small-6 warning"
                                      style="font-size: 12px; padding-left: 0px; padding-right: 0px;">BACK TO
                    WEBSITE</a></p>
        </div>
    </div>
</div>
</panel>
<div class="row">
    <div class="large-12 columns">
        <h3 class="text-center">News and Information</h3>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <p class="lead">2/7/2015</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.</p>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <p class="lead">1/23/2015</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.</p>
    </div>
</div>
</body>
</html>