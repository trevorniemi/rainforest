<div class="row">
    <div class="large-12 columns">
        <a href="<?= SITE_ROOT . "dashboard/users/"; ?>" class="button small alert">Back To User List</a>
    </div>
</div>
<div class="row">
    <div class="large-10 columns">
        <h2>Edit User</h2>
    </div>
</div>
<form action=""
      method="post" <?php if ($componentPrivileges[1]['userStatus'] == 0) { ?> style="pointer-events: none; opacity: 0.4;" <?php } ?>>
    <input type="hidden" name="userId" value="<?= $userData['id']; ?>"/>

    <div class="row">
        <div class="large-12 columns"><label>Name <input type="text" name="userName" value="<?= $userData['name']; ?>"/>
            </label></div>
    </div>
    <div class="row">
        <div class="large-12 columns"><label>Email <input type="text" name="userEmail"
                                                          value="<?= $userData['email']; ?>" placeholder=""/> </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns"><label>Department <input type="text" value="<?= $userData['department']; ?>"
                                                               name="userDepartment" placeholder=""/> </label></div>
    </div>
    <div class="row">
        <div class="large-12 columns"><label>Update Password <input type="password" name="userPassword1"/> </label>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns"><label>Re-Enter New Password <input type="password" name="userPassword2"/>
            </label></div>
    </div>
    <div class="row">
        <div class="large-12 columns"><h3>User Privileges</h3></div>
    </div>


    <?php
    $i = 0;
    foreach ($componentPrivilegeOptions as $userPrivilegeOption) {
        ?>
        <div class="row">
            <div class="large-3 columns">
                <h4><?= $userPrivilegeOption['label']; ?></h4>
            </div>
        </div>
        <?php foreach ($userPrivilegeOption['privileges'] as $key => $privelegeList) { ?>
            <div class="row">
                <div class="large-3 columns">

                    <label><?= $privelegeList['name']; ?></label>
                </div>
                <div class="large-9 columns">
                    <input type="radio" name="<?= $privelegeList['id']; ?>"
                           value="1" <?php if ($userPrivilegeOptions[$i]['status'] == 1) {
                        echo "checked";
                    } ?>> Yes
                    <input type="radio" name="<?= $privelegeList['id']; ?>"
                           value="0" <?php if ($userPrivilegeOptions[$i]['status'] == 0) {
                        echo "checked";
                    } ?>> No
                </div>
            </div>
            <?php $i++;
        } ?>
    <?php } ?>
    <div class="row">
        <div class="large-12 columns">
            <input type="submit" class="button small right" value="Submit"/>
        </div>
    </div>
</form>