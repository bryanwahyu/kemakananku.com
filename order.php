  <?php 
session_start();
include 'konfigurasi/database.php';
if ($_SESSION) {
    header("Location:cek.php");
}
$kodemakanan=$_Get['id'];
?>
<html><head>
    <meta charset="utf-8">    
    <style>
        .button {
          display: inline-block;
          border-radius: 4px;
          background-color: #f0ad4e;
          border: none;
          color: #FFFFFF;
          text-align: center;
          font-size: 20px;
          padding: 10px;
          width: 130px;
          transition: all 0.5s;
          cursor: pointer;
          margin: 5px;
        }

        .button span {
          cursor: pointer;
          display: inline-block;
          position: relative;
          transition: 0.5s;
        }

        .button span:after {
          content: '\00bb';
          position: absolute;
          opacity: 0;
          top: 0;
          right: -20px;
          transition: 0.5s;
        }

        .button:hover span {
          padding-right: 25px;
        }

        .button:hover span:after {
          opacity: 1;
          right: 0;
        }
    </style>   

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="default.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  
      <div class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="img-responsive"><img height="50" alt="Brand" src="`Kateringpict/logosmall.png" class="center-block img-circle"></a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="hidden-md hidden-sm nav navbar-nav navbar-right">
             <li class="active">
              <a href="index.php">Home</a>
              </li>
              <!--
              <li>
                <a href="katering.php">Cari Katering<br></a>
              </li>
              -->
             <li>
                <a href="menu.php">Melihat Menu/Paket</a>
              </li>
              <li>
                <a href="his.php"> Tentang Kami</a>
              </li>
          
               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account<i class="fa fa-caret-down text-inverse"></i></a> 
          
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="login.php">Login</a>
                  </li>
                  <li class="divider"></li>
                   <li>
                  <a href="register.php"> Register</a>
                  </li>
                  </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      </div>