<?php
include("./ElementForMainpage/database.php");
include("./Model/adminpagedtb.php");
if (isset($_GET['role'])) {
    switch ($_GET['role']) {
        case 'admin':
            include "./View/AdminPage/adminpage.php";
            break;
        case 'admindoc':
            include "./View/AdminPage/adminDoc.php";
            break;
            case 'adminpost':
                include "./View/AdminPage/adminacc-post.php";
                break;
    }
} else {
    include "./View/AdminPage/LoginPageAdmin.php";
}
