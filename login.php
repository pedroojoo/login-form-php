<?php
session_start();
include "koneksi.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error= Diperlukan Username");
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error= Diperlukan Kata Sandi");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username='$uname' AND password='$password'";

        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $password) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            } else {
                header("Location: index.php?error= Username atau Password Salah!");
                exit();
            }
        } else {
            header("Location: index.php?error=Username atau password Salah!");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
