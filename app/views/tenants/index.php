<!DOCTYPE html>
<html>
<head>
    <title>Tenants List</title>
</head>
<body>
    <h2>Tenant List</h2>
    <a href="/tenants/add">Add Tenant</a>
    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Room No</th>
            <th>Rent</th>
            <th>Move-in Date</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($tenants as $tenant): ?>
        <tr>
            <td><?= $tenant['id'] ?></td>
            <td><?= $tenant['name'] ?></td>
            <td><?= $tenant['contact'] ?></td>
            <td><?= $tenant['room_no'] ?></td>
            <td><?= $tenant['rent'] ?></td>
            <td><?= $tenant['move_in_date'] ?></td>
            <td>
                <a href="/tenants/edit/<?= $tenant['id'] ?>">Edit</a> |
                <a href="/tenants/delete/<?= $tenant['id'] ?>" onclick="return confirm('Delete this tenant?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
