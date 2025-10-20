<!DOCTYPE html>
<html>
<head>
    <title>Add Tenant</title>
</head>
<body>
    <h2>Add New Tenant</h2>
    <form action="/tenants/store" method="POST">
        <label>Name:</label> <input type="text" name="name" required><br>
        <label>Contact:</label> <input type="text" name="contact" required><br>
        <label>Room No:</label> <input type="text" name="room_no" required><br>
        <label>Rent:</label> <input type="number" name="rent" required><br>
        <label>Move-in Date:</label> <input type="date" name="move_in_date" required><br>
        <button type="submit">Save</button>
    </form>
    <br>
    <a href="/tenants">Back</a>
</body>
</html>
