<!DOCTYPE HTML>
<html>
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShareBox</title>
    <link rel="stylesheet" href="<?php echo $css;?>bootstrap.min.css"> 
    <link rel="stylesheet" href="<?php echo $css;?>main.css"         >
    <link rel="stylesheet" href="<?php echo $css;?>font-awesome.min.css">
    <script src="<?php echo $js;?>main.js"></script>
</head>
<body>
<div class="page">
    <div class="page-header"> <h1 class="title"> ShareBox </h1> </div>
    <ul class="nav nav-pills">

         <li class="nav-item ">
            <a class="nav-link active" href="dashboard.php"><i class="fa fa-cog"></i> Dashboard</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="addNew.php"         ><i class="fa fa-plus"></i> Add New  </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="showAll.php"        ><i class="fa fa-eye"></i> Show All  </a>
         </li>
    </ul>
</div>
