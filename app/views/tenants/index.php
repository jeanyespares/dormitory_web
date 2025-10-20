<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tenants Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
<div class="container py-5">
  <h2>Tenant Management</h2>
  <a href="?controller=Tenants&action=add" class="btn btn-warning mb-3">Add Tenant</a>

  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Room</th><th>Status</th><th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tenants as $t): ?>
        <tr>
          <td><?= $t['id'] ?></td>
          <td><?= htmlspecialchars($t['name']) ?></td>
          <td><?= htmlspecialchars($t['email']) ?></td>
          <td><?= htmlspecialchars($t['phone']) ?></td>
          <td><?= htmlspecialchars($t['room']) ?></td>
          <td><?= htmlspecialchars($t['status']) ?></td>
          <td>
            <a href="?controller=Tenants&action=edit&id=<?= $t['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
            <a href="?controller=Tenants&action=delete&id=<?= $t['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this tenant?')">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>
</html>
