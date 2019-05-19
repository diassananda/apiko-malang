<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home Overview | Dashboard UI Kit</title>
    <meta name="description" content="Dashboard UI Kit">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>resources/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>resources/favicon.ico" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/mybootrsap.css">

    <!-- Minified Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
    <!-- Minified JS library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Minified Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="<?php echo base_url(); ?>resources/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>resources/js/bootstrap-datetimepicker.js"></script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
      }

      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      .pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
        z-index: 1051 !important;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 50%;
      }

      .centerMarker{
        position:absolute;
        /*url of the marker*/
        background:url(http://maps.gstatic.com/mapfiles/markers2/marker.png) no-repeat;
        /*center the marker*/
        top:50%;left:50%;

        z-index:1;
        /*fix offset when needed*/
        margin-left:-10px;
        margin-top:-34px;
        /*size of the image*/
        height:34px;
        width:20px;

        cursor:pointer;
      }
    </style>
</head>