<div class="sticky">
    <nav class="top-bar" data-topbar role="navigation" style="margin-bottom: 20px;">
        <ul class="title-area">
            <li class="name">
                <h1><a href="<?= SITE_ROOT; ?>dashboard/">Rainforest</a></h1>
            </li>
            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
            <ul class="left">
                <li class="active has-dropdown">
                    <a href="<?= SITE_ROOT; ?>dashboard/">Modules</a>
                    <ul class="dropdown">
                        <li><a href="<?= SITE_ROOT . 'dashboard/' ?>">Create Module</a></li>
                        <li><a href="<?= SITE_ROOT . 'dashboard/' ?>">Manage Modules</a></li>
                        <li class="divider"></li>
                        <li><label>ACTIVE MODULES</label></li>
                        <?php foreach ($modules as $module) { ?>
                            <li>
                                <a href="<?= SITE_ROOT . 'dashboard/view-data-list/' . $module['id']; ?>"><?= $module['name']; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
            <ul class="left">
                <li class="active"><a href="<?= SITE_ROOT; ?>dashboard/media-manager/">Media Manager</a></li>
                <li class="active has-dropdown">
                    <a href="#">Pages</a>
                    <ul class="dropdown">
                        <li><a href="<?= SITE_ROOT; ?>dashboard/pages/">Pages</a></li>
                        <li><a href="<?= SITE_ROOT; ?>dashboard/blog-posts/">Blog Posts</a></li>
                        <li><a href="<?= SITE_ROOT; ?>dashboard/landing-pages/">Landing Pages</a></li>
                    </ul>
                </li>
                <li class="active has-dropdown">
                    <a href="<?= SITE_ROOT; ?>dashboard/users/">Users</a>
                    <ul class="dropdown">
                        <li><a href="<?= SITE_ROOT; ?>dashboard/users/add-user">Add User</a></li>
                        <li><a href="<?= SITE_ROOT; ?>dashboard/users/">Manager Users</a></li>
                    </ul>
                </li>
                <li class="active has-dropdown">
                    <a href="#">Admin Tools</a>
                    <ul class="dropdown">
                        <li><a href="<?= SITE_ROOT; ?>dashboard/admin-tools/analytics/">Analytics</a></li>
                        <li><a href="<?= SITE_ROOT; ?>dashboard/admin-tools/site-settings/">Site Settings</a></li>
                        <li><a href="<?= SITE_ROOT; ?>dashboard/admin-tools/templates/">Website Templates</a></li>
                        <li><a href="<?= SITE_ROOT; ?>dashboard/admin-tools/url-redirects/">URL Redirects</a></li>
                        <li><a href="<?= SITE_ROOT; ?>dashboard/admin-tools/site-languages/">Site Languages</a></li>
                    </ul>
                </li>
                <li class="has-form"><a href="#" class="button warning" id="toggle">Start Editing</a></li>
                <?php if (isset($flash['message'])) { ?>
                    <li class="has-form"><a href="#" class="button success" id="toggle"><?= $flash['message']; ?> </a>
                    </li>
                <?php } ?>
            </ul>
            <ul class="right">

                <li class="has-form"><a href="#" data-reveal-id="myModal" class="button secondary">Support</a></li>
                <li class="has-dropdown">
                    <a href="#">Hi, <?= $user; ?></a>
                    <ul class="dropdown">
                        <li><a href="<?= SITE_ROOT; ?>dashboard/users/edit-user/<?= $userId; ?>">Edit Profile</a></li>
                        <li><a href="<?= SITE_ROOT; ?>dashboard/logout/">Logout</a></li>

                    </ul>
                </li>

            </ul>
        </section>
    </nav>
</div>
<div id="myModal" class="reveal-modal" data-reveal>
    <h2>Contact Rainforest</h2>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. </p>

    <form action="<?= SITE_ROOT . "dashboard/contact-support/"; ?>" method="post">
        <div class="row">
            <div class="large-12 columns"><label>Your Name <input type="text" name="userName" value="<?= $user; ?>"
                                                                  placeholder=""/> </label></div>
        </div>
        <div class="row">
            <div class="large-12 columns"><label>Your Email <input type="text" name="userEmail"
                                                                   value="<?= $userEmail; ?>" placeholder=""/> </label>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="large-12 columns"><label> Department
                    <select class="moduleType" name="contactType">
                        <option value="1">Customer Service</option>
                        <option value="2">Technical Support</option>
                        <option value="3">Account Representative</option>
                    </select> </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <label> Message
                    <textarea name="message" rows="10"></textarea> </label>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <input type="submit" class="button small right" value="Submit"/>
            </div>
        </div>
    </form>
    <a class="close-reveal-modal">&#215;</a>
</div>
  