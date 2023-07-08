<?php
// Include necessary files and configurations
require_once 'functions.php';
// Check if the user is logged in as admin, otherwise redirect to login page
checkAdminLogin();

// Check if the submission ID is provided in the URL
if (isset($_GET['submission_id'])) {
    $submissionId = $_GET['submission_id'];

    // Get the details of the tender submission from the database
    $submission = getSubmissionDetails($submissionId);

    if ($submission) {
        // Get additional information related to the submission
        $tender = getTenderDetails($submission['tender_id']);
        $vendor = getVendorDetails($submission['vendor_id']);
    } else {
        // Redirect to a suitable page if the submission doesn't exist
        header("Location: viewsubmissions.php");
        exit();
    }
} else {
    // Redirect to a suitable page if the submission ID is not provided
    header("Location: viewsubmissions.php");
    exit();
}

// Include the HTML header and navigation bar
include_once 'header.php';
?>

<div class="container">
    <h2>Tender Submission Details</h2>

    <h4>Tender Opportunity:</h4>
    <p><strong>Title:</strong> <?php echo $tender['title']; ?></p>
    <p><strong>Description:</strong> <?php echo $tender['description']; ?></p>

    <h4>Vendor Information:</h4>
    <p><strong>Company Name:</strong> <?php echo $vendor['company_name']; ?></p>
    <p><strong>Contact Person:</strong> <?php echo $vendor['contact_person']; ?></p>
    <p><strong>Email:</strong> <?php echo $vendor['email']; ?></p>
    <p><strong>Phone Number:</strong> <?php echo $vendor['phone_number']; ?></p>

    <h4>Submission Details:</h4>
    <p><strong>Submission Date:</strong> <?php echo $submission['submission_date']; ?></p>
    <p><strong>Bid Amount:</strong> <?php echo $submission['bid_amount']; ?></p>
    <p><strong>Status:</strong> <?php echo $submission['status']; ?></p>
    <!-- Additional submission details can be displayed here -->

    <!-- Add additional sections or information as needed -->

    <a href="viewsubmissions.php" class="btn btn-primary">Back to Submissions</a>
</div>

<?php include_once 'footer.php'; ?>
