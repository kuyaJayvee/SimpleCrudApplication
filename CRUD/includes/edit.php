<?php
include("dbconn.php");
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = "SELECT * FROM personinfotbl WHERE Id=$id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['Id'];
        $first_name = $row['firstname'];
        $last_name = $row['lastname'];
        $phone_number = $row['phonenumber'];
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $phone_number = $_POST['phone'];
    $query = "UPDATE personinfotbl SET firstname=:firstname, lastname=:lastname, phonenumber=:phonenumber WHERE Id=:id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        'firstname' => $first_name,
        'lastname' => $last_name,
        'phonenumber' => $phone_number,
        'id' => $id
    ]);
    if ($stmt) {
        header("Location: ../index.php");
    }
}
?>
<?php include("header.php"); ?>
<div class="container">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="form w-50 mx-auto mt-3" style="line-height: 3rem;">
        <input type="text" name="id" id="id" value="<?= $id; ?>" hidden>
        <label for="firstname">FirstName</label>
        <input type="text" value="<?= $first_name; ?>" name="firstname" id="firstname" class="form-control" required>
        <label for="lastname">LastName</label>
        <input type="text" value="<?= $last_name; ?>" name="lastname" id="lastname" class="form-control" required>
        <label for="phone">PhoneNumber</label>
        <input type="number" value="<?= $phone_number; ?>" name="phone" id="phone" class="form-control" required>
        <div class="modal-footer w-100 ms-3 mt-3">
            <a href="../"><button type="button" class="btn btn-secondary px-4 me-3">Cancel</button></a>
            <button type="submit" name="update" class="btn btn-primary px-4 me-3">Update</button>
        </div>
    </form>
</div>