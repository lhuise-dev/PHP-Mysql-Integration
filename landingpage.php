<?php
include 'db.php';
include 'fetch-user.php'; // this should fetch $result for user records
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="landingpage.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
</head>

<body class="bg-light">

  <!-- LOGOUT BUTTON -->
  <div class="container-logoutbtn m-3 d-flex justify-content-end">
    <form action="logout.php" method="POST">
      <button type="submit" class="btn btn-danger">Logout</button>
    </form>
  </div>

  <!-- MAIN CONTENT -->
  <div class="container-fluid">
    <div class="handler d-flex justify-content-center align-items-center min-vh-80">
      <div class="box-content position-relative w-75 bg-white p-4 rounded shadow-sm">
        <h3 class="text-center mb-4 text-danger">User Records</h3>

        <div class="table-container">
          <table class="table table-hover table-bordered align-middle text-center">
            <thead>
              <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Age</th>
                <th>Sex</th>
                <th>Birthday</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($result) && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                  <tr>
                    <td><?= htmlspecialchars($row['Name']) ?></td>
                    <td><?= htmlspecialchars($row['Username']) ?></td>
                    <td><?= htmlspecialchars($row['Age']) ?></td>
                    <td><?= htmlspecialchars($row['Sex']) ?></td>
                    <td><?= htmlspecialchars($row['Birthday']) ?></td>
                    <td class="action-icons">
                      <!-- VIEW -->
                      <button class="btn btn-outline-secondary viewBtn"
                        data-bs-toggle="modal"
                        data-bs-target="#viewModal"
                        data-name="<?= htmlspecialchars($row['Name']) ?>"
                        data-username="<?= htmlspecialchars($row['Username']) ?>"
                        data-age="<?= htmlspecialchars($row['Age']) ?>"
                        data-sex="<?= htmlspecialchars($row['Sex']) ?>"
                        data-birthday="<?= htmlspecialchars($row['Birthday']) ?>">
                        <img src="icons/eye-solid-full.svg" width="20" height="20" alt="View User">
                      </button>

                      <!-- EDIT -->
                      <button class="btn btn-outline-secondary editBtn"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal"
                        data-name="<?= htmlspecialchars($row['Name']) ?>"
                        data-username="<?= htmlspecialchars($row['Username']) ?>"
                        data-age="<?= htmlspecialchars($row['Age']) ?>"
                        data-sex="<?= htmlspecialchars($row['Sex']) ?>"
                        data-birthday="<?= htmlspecialchars($row['Birthday']) ?>">
                        <img src="icons/pen-to-square-solid-full.svg" width="20" height="20" alt="Edit User">
                      </button>

                      <!-- DELETE -->
                      <button class="btn btn-outline-secondary deleteBtn"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal"
                        data-name="<?= htmlspecialchars($row['Name']) ?>">
                        <img src="icons/trash-solid-full.svg" width="20" height="20" alt="Delete User">
                      </button>
                    </td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr><td colspan="6">No records found.</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <!-- ADD USER BUTTON -->
        <div class="adduser position-absolute bottom-0 end-0 p-3">
          <img src="icons/user-plus-solid-full.svg"
            width="32"
            height="32"
            alt="Add User"
            role="button"
            data-bs-toggle="modal"
            data-bs-target="#addUserModal"
            style="cursor: pointer;">
        </div>

      </div>
    </div>
  </div>

  <!-- ADD USER MODAL -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="add-user.php" method="POST">
          <div class="modal-body">
            <div class="mb-3">
              <label for="Name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="Name" name="Name" required>
            </div>

            <div class="mb-3">
              <label for="Username" class="form-label">Username</label>
              <input type="text" class="form-control" id="Username" name="Username" required>
            </div>

            <div class="mb-3">
              <label for="Age" class="form-label">Age</label>
              <input type="number" class="form-control" id="Age" name="Age" required>
            </div>

            <div class="mb-3">
              <label for="Sex" class="form-label">Sex</label>
              <select class="form-select" id="Sex" name="Sex" required>
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="Birthday" class="form-label">Birthday</label>
              <input type="date" class="form-control" id="Birthday" name="Birthday" required>
            </div>

            <div class="mb-3">
              <label for="Password" class="form-label">Password</label>
              <input type="password" class="form-control" id="Password" name="Password" required>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Add User</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- VIEW MODAL -->
  <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="viewModalLabel">View User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p><strong>Name:</strong> <span id="viewName"></span></p>
          <p><strong>Username:</strong> <span id="viewUsername"></span></p>
          <p><strong>Age:</strong> <span id="viewAge"></span></p>
          <p><strong>Sex:</strong> <span id="viewSex"></span></p>
          <p><strong>Birthday:</strong> <span id="viewBirthday"></span></p>
        </div>
      </div>
    </div>
  </div>

  <!-- EDIT MODAL -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title" id="editModalLabel">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form action="update-user.php" method="POST">
          <div class="modal-body">
            <input type="hidden" id="editNameHidden" name="Name">

            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" id="editName" name="NewName" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" id="editUsername" name="Username" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Age</label>
              <input type="number" id="editAge" name="Age" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Sex</label>
              <input type="text" id="editSex" name="Sex" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Birthday</label>
              <input type="date" id="editBirthday" name="Birthday" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="update" class="btn btn-warning">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- DELETE MODAL -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body text-center">
          <p>Are you sure you want to delete this record?</p>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // View Modal
      document.querySelectorAll(".viewBtn").forEach(button => {
        button.addEventListener("click", () => {
          document.getElementById("viewName").textContent = button.dataset.name;
          document.getElementById("viewUsername").textContent = button.dataset.username;
          document.getElementById("viewAge").textContent = button.dataset.age;
          document.getElementById("viewSex").textContent = button.dataset.sex;
          document.getElementById("viewBirthday").textContent = button.dataset.birthday;
        });
      });

      // Edit Modal
      document.querySelectorAll(".editBtn").forEach(button => {
        button.addEventListener("click", () => {
          document.getElementById("editNameHidden").value = button.dataset.name;
          document.getElementById("editName").value = button.dataset.name;
          document.getElementById("editUsername").value = button.dataset.username;
          document.getElementById("editAge").value = button.dataset.age;
          document.getElementById("editSex").value = button.dataset.sex;
          document.getElementById("editBirthday").value = button.dataset.birthday;
        });
      });

      // Delete Modal
      document.querySelectorAll(".deleteBtn").forEach(button => {
        button.addEventListener("click", () => {
          const nameToDelete = button.dataset.name;
          document.getElementById("confirmDeleteBtn").setAttribute("data-name", nameToDelete);
        });
      });

      // Confirm Delete
      document.getElementById("confirmDeleteBtn").addEventListener("click", function () {
        const name = this.getAttribute("data-name");
        window.location.href = "delete-user.php?name=" + encodeURIComponent(name);
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/477208f951.js" crossorigin="anonymous"></script>
</body>
</html>
