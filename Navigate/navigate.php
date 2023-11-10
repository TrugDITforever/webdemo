<?php
if (isset($_GET['route'])) {
    switch ($_GET['route']) {
        case 'mainpage':
            // session_destroy();
            include "Controller/studyController.php";
            break;
        default:
            include "Controller/studyController.php";
        case 'account':
            include "Controller/userinfoController.php";
            break;
        case 'admin':
            include "Controller/adminpageController.php";
            break;
        case 'Classes':
            include "Controller/ClassController.php";
            break;
        case '9to10class':
            include "Controller/Class9to10Controller.php";
            break;
        case 'College':
            include "Controller/12toCollegeController.php";
            break;
        case 'Practice':
            include "Controller/PracticeController.php";
            break;
            case 'Introduce':
                include "Controller/introduceController.php";
                break;
    }
} else {
    include "Controller/studyController.php";
}
?>