<?php
include("./ElementForMainpage/database.php");
require("./Model/group_db.php");
require("./Model/studyControllerdb.php");
function actioninstudy()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = filter_input(INPUT_POST, "action");
        if ($action === "postcomment") {
            $comment = $_POST["comments"];
            postcomment($comment);
        } else if ($action === "poststatus") {
            if (isset($_FILES["file-status"]["name"])) {
                $subject = filter_input(INPUT_POST, "subject-status");
                $decrip = filter_input(INPUT_POST, "decrip-status");
                $userimg = $_FILES["file-status"]["name"];
                $image_folder = "./uploadfile/$userimg";
                if (move_uploaded_file($_FILES["file-status"]["tmp_name"], $image_folder)) {
                    poststatus($subject, $decrip, $userimg);
                } else {
                    echo "File upload failed!";
                }
            }
            
        } else if ($action === "gr-create") {
            creategr();
        }
    }
   
}
include("./View/study.php");
?>