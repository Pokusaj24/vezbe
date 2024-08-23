<?php 
$msg = isset($msg) ? $msg : ""; 
include 'partials/header.php'; 
?>
<div class="container">
    <form action="controller.php" method="POST">
        <input type="hidden" name="action" value="doPost">    
        Ime: <br> 
        <input type="text" name="ime"><br>
        Prosek: <br> 
        <input type="number" name="prosek" step="0.01"><br><br>     
        <input type="submit" value="Dodaj studenta">
    </form>
    <?= $msg ?>
</div>
<?php 
include 'partials/footer.php'; 
?>
