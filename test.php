<div class="container">
    <h3 class="p-3">E-Registry</h3>

    <?php if (!isset($_SESSION['project'])) { ?>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Project</h3>
            </div>
            <form method="post" action="model/change_project.php">
                <div class="card-body">
                    <div class="form-group">
                        <label>Choose project</label>
                        <select class="form-control" required name="project">
                            <option disabled value="">Choose project</option>
                            <?php
                            $sql = "select * from project";
                            $row = select_rows($sql);
                            foreach ($row as $item) {
                            ?>
                                <option value="<?= $item['id'] ?>"><?= $item['project_acronym'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <?php
                submit();
                ?>
            </form>
        </div>
    <?php } else {
        $sql = "select * from project where id = '$_SESSION[project]'";
        $row = select_rows($sql)[0];
    ?>

        <div class="row">
            <h6 class="p-3">You are adding a beneficiary under <?= $row['project_acronym'] ?>
                <span class="text-blue">
                    <a href="model/clear_project.php">
                        change
                    </a>
                </span>
            </h6>
            <div class="card card-indigo">
                <div class="card-header">
                    <h3 class="card-title">E-Registry Form</h3>
                </div>
                <form id="testform" method="post" enctype="multipart/form-data" action="model/create_registry.php">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="gdpr" class="form-label">GDPR</label>
                            <input class="form-check-input" name="gdpr" type="text" value="gdpr_yes" id="flexCheckDefault1">
                        </div>
                        <div class="form-group">
                            <label for="data_collection" class="form-label">Data Collection</label>
                            <input class="form-check-input" name="data_collection" type="text" value="data_collection_yes" id="flexCheckDefault1">
                        </div>
                        <div class="form-group">
                            <label for="registration_date" class="form-label">Registration Date</label>
                            <input type="text" name="registration_date" class="form-control" id="registration_date">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Type of Season</label>
                            <input type="text" name="response_type" class="form-control" id="response_type">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Type of Intervention</label>
                            <input type="text" name="intervention_type" class="form-control" id="intervention_type">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Agency/Organization benefiting from</label>
                            <input readonly name="agency_type" class="form-control" value="<?= $row['donor'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="beneficiary_name" class="form-label">Beneficiary Name</ <div class="form-group">
                                <label for="beneficiary_name" class="form-label">Beneficiary Name</label>
                                <input type="text" name="beneficiary_name" class="form-control" id="beneficiary_name">
                        </div>
                        <div class="form-group">
                            <label for="beneficiary_age" class="form-label">Beneficiary Age</label>
                            <input type="number" name="beneficiary_age" class="form-control" id="beneficiary_age">
                        </div>
                        <div class="form-group">
                            <label for="beneficiary_gender" class="form-label">Beneficiary Gender</label>
                            <select class="form-control" name="beneficiary_gender" id="beneficiary_gender">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="beneficiary_address" class="form-label">Beneficiary Address</label>
                            <input type="text" name="beneficiary_address" class="form-control" id="beneficiary_address">
                        </div>
                        <div class="form-group">
                            <label for="beneficiary_contact" class="form-label">Beneficiary Contact</label>
                            <input type="text" name="beneficiary_contact" class="form-control" id="beneficiary_contact">
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php submit(); ?>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
</div>