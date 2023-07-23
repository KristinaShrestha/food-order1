<?php

    //Include constants.php file here
    include('../config/constants.php');

    //1. get the ID of Admin to be deleted
    $id = $_GET['id'];

    //2.Create SQL Query to Delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successfully and Admin Deleted 
        //echo "Admin Deleted";
        //Create Session Variable to Display session message
        $_SESSION['delete']= "<div class='success'>Admin Deleted Successfully</div>";
        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to Delete Admin
        //echo "Failed to Delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to delete Admin</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //3.Redirect toManage Admin page with message (success/error)
?>

