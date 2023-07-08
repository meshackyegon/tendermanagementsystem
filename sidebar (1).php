<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="dashboard.php" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="assets/img/logos/fao.png" style="width:150px">
            </span>

        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>



    <ul class="menu-inner py-1">
        <?php
        if ($_SESSION['type'] == "admin" || $_SESSION['type'] == "dealer") {

            if ($_SESSION['type'] == "admin") {
                $sql2 = "SELECT * FROM admin WHERE id = '$_SESSION[id]' ";
                $row2 = select_rows($sql2)[0];
            }

            if ($_SESSION['type'] == "dealer") {
                $sql2 = "SELECT * FROM personnel WHERE id = '$_SESSION[id]' ";
                $row2 = select_rows($sql2)[0];
            }

            $sql = "SELECT * FROM roles WHERE id = '$row2[role_id]' ";
            $row = select_rows($sql)[0];
            $roles = $row['roles'];



        ?>



            <!-- Dashboards -->
            <li class="menu-item <?= $page == "dashboard" ? "active" : "" ?>">
                <a href="dashboard.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>



            <!-- Master Control -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Master Control</span>
            </li>

            <?php
            if ($row2['admin_type'] == 'superadmin') {
            ?>
                <li class="menu-item <?= $page == "role" ? "active" : "" ?>">
                    <a href="roles.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user-x"></i>
                        <div data-i18n="Roles">All Roles</div>
                    </a>

                </li>

                <li class="menu-item <?= $page == "roles" ? "active" : "" ?>">
                    <a href="view_roles.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user-x"></i>
                        <div data-i18n="View Roles">View Roles</div>
                    </a>

                </li>
            <?php
            }
            ?>



            <?php
            $name = 'all_admin_privileges';

            if (strpos($roles, $name) !== false) { ?>


                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-user-circle"></i>
                        <div data-i18n="Admins">Admins</div>
                    </a>
                    <ul class="menu-sub">
                        <!--<li class="menu-item <?= $page == "admin" ? "active" : "" ?>">-->
                        <!--    <a href="admin.php" class="menu-link">-->
                        <!--        <div data-i18n="Create An Admin">Create An Admin</div>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <li class="menu-item <?= $page == "admins" ? "active" : "" ?>">
                            <a href="view_admins.php" class="menu-link">
                                <div data-i18n="View Users">View Users</div>
                            </a>
                        </li>
                        <li class="menu-item <?= $page == "admins" ? "active" : "" ?>">
                            <a href="user_type.php" class="menu-link">
                                <div data-i18n="User Type">User Type</div>
                            </a>
                        </li>
                    </ul>
                </li>

            <?php
            }
            ?>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user-circle"></i>
                    <div data-i18n="personnels">personnels</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?= $page == "personnel" ? "active" : "" ?>">
                        <a href="personnel.php" class="menu-link">
                            <div data-i18n="Create a personnel">Create a personnel</div>
                        </a>
                    </li>
                    <li class="menu-item <?= $page == "personnels" ? "active" : "" ?>">
                        <a href="view_personnel.php" class="menu-link">
                            <div data-i18n="View personnel">View personnel</div>
                        </a>
                    </li>
                </ul>
            </li>

            <?php
            $name = 'all_project_privileges';

            if (strpos($roles, $name) !== false) { ?>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-food-menu"></i>
                        <div data-i18n="Projects">Projects</div>
                    </a>
                    <ul class="menu-sub">
                        <!--<li class="menu-item <?= $page == "manager" ? "active" : "" ?>">-->
                        <!--    <a href="manager.php" class="menu-link">-->
                        <!--        <div data-i18n="Create A Project Manager">Create A Project Manager</div>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <li class="menu-item <?= $page == "managers" ? "active" : "" ?>">
                            <a href="view_managers.php" class="menu-link">
                                <div data-i18n="View Project Managers">View Project Managers</div>
                            </a>
                        </li>
                        <li class="menu-item <?= $page == "project" ? "active" : "" ?>">
                            <a href="project.php" class="menu-link">
                                <div data-i18n="Create A Project">Create A Project</div>
                            </a>
                        </li>
                        <li class="menu-item <?= $page == "projects" ? "active" : "" ?>">
                            <a href="view_projects.php" class="menu-link">
                                <div data-i18n="View Projects">View Projects</div>
                            </a>
                        </li>
                         <li class="menu-item <?= $page == "edit_login" ? "active" : "" ?>">
                            <a href="edit_login.php" class="menu-link">
                                <div data-i18n="Edit Login Image">Edit Login Image</div>
                            </a>
                        </li>
                    </ul>
                </li>

            <?php
            }
            ?>


            <?php
            $name = 'all_season_privileges';

            if (strpos($roles, $name) !== false) { ?>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-cloud-snow"></i>
                        <div data-i18n="Seasons">Seasons</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item <?= $page == "season" ? "active" : "" ?>">
                            <a href="season.php" class="menu-link">
                                <div data-i18n="Create A Season">Create A Season</div>
                            </a>
                        </li>
                        <li class="menu-item <?= $page == "seasons" ? "active" : "" ?>">
                            <a href="view_seasons.php" class="menu-link">
                                <div data-i18n="View Seasons">View Seasons</div>
                            </a>
                        </li>
                    </ul>
                </li>

            <?php
            }
            ?>


            <?php
            $name = 'all_enumerator_privileges';

            if (strpos($roles, $name) !== false) { ?>


                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-sitemap"></i>
                        <div data-i18n="Enumerators">Enumerators</div>
                    </a>
                    <ul class="menu-sub">
                        <!--<li class="menu-item <?= $page == "enumerator" ? "active" : "" ?>">-->
                        <!--    <a href="enumerator.php" class="menu-link">-->
                        <!--        <div data-i18n="Create An Enumerator">Create An Enumerator</div>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <li class="menu-item <?= $page == "enumerators" ? "active" : "" ?>">
                            <a href="view_enumerators.php" class="menu-link">
                                <div data-i18n="View Enumerators">View Enumerators</div>
                            </a>
                        </li>
                        <li class="menu-item <?= $page == "notes" ? "active" : "" ?>">
                            <a href="manage_note.php" class="menu-link">
                                <div data-i18n="Manage Notes">Manage Notes</div>
                            </a>
                        </li>
                    </ul>
                </li>

            <?php
            }
            ?>


            <?php
            $name = 'all_dealer_privileges';

            if (strpos($roles, $name) !== false) { ?>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bxs-pear"></i>
                        <div data-i18n="Agro Dealers">Agro Dealers</div>
                    </a>
                    <ul class="menu-sub">
                        <!--<li class="menu-item <?= $page == "dealer" ? "active" : "" ?>">-->
                        <!--    <a href="agrodealer.php" class="menu-link">-->
                        <!--        <div data-i18n="Create An Agro Dealer">Create An Agro Dealer</div>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <li class="menu-item <?= $page == "dealers" ? "active" : "" ?>">
                            <a href="view_agrodealers.php" class="menu-link">
                                <div data-i18n="View Agro Dealers">View Agro Dealers</div>
                            </a>
                        </li>

                    </ul>
                </li>

            <?php
            }
            ?>

            <!--<li class="menu-item">-->
            <!--    <a href="javascript:void(0);" class="menu-link menu-toggle">-->
            <!--        <i class="menu-icon tf-icons bx bx-cloud-snow"></i>-->
            <!--        <div data-i18n="Seasons">Seasons</div>-->
            <!--    </a>-->
            <!--    <ul class="menu-sub">-->
            <!--        <li class="menu-item <?= $page == "season" ? "active" : "" ?>">-->
            <!--            <a href="season.php" class="menu-link">-->
            <!--                <div data-i18n="Create A Season">Create A Season</div>-->
            <!--            </a>-->
            <!--        </li>-->
            <!--        <li class="menu-item <?= $page == "seasons" ? "active" : "" ?>">-->
            <!--            <a href="view_seasons.php" class="menu-link">-->
            <!--                <div data-i18n="View Seasons">View Seasons</div>-->
            <!--            </a>-->
            <!--        </li>-->
            <!--    </ul>-->
            <!--</li>-->

            <!-- E-Registry -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">E-Registry</span>
            </li>

            <?php
            $name = 'all_registry_privileges';

            if (strpos($roles, $name) !== false) { ?>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-printer"></i>
                        <div data-i18n="E-Registries">E-Registries</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item <?= $page == "registry" ? "active" : "" ?>">
                            <a href="registry.php" class="menu-link">
                                <div data-i18n="Create An E-Registry">Create An E-Registry</div>
                            </a>
                        </li>
                        <li class="menu-item <?= $page == "registries" ? "active" : "" ?>">
                            <a href="view_beneficiary.php" class="menu-link">
                                <div data-i18n="View E-Registries">View E-Registries</div>
                            </a>
                        </li>
                           <li class="menu-item <?= $page == "approve" ? "active" : "" ?>">
                            <a href="allocate_project.php" class="menu-link">
                                <div data-i18n="Assign Project">Assign Project</div>
                            </a>
                        </li>
                         <li class="menu-item <?= $page == "approve" ? "active" : "" ?>">
                            <a href="approve.php" class="menu-link">
                                <div data-i18n="Approve">Approve</div>
                            </a>
                        </li>
                        <li class="menu-item <?= $page == "registries" ? "active" : "" ?>">
                            <a href="multi.php" class="menu-link">
                                <div data-i18n="Multiple Approval">Multiple Approval</div>
                            </a>
                        </li>
                    </ul>
                </li>

            <?php
            }
            ?>


            <!-- Kits and Implements -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Kits And Implements</span>
            </li>




            <?php
            $name = 'all_implement_privileges';

            if (strpos($roles, $name) !== false) { ?>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-test-tube"></i>
                        <div data-i18n="Implements">Implements</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item <?= $page == "implement" ? "active" : "" ?>">
                            <a href="implement.php" class="menu-link">
                                <div data-i18n="Create An Implement">Create An Implement</div>
                            </a>
                        </li>
                        <li class="menu-item <?= $page == "implements" ? "active" : "" ?>">
                            <a href="view_implements.php" class="menu-link">
                                <div data-i18n="View Implements">View Implements</div>
                            </a>
                        </li>
                    </ul>
                </li>

            <?php
            }
            ?>


            <?php
            $name = 'all_kit_privileges';

            if (strpos($roles, $name) !== false) { ?>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-blanket"></i>
                        <div data-i18n="Kits">Kits</div>
                    </a>
                    <ul class="menu-sub">

                        <li class="menu-item <?= $page == "kit" ? "active" : "" ?>">
                            <a href="kit.php" class="menu-link">
                                <div data-i18n="Create A Kit">Create A Kit</div>
                            </a>
                        </li>
                        <li class="menu-item <?= $page == "kits" ? "active" : "" ?>">
                            <a href="view_kits.php" class="menu-link">
                                <div data-i18n="View Kits">View Kits</div>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php
            }
            ?>

            <!-- Vouchers -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Vouchers</span>
            </li>

            <?php
            $name = 'all_group_privileges';

            if (strpos($roles, $name) !== false) { ?>

                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-male-female"></i>
                        <div data-i18n="Groups">Groups</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item  <?= $page == "group" ? "active" : "" ?>">
                            <a href="group.php" class="menu-link">
                                <div data-i18n="Create A Group">Create A Group</div>
                            </a>
                        </li>
                        <li class="menu-item  <?= $page == "group_members" ? "active" : "" ?>">
                            <a href="add_people_to_group.php" class="menu-link">
                                <div data-i18n="Add Group Members">Add Group Members</div>
                            </a>
                        </li>
                        <li class="menu-item  <?= $page == "groups" ? "active" : "" ?>">
                            <a href="view_groups.php" class="menu-link">
                                <div data-i18n="View Groups">View Groups</div>
                            </a>
                        </li>
                    </ul>
                </li>

            <?php
            }
            ?>

            <?php
            $name = 'all_voucher_privileges';

            if (strpos($roles, $name) !== false) { ?>


                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-donate-heart"></i>
                        <div data-i18n="Vouchers">Vouchers</div>
                    </a>
                    <ul class="menu-sub">
                        <!--<li class="menu-item  <?= $page == "vouchers" ? "active" : "" ?>">-->
                        <!--    <a href="view_all_vouchers.php" class="menu-link">-->
                        <!--        <div data-i18n="View All Vouchers">View All Vouchers</div>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <li class="menu-item  <?= $page == "redeem" ? "active" : "" ?>">
                            <a href="redeem_voucher.php" class="menu-link">
                                <div data-i18n="Redeem Vouchers">Redeem Vouchers</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <div data-i18n="Create A Voucher">Create A Voucher</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item <?= $page == "single" ? "active" : "" ?>">
                                    <a href="single_voucher.php" class="menu-link">
                                        <div data-i18n="Single Voucher">Single Voucher</div>
                                    </a>
                                </li>
                                <li class="menu-item <?= $page == "mass" ? "active" : "" ?>">
                                    <a href="mass_voucher.php" class="menu-link">
                                        <div data-i18n="Mass Voucher">Mass Voucher</div>
                                    </a>
                                </li>
                                <!--<li class="menu-item <?= $page == "farm" ? "active" : "" ?>">-->
                                <!--    <a href="farm_voucher.php" class="menu-link">-->
                                <!--        <div data-i18n="Farm Vouchers">Farm Vouchers</div>-->
                                <!--    </a>-->
                                <!--</li>-->
                            </ul>
                        </li>

                        <?php
                        $name = 'all_dealer_voucher_privileges';

                        if (strpos($roles, $name) !== false) { ?>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <div data-i18n="Agro Dealer Voucher">Agro Dealer Voucher</div>
                                </a>
                                <ul class="menu-sub">
                                    <li class="menu-item <?= $page == "add_vouchers_to_agro_dealer" ? "active" : "" ?>">
                                        <a href="add_vouchers_to_agro_dealer.php" class="menu-link">
                                            <div data-i18n="Add Voucher To Agro Dealer">Add Voucher To Agro Dealer</div>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        <?php
                        }
                        ?>

                        <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <div data-i18n="View Vouchers">View Vouchers</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item <?= $page == "singles" ? "active" : "" ?>">
                                    <a href="view_single_vouchers.php" class="menu-link">
                                        <div data-i18n="View Single Voucher">View Single Voucher</div>
                                    </a>
                                </li>
                                <li class="menu-item <?= $page == "masses" ? "active" : "" ?>">
                                    <a href="view_mass_vouchers.php" class="menu-link">
                                        <div data-i18n="View Mass Voucher">View Mass Voucher</div>
                                    </a>
                                </li>
                                <!--<li class="menu-item <?= $page == "farms" ? "active" : "" ?>">-->
                                <!--    <a href="view_farm_vouchers.php" class="menu-link">-->
                                <!--        <div data-i18n="View Farm Vouchers">View Farm Vouchers</div>-->
                                <!--    </a>-->
                                <!--</li>-->
                            </ul>
                        </li>

                    </ul>
                </li>


            <?php
            }
            ?>

            <!-- Charts & Reports -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Charts And Reports</span>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-chart"></i>
                    <div data-i18n="Reports">Reports</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?= $page == "reports" ? "active" : "" ?> ">
                        <a href="reports.php" class="menu-link">
                            <div data-i18n="General Reports">General Reports</div>
                        </a>
                    </li>
                    <li class="menu-item <?= $page == "beneficiary_reports" ? "active" : "" ?> ">
                        <a href="beneficiary_report.php" class="menu-link">
                            <div data-i18n="Beneficiary Reports">Beneficiary Reports</div>
                        </a>
                    </li>
                    <li class="menu-item <?= $page == "report per project" ? "active" : "" ?> ">
                        <a href="report_per_project.php" class="menu-link">
                            <div data-i18n="Report Per Project">Report Per Project</div>
                        </a>
                    </li>
                    <li class="menu-item <?= $page == "voucher_reports" ? "active" : "" ?> ">
                        <a href="voucher_report.php" class="menu-link">
                            <div data-i18n="Voucher Reports">Voucher Reports</div>
                        </a>
                    </li>
                    <li class="menu-item <?= $page == "enumerator_reports" ? "active" : "" ?> ">
                        <a href="enumerator_report.php" class="menu-link">
                            <div data-i18n="Enumerator Reports">Enumerator Reports</div>
                        </a>
                    </li>
                     <li class="menu-item <?= $page == "audit_report" ? "active" : "" ?> ">
                        <a href="audit_report.php" class="menu-link">
                            <div data-i18n="Audit Reports">Audit Reports</div>
                        </a>
                    </li>
                </ul>

            </li>
        <?php } ?>

        <?php
        if ($_SESSION['type'] == "enumerator") {
        ?>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-chart"></i>
                    <div data-i18n="Enumerator">Enumerator</div>
                </a>
                <ul>
                    <li class="menu-item <?= $page == "dashboard" ? "active" : "" ?>">
                        <a href="indexx.php" class="menu-link">
                            <div data-i18n="Dashboard">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item <?= $page == "registry" ? "active" : "" ?>">
                        <a href="registry.php" class="menu-link">
                            <div data-i18n="Create An E-Registry">Create An E-Registry</div>
                        </a>
                    </li>
                    <li class="menu-item <?= $page == "profile" ? "active" : "" ?>">
                        <a href="profile.php" class="menu-link">
                            <div data-i18n="Profile">Profile</div>
                        </a>
                    </li>
                    <li class="menu-item <?= $page == "people_enumerated" ? "active" : "" ?>">
                        <a href="people_enumerated.php" class="menu-link">
                            <div data-i18n="People Enumerated">People Enumerated</div>
                        </a>
                    </li>
                </ul>
            </li>

        <?php } ?>
        <?php
        if ($_SESSION['type'] == "project") {
        ?>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-chart"></i>
                    <div data-i18n="Project Manager">Project Manager</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?= $page == "project" ? "active" : "" ?>">
                        <a href="project.php" class="menu-link">
                            <div data-i18n="Create A Project">Create A Project</div>
                        </a>
                    </li>

                    <li class="menu-item <?= $page == "enroll_project" ? "active" : "" ?>">
                        <a href="enroll_project.php" class="menu-link">
                            <div data-i18n="Enroll to Project">Enroll to Project</div>
                        </a>
                    </li>
                    <li class="menu-item <?= $page == "voucher_allocation" ? "active" : "" ?>">
                        <a href="voucher_allocation.php" class="menu-link">
                            <div data-i18n="Voucher Allocation">Voucher Allocation</div>
                        </a>
                    </li>
                    <!--<li class="menu-item">-->
                    <!--    <a href="index.php?logout" class="menu-link">-->
                    <!--        <div data-i18n="Logout">Logout</div>-->
                    <!--    </a>-->

                    <!--</li>-->

                </ul>
            </li>
        <?php } ?>
        <?php
        if ($_SESSION['type'] == "agency") {
        ?>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-chart"></i>
                    <div data-i18n="Donor">Donor</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item <?= $page == "project" ? "active" : "" ?>">
                        <a href="project.php" class="menu-link">
                            <div data-i18n="Create A Project">Create A Project</div>
                        </a>
                    </li>
                </ul>
            </li>
            <!--<li class="menu-item">-->
            <!--    <a href="index.php?logout" class="menu-link">-->
            <!--        <div data-i18n="Logout">Logout</div>-->
            <!--    </a>-->

            </li>

        <?php } ?>

    </ul>

</aside>