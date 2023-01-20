<?php
include("dbconn.php");
$query = "SELECT * FROM `personinfotbl`";
$stmt = $pdo->prepare($query);
$stmt->execute();
?>

<div class="container">
    <table class="table p-4 w-75">
        <thead class="table-dark">
            <th>Id</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>PhoneNumber</th>
            <th class="ps-5">Action</th>
        </thead>
        <tbody class="fs-5">
            <?php
            $count = 0;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $row["Id"];
                $first_name = $row["firstname"];
                $last_name = $row['lastname'];
                $phone_number = $row["phonenumber"];
                $count++;
                echo "<tr><td>$count</td>
                      <td>$first_name</td>
                      <td>$last_name</td>
                      <td>$phone_number</td>
                      <td>
                        <a href='includes/edit.php?edit=$id' class='text-decoration-none text-light'><button type='button' class='btn btn-primary px-4  fs-6'>Edit</button></a>
                        <a href='includes/delete.php?del=$id' class='text-decoration-none text-light'><button type='button' class='btn btn-danger  fs-6'>Delete</button></a>
                      </td></tr>
                ";
            }
            ?>
        </tbody>
    </table>
</div>
<?php
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add - Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="form w-50 mx-auto mt-3" style="line-height: 3rem;">
                    <input type="text" name="id" id="id" value="<?= $id; ?>" hidden>
                    <label for="firstname">FirstName</label>
                    <input type="text" value="<?= $first_name; ?>" name="firstname" id="firstname" class="form-control" required>
                    <label for="lastname">LastName</label>
                    <input type="text" value="<?= $last_name; ?>" name="lastname" id="lastname" class="form-control" required>
                    <label for="phone">PhoneNumber</label>
                    <input type="number" value="<?= $phone_number; ?>" name="phone" id="phone" class="form-control" required>
                    <div class="modal-footer w-100 ms-3">
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add" class="btn btn-primary px-4">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>