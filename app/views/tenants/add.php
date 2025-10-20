<form method="POST" class="p-4">
  <h3>Add Tenant</h3>
  <input class="form-control mb-2" name="name" placeholder="Name" required>
  <input class="form-control mb-2" name="email" placeholder="Email">
  <input class="form-control mb-2" name="phone" placeholder="Phone">
  <input class="form-control mb-2" name="room" placeholder="Room">
  <select class="form-control mb-2" name="status">
    <option value="active">Active</option>
    <option value="inactive">Inactive</option>
  </select>
  <button class="btn btn-success">Save</button>
</form>
