<?php
require 'conn.php';
session_start();
if (!$_SESSION['emp_name']) {
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>EMS - Add</title>
</head>

<body>
    <?php include 'nav.php'; ?>
    <form class="w-full max-w-sm" style="margin: 0 auto; width: 500px; display: block; padding-top: 200px;"
        method="POST">

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Email
                </label>
            </div>
            <div class="md:w-2/3">
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="inline-full-name" type="text" placeholder="Example@gmail.com" name="emp_email">
            </div>
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Full Name
                </label>
            </div>
            <div class="md:w-2/3">
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="inline-full-name" type="text" placeholder="Jane Doe" name="emp_name">
            </div>
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                    Password
                </label>
            </div>
            <div class="md:w-2/3">
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="inline-password" type="password" placeholder="*************" name="emp_pass">
            </div>
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3"></div>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <div class="flex justify-between">
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit" name="emp_register" style="width: 120px; text-align: center;">
                        Add
                    </button>
                    <a href="dash.php"
                        class="block py-2 px-4 text-gray-700 hover:text-gray-500 font-medium duration-150 active:bg-gray-100 border rounded-lg"
                        style="width: 120px; text-align: center;">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </form>

    <?php

    if (isset ($_POST['emp_register'])) {
        if (empty ($_POST['emp_email']) || empty ($_POST['emp_name']) || empty ($_POST['emp_pass'])) {
            echo "<script>alert('Please fill in all fields')</script>";
        } else {

            $emp_email = $_POST['emp_email'];
            $emp_name = $_POST['emp_name'];
            $emp_pass = $_POST['emp_pass'];
            //$emp_pass = md5($_POST['emp_pass']); for encrypting
    
            $sql = "INSERT INTO emp_data (emp_email, emp_name, emp_pass) VALUES ('$emp_email', '$emp_name', '$emp_pass')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Employee added Successfully')</script>";
                header("Location:viewwmp.php");
            } else {
                echo "Error:" . $sql . "<br/>" . mysqli_error($conn);
            }
        }
    }
    ?>

</body>

</html>