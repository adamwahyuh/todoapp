<!DOCTYPE html>
<html>
<head>
    <title>Todo App - Adam</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.css">
</head>
<body>
<?php 
    session_start();
    $idx = isset($_GET['u']) ? $_GET['u'] : false;
    if ($idx === false) {
        header('Location: index.php');
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $tugasBaru = $_POST['tugas'];
        
        // update tugas
        if (!empty($tugasBaru)) {
            $_SESSION['tugas'][$idx] = $tugasBaru;
        }
        header('Location: index.php');
        exit;
    }
?>

<div class="container-flex">
    <form action="" method="post" name="apa-lagi">
        <label for="tugas">EDIT TUGAS</label>
        <input type="text" name="tugas" value="<?php echo htmlspecialchars($_SESSION['tugas'][$idx]); ?>">
        <button type="submit">Simpan</button>
        <a style="padding : 10px 20px; text-decoration :none; background-color : red; color: white; border-radius:15px; " href="index.php">Batal</a>
    </form>
</div>
</body>
</html>
