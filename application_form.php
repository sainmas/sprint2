<?php
session_start();
ob_start();

$location = '';
$pageTitle = 'Application Form';

// Log user out if idle time or logged in time is past max
include 'php/roles/timeout_check.php';
// Logout and return to login.php if ?logout=true
include 'php/roles/logout_check.php';
// Ensure a user is logged in
include 'php/roles/user_check.php';
// Redirect admins to admin dashboard
include 'php/roles/admin_kick.php';

include 'header.php';
include 'php/nav_bar.php'
?>

<main>
    <div class="container p-3" id="main-container">
        <h3 class="form-header">Application Form</h3>
        <div class="form-container">
            <form method="post" action="php/application_submit.php" onsubmit="return validateForm()" class="form-body my-3">
                <div class="mb-4">
                    <label for="job-name" class="form-label">Job Name*</label>
                    <small id="app-job-name-error" class="warning"></small>
                    <input type="text" class="form-control" id="job-name" name="job-name" maxlength="60">
                </div>
                <div class="mb-4">
                    <label for="employer-name" class="form-label">Employer Name*</label>
                    <small id="app-employer-error" class="warning"></small>
                    <input type="text" class="form-control" id="employer-name" name="employer-name" maxlength="60">
                </div>
                <div class="mb-4">
                    <label for="job-url" class="form-label">Job Description URL*</label>
                    <small id="app-url-error" class="warning"></small>
                    <input type="text" class="form-control" id="job-url" name="job-url" maxlength="500">
                </div>
                <div class="mb-4">
                    <label for="job-description" class="form-label">Job Description</label>
                    <textarea class="form-control" id="job-description" name="job-description"
                              placeholder="Summary of the job..." maxlength="500" rows="3"></textarea>
                </div>
                <div class="mb-4">
                    <label for="today" class="form-label">Date of Application*</label>
                    <small id="app-date-error" class="warning">Please select a date</small>
                    <input type="date" class="form-control" id="today" name="app-date">
                </div>
                <div class="mb-4">
                    <label for="application-status" class="form-label mb-3">Application Status*</label><br>
                    <div id="app-status-error" class="warning">Please select a status</div>
                    <select name="application-status" id="application-status">
                        <option value="select">Select an option</option>
                        <option value="need-to-apply">Need to apply</option>
                        <option value="applied">Applied</option>
                        <option value="interviewing">Interviewing</option>
                        <option value="rejected">Rejected</option>
                        <option value="accepted">Accepted</option>
                        <option value="inactive">Inactive/Expired</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="follow-updates" class="form-label">Updates</label>
                    <textarea class="form-control" id="follow-updates" name="follow-updates"
                              placeholder="Who have you spoken with or interviewed with?" maxlength="500" rows="3"></textarea>
                </div>

                <div class="mb-4">
                    <label for="two-weeks" class="form-label">Follow-up Date*</label>
                    <div id="app-followup-error" class="warning">Please select a date</div>
                    <input type="date" class="form-control" id="two-weeks" name="followup-date">
                </div>

                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>
</main>


<?php include 'php/footer.php' ?>
<!-- Special Javascript to allow special application things work -->
<script src="js/applicationscript.js"></script>
</body>
</html>