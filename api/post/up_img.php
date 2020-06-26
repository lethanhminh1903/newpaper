<?php
    function up_image($name, $title)
    {
        if ($_FILES[$name]['type'] == 'image/jpeg' || $_FILES[$name]['type'] == 'image/png' || $_FILES[$name]['type'] == 'image/jpg')
        {
            $file_name = utf8tourl($title."-".$name).time();
            $source_file = $_FILES[$name]['tmp_name'];

            // edit file name
            $filePath = $_FILES[$name]['name'];
            $pathinfo = pathinfo($source_file, PATHINFO_EXTENSION);

            // path file on server
            $dest_file = "../../uploads/images/" . $file_name . '.png';
            $link = "uploads/images/" . $file_name . '.png';

            // check if file name already exitsts
            if (file_exists($dest_file))
            {
                print "The file name already exists!!";
            }
            else
            {
                move_uploaded_file($source_file, $dest_file) or die("Error!!");
                if ($_FILES[$name]['error'] == 0)
                {
                    return $link;
                }
            }
        }
        else
        {
            return "";
        }
    }
?>
