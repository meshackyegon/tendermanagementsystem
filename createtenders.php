<?php
// Include necessary files and configurations
// require_once 'functions.php';
// Check if the user is logged in as admin, otherwise redirect to login page
// checkAdminLogin();

// Define variables and set initial values
$title = $description = $startDate = $endDate = '';
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input data
    $title = sanitizeInput($_POST['title']);
    $description = sanitizeInput($_POST['description']);
    $startDate = sanitizeInput($_POST['start_date']);
    $endDate = sanitizeInput($_POST['end_date']);

    // Perform validation on required fields
    if (empty($title) || empty($description) || empty($startDate) || empty($endDate)) {
        $error = 'All fields are required.';
    } else {
        // Validate date format
        if (!validateDateFormat($startDate) || !validateDateFormat($endDate)) {
            $error = 'Invalid date format. Please use YYYY-MM-DD.';
        } else {
            // Convert dates to the appropriate format for database insertion
            $startDate = formatDateForDB($startDate);
            $endDate = formatDateForDB($endDate);

            // Perform database insert to create new tender opportunity
            $tenderId = createTender($title, $description, $startDate, $endDate);

            if ($tenderId) {
                // Redirect to view the created tender opportunity
                header("Location: viewtenders.php");
                exit();
            } else {
                $error = 'Error occurred while creating the tender opportunity. Please try again.';
            }
        }
    }
}

// Include the HTML header and navigation bar
include_once 'header.php';
?>

<div class="container">
    <h2>Create Tender Opportunity</h2>

    <?php if (!empty($error)) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="text" class="form-control" id="start_date" name="start_date" placeholder="YYYY-MM-DD"
                   value="<?php echo $startDate; ?>">
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="text" class="form-control" id="end_date" name="end_date" placeholder="YYYY-MM-DD"
                   value="<?php echo $endDate; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Create Tender</button>
    </form>
</div>

<?php 
// include_once 'footer.php';
?>
