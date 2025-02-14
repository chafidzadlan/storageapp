<?php 

function dbConn() {
    $hostDB = "localhost";
    $userDB = "root";
    $passDB = "root";
    $nameDB = "storageapp";
    return mysqli_connect($hostDB, $userDB, $passDB, $nameDB);
}

function query($query) {
    $db = dbConn();

    $result = mysqli_query($db, $query);

    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function signup($data, $gambar) {
    $db = dbConn();

    $username = htmlspecialchars($data['username']);
    $password1 = mysqli_real_escape_string($db, $data['password1']);
    $password2 = mysqli_real_escape_string($db, $data['password2']);

    if (empty($username) || empty($password1) || empty($password2)) {
        return [
            'error' => true,
            'message' => "Field jangan kosong!",
        ];
        exit();
    }

    if (query("SELECT username FROM users WHERE username = '$username'")) {
        return [
            'error' => true,
            'message' => "Username telah terdaftar!",
        ];
        exit();
    }

    if ($password1 !== $password2) {
        return [
            'error' => true,
            'message' => "Password tidak sesuai",
        ];
        exit();
    }

    if (empty($gambar)) {
        $gambar = 'dummy.jpg';
    }

    $newPassword = password_hash($password1, PASSWORD_DEFAULT);
    $query = "INSERT INTO users VALUES(null, '$username', '$newPassword', '$gambar', 1)";
    mysqli_query($db, $query);

    return [
        'error' => false,
        'message' => "Silahkan login. Anda akan diarahkan ke halaman login.",
    ];
}

function login($data) {
    $db = dbConn();

    $username = htmlspecialchars($data['username']);
    $password = mysqli_real_escape_string($db, $data['password']);

    if ($query = query("SELECT users.id_users, users.username, users.password, roles.jenis FROM users, roles WHERE users.id_role = roles.id_role AND users.username= '$username'")) {
        $query = $query[0];

        if (password_verify($password, $query['password'])) {
            $_SESSION['ids'] = $query['id_users'];
            $_SESSION['login'] = true;
        }

        if (isset($data['remember'])) {
            setcookie('id', $query['id_users'], time() + 2678400);
            setcookie('uid', hash('sha256', $query['username']), time() + 2678400);
        }

        if ($query['jenis'] === "Admin") {
            $_SESSION['rls'] = "a";
            header("Location: dashboard.php");
            exit;
        } else {
            $_SESSION['rls'] = "u";
            header("Location: profile.php");
            exit;
        }
    }

    return [
        'error' => true,
        'message' => "Username atau Password salah.",
    ];
}

function cekUser($data) {
    return query("SELECT username, id_users FROM users WHERE id_users = '$data'")[0];
}

function cookie($data)
{
    $db = dbConn();
    $id = $data['id'];
    $uid = $data['uid'];

    $q = mysqli_query($db, "SELECT users.id_users, users.username, roles.jenis FROM users, roles WHERE users.id_role = roles.id_role AND users.id_users = '$id'");
    $result = mysqli_fetch_assoc($q);
    // cookie dan username
    if ($uid === hash('sha256', $result['username'])) {
        $_SESSION['login'] = true;
        $_SESSION['ids'] = $result['id_users'];
        if ($result['jenis'] === "Admin") {

            $_SESSION['rls'] = "a";
        } else {
            $_SESSION['rls'] = "u";
        }
        header("Location: dashboard.php");
        exit();
    }

    return false;
}

function cookieOpt($data) {
    $db = dbConn();
    $id = $data['id'];
    $uid = $data['uid'];

    $q = mysqli_query($db, "SELECT users.id_users, users.username, roles.jenis FROM users, roles WHERE users.id_role = roles.id_role AND users.id_users = '$id'");
    $result = mysqli_fetch_assoc($q);

    if ($uid === hash('sha256', $result['username'])) {
        $_SESSION['login'] = true;
        $_SESSION['ids'] = $result['id_users'];
        if ($result['jenis'] === "Admin") {
            $_SESSION['rls'] = "a";
        } else {
            $_SESSION['rls'] = "u";
        }
        return true;
        exit();
    }
    return false;
}

?>