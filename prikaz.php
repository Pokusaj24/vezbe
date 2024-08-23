<?php 
require_once 'DAO.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_SESSION['studenti'])) {
    include './partials/header.php'; 
    $studenti = $_SESSION['studenti'];
?>
<div class="row" style="margin-left:1rem ;">
    <div class="col-12">
        <?php if (!empty($studenti)) { ?>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Prosek</th>
            </tr>
            <?php foreach ($studenti as $student) { ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['ime'] ?></td>
                <td><?= $student['prosek'] ?></td>
            </tr>
            <?php } ?>
        </table>
        <?php } else { ?>
        <p>No students found.</p>
        <?php } ?>
    </div>
</div>
<?php 
    include './partials/footer.php'; 
} else {
    header('Location:index.php'); 
} 
?>
