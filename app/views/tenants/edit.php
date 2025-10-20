<!DOCTYPE html>
<html>
<head>
    <title>Edit Tenant</title>
</head>
<body>
    <h2>Edit Tenant</h2>
    <form action="/tenants/update/<?= $tenant['id'] ?>" method="POST">
        <label>Name:</label> <input type="text" name="name" value="<?= $tenant['name'] ?>" required><br>
        <label>Contact:</label> <input type="text" name="contact" value="<?= $tenant['contact'] ?>" required><br>
        <label>Room No:</label> <input type="text" name="room_no" value="<?= $tenant['room_no'] ?>" required><br>
        <label>Rent:</label> <input type="number" name="rent" value="<?= $tenant['rent'] ?>" required><br>
        <label>Move-in Date:</label> <input type="date" name="move_in_date" value="<?= $tenant['move_in_date'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
    <br>
    <a href="/tenants">Back</a>
</body>
</html>
