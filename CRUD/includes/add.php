<?php
if (isset($_POST['add'])) {
    $query = "INSERT INTO personinfotbl(firstname, lastname, phonenumber) VALUES (:firstname, :lastname, :phonenumber)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        "firstname" => $_POST['firstname'],
        "lastname" => $_POST['lastname'],
        "phonenumber" => $_POST['phone']
    ]);

    if ($stmt) {
        header("Location: index.php");
        $_SESSION['success'] = "success";
    }
}

?>
<div class="container fluid">
    <div class="container fluid w-50" style="margin-top: 8%;">
        <!-- Button trigger modal -->
        <div class="text-end mb-2">
            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add - Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="form w-75 mx-auto mt-3" style="line-height: 3rem;">
                            <label for="firstname">FirstName</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" required>
                            <label for="lastname">LastName</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" required>
                            <label for="phone">PhoneNumber</label>
                            <input type="number" name="phone" id="phone" class="form-control" required>
                            <div class="modal-footer w-100 ms-3">
                                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="add" class="btn btn-primary px-4">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>