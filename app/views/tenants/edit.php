<form method="POST" class="p-4">
  <h3>Edit Tenant</h3>
  <input class="form-control mb-2" name="name" value="<?= htmlspecialchars($tenant['name']) ?>" required>
  <input class="form-control mb-2" name="email" value="<?= htmlspecialchars($tenant['email']) ?>">
  <input class="form-control mb-2" name="phone" value="<?= htmlspecialchars($tenant['phone']) ?>">
  <input class="form-control mb-2" name="room" value="<?= htmlspecialchars($tenant['room']) ?>">
  <select class="form-control mb-2" name="status">
    <option value="active" <?= $tenant['status']==='active'?'selected':'' ?>>Active</option>
    <option value="inactive" <?= $tenant['status']==='inactive'?'selected':'' ?>>Inactive</option>
  </select>
  <button class="btn btn-success">Update</button>
</form>
