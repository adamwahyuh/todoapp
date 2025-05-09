<!DOCTYPE html>
<html>
<head>
    <title>Todo App - Adam</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body id="whole">
<?php 
    session_start();
    // Simpan arr
    if ($_SERVER['REQUEST_METHOD'] === "POST"){
        $tugasBaru = $_POST['tugas'];

        // Cek kalo kosong -> redirect
        if (empty($tugasBaru)){
            header('Location: ' . $_SERVER['SCRIPT_NAME']);
        }
        else{
            if (isset($_SESSION['tugas'])){
                array_push($_SESSION['tugas'], $tugasBaru);
            } else {
                $_SESSION['tugas'] = [$tugasBaru];
            }
            header('Location: ' . $_SERVER['SCRIPT_NAME']);
        }
    }

    // Kalo methodnya GET
    if($_SERVER['REQUEST_METHOD'] === "GET"){
        
        // hapus session 
        $method = isset($_GET['method']) ? $_GET['method'] : false;
        if ($method === "hapus-semua"){
            session_destroy();
            header('Location: ' . $_SERVER['SCRIPT_NAME']);
        }
        
        // hapus index arr
        $reqHps = isset($_GET['reqHps']) ? $_GET['reqHps'] : false;
        if ($reqHps !== false){
            unset($_SESSION['tugas'][$reqHps]);
            header('Location: ' . $_SERVER['SCRIPT_NAME']);
        }
    }

?>
    <div class="container-flex" id="troll">
        <marquee behavior="scrolling" direction="left" scrollamount="15"><h3 id="randomText"></h3></marquee>
        <form action="/" method="post" name="apa-lagi">
            <label for="tugas">ISI TUGASMU DI SINI</label>
            <input type="text" name="tugas"> 
            <button type="submit">Simpan</button>
        </form>

        <div class="list-tugas">
        <?php if (isset($_SESSION['tugas'])): ?>
            <ul>
                <?php foreach ($_SESSION['tugas'] as $idx => $tugas): ?>
                    <li>
                        <p><?php echo  $tugas . " ";  ?> </p> 
                        <div class="button-act">
                            <a class="hapus" href="?reqHps=<?php echo $idx; ?>"><i class="bi bi-trash2-fill"></i></a>
                            <a class="edit" href="edit.php?u=<?php echo $idx; ?>"> <i class="bi bi-pencil-fill"></i></a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>
                <p class="kosong-text">Belum ada Tugas</p>
            <?php endif; ?>
        </div>        
            <a class="nuclear-button" href="?method=hapus-semua">Nuclear Session</a>
            <span id="status"></span>
        </div>

        <div class="troll-button">
            <button class="b-putar" onclick="putar()">Berputar</button>
            <button class="b-putar" onclick="kamuGelap()">Gelap Gelapan</button>
        </div>
    <script src="script.js"></script>
    </body>
</html>
