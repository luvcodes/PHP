<html>
<head>
<title>Exam Actor Multi Delete</title>
</head>
<body>
<?php
if (empty(["actorID"])): ?>
<form method="post" action="ActorMultiDelete.php">
    <table border="0">
        <tr>
            <th></th>
            <th>id</th>
            <th>firstname</th>
            <th>surname</th>
        </tr>
        <?php
        while ($row = $stmt->fetchObject()): ?>
        <tr>
            <td>
                <input type="checkbox" name="actorID[]" value=""
            </td>
            <td><?= $row->actorID; ?></td>
            <td><?= $row->firstname; ?></td>
            <td><?= $row->surname; ?></td>
        </tr>
    </table>
    <table border="0" width="90%">
        <tr><td><input type="submit" name="action" value="Delete">&npsp;&nbsp;</td></tr>
    </table>
        <?php endwhile; ?>
</form>
<?php endif; ?>
</body>
</html>
