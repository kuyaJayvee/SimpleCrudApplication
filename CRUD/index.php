<?php include("./includes/dbconn.php"); ?>
<?php include("includes/header.php"); ?>
<?php session_start(); ?>
<body>
    <?php if (isset($_SESSION['success'])) : ?><div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> This alert box could indicate a successful or positive action.
        </div>
    <?php
        unset($_SESSION['success']);
    endif; ?>
    <?php include("includes/add.php") ?>
    <?php include("includes/table.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>