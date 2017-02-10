
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="default.css" rel="stylesheet" type="text/css">
  </head><body>
    <div class="row">
      <div class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="img-responsive"><img height="50" alt="Brand" src="pict\logosmall.png" class="center-block img-circle"></a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="hidden-md hidden-sm nav navbar-nav navbar-right">
              <li>
                <a href="index.php">Home</a>
              </li>
              <li class="#">
                <a href="menukatering.php">Cari Katering<br></a>
              </li>
              <li>
                <a href="Aboutus.html">Contact Us</a>
              </li>
              <li class="dropdown active">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account&nbsp;<i class="fa fa-caret-down text-inverse"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="index.php">Log In</a>
                  </li>
                  <li class="divider"></li>
                  <li class="active">
                    <a href="register.php">Register</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="cover">
        
        <div class="background-image-fixed cover-image" style="background-image : url('header-background2.jpg')"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h1 class="text-center" contenteditable="true">Register</h1>
                      <p class="text-center lead">Register As.</p>
                    </div>
                  </div>
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                              <div class="row">
                                <div class="col-md-6">
                                  <h3 class="text-center text-muted">Customer</h3>
                                  <div style="text-align: center;">
                                      <div class="col-md-6">
                                      <button type="button" class="btn btn-warning" data-toggle="modal"  data-target="#customer"> Customer</button>
                                   </div>
                                   		<div class="col-md-6">       <button type="button" class="btn btn-warning" data-toggle="modal"  data-target="#hotel"> Company </button>
                                    </div>
                                    </div>
                                  </div>
                             	  <div class="col-md-6">
                                   <h3 class="text-center text-muted">Catering</h3>
                                   <div style="text-align: center;">
                                    <div class="col-md-6">       <button type="button" class="btn btn-warning" data-toggle="modal"  data-target="#catering"> All </button> 
                                   </div>
                                   <div class="col-md-6"> <button type="button" class="btn btn-warning" data-toggle="modal"  data-target="#event"> Event and Company only </button> 
                                   </div>
                                  </div>
                               

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <div class="modal fade" id="customer" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Customer</h4>
        </div>
        <div class="modal-body">
   			<form class="form-horizontal" method="get" action="customer.php">
    <div class="form-group">
      <label class="control-label col-sm-2">Email:</label>
      <div class="col-sm-10">
        <input  required type="email" class="form-control" id="email" placeholder="masukan email">
      </div>
 </div>
      <div class="form-group">
    <label class="control-label col-sm-2" >Username:</label>
      <div class="col-sm-10">
        <input required type="text" class="form-control" id="username" placeholder="masukan username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input required type="password" class="form-control" id="pwd" placeholder=" masukan password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Konfirmasi Password:</label>
      <div class="col-sm-10">
        <input required type="password" class="form-control" id="konfirm" placeholder="Konfirmasi Password">
      </div>
     </div>
     
     <div class="form-group">
      <label class="control-label col-sm-2">Nama:</label> 
      <div class="col-sm-10">
        <input  required type="text" class="form-control" id="nama" placeholder="Nama">
      </div>
     </div>
     
     <div class="form-group">
      <label class="control-label col-sm-2">No Telpon:</label> 
      <div class="col-sm-10">
        <input  required type="text" class="form-control" id="hp" placeholder="no telpon yang bisa dihubungin ">
      </div>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2">Alamat:</label>
      <div class="col-sm-10">
        <textarea required class="form-control" id="alamat" rows="3" placeholder="Alamat"></textarea>
        
      </div>
     </div>
    
    
    
    </div>
       <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Daftar </button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
     </div>
          </form>
    </div>
 
      </div> 
    </div>
  </div>      
 <div class="modal fade" id="hotel" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Company</h4>
        </div>
        <div class="modal-body">
   			<form class="form-horizontal" method="" action="customerhotel.php">
    <div class="form-group">
      <label class="control-label col-sm-2">Email:</label>
      <div class="col-sm-10">
        <input  required type="email" class="form-control" id="email1" placeholder="masukan email">
      </div>
 </div>
      <div class="form-group">
    <label class="control-label col-sm-2" >Username:</label>
      <div class="col-sm-10">
        <input required type="text" class="form-control" id="username1" placeholder="masukan username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input required type="password" class="form-control" id="pwd1" placeholder=" masukan password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Konfirmasi Password:</label>
      <div class="col-sm-10">
        <input required type="password" class="form-control" id="konfirm1" placeholder="Konfirmasi Password">
      </div>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2">Nama:</label> 
      <div class="col-sm-10">
        <input  required type="text" class="form-control" id="nama1" placeholder="Nama">
      </div>
     </div>    
     <div class="form-group">
      <label class="control-label col-sm-2">No Telpon:</label> 
      <div class="col-sm-10">
        <input  required type="text" class="form-control" id="hp1" placeholder="no telpon yang bisa dihubungin ">
      </div>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2">Alamat:</label>
      <div class="col-sm-10">
        <textarea required class="form-control" id="alamat1" rows="3" placeholder="Alamat"></textarea>
        
      </div>
     </div>
    
    
    
    </div>
       <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Daftar </button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
     </div>
          </form>
    </div>
 
      </div> 
    </div>
  </div>      
 <div class="modal fade" id="catering" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Catering</h4>
        </div>
        <div class="modal-body">
   			<form class="form-horizontal" method="get" action="catering.php">
    <div class="form-group">
      <label class="control-label col-sm-2">Email:</label>
      <div class="col-sm-10">
        <input  required type="email" class="form-control" id="email2" placeholder="masukan email">
      </div>
 </div>
      <div class="form-group">
    <label class="control-label col-sm-2" >Username:</label>
      <div class="col-sm-10">
        <input required type="text" class="form-control" id="username2" placeholder="masukan username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input required type="password" class="form-control" id="pwd2" placeholder=" masukan password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Konfirmasi Password:</label>
      <div class="col-sm-10">
        <input required type="password" class="form-control" id="konfirm2" placeholder="Konfirmasi Password">
      </div>
     </div>
 	 <div class="form-group">
     	<label class="control-label col-sm-2">Nama Catering: </label>
        <div class="col-sm-10">
        <input  required type="text" class="form-control" id="nama2" placeholder="Nama Katering">
        </div>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2">Nama Pemilik:</label> 
      <div class="col-sm-10">
        <input  required type="text" class="form-control" id="namapemilik2" placeholder="Nama Owner">
      </div>
     </div>    
     <div class="form-group">
      <label class="control-label col-sm-2">No Telpon:</label> 
      <div class="col-sm-10">
        <input  required type="text" class="form-control" id="hp2" placeholder="no telpon yang bisa dihubungin ">
      </div>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2">Alamat:</label>
      <div class="col-sm-10">
        <textarea required class="form-control" id="alamat2" rows="3" placeholder="Alamat"></textarea>
        
      </div>
     </div>
    
    
    
    </div>
       <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Daftar </button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
     </div>
          </form>
    </div>
 
      </div> 
    </div>
  </div>      
       
 <div class="modal fade" id="event" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Event Organizer </h4>
        </div>
        <div class="modal-body">
   			<form class="form-horizontal" method="get" action="catering.php">
    <div class="form-group">
      <label class="control-label col-sm-2">Email:</label>
      <div class="col-sm-10">
        <input  required type="email" class="form-control" id="email3" placeholder="masukan email">
      </div>
     </div>
      <div class="form-group">
    <label class="control-label col-sm-2" >Username:</label>
      <div class="col-sm-10">
        <input required type="text" class="form-control" id="username3" placeholder="masukan username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input required type="password" class="form-control" id="pwd3" placeholder=" masukan password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Konfirmasi Password:</label>
      <div class="col-sm-10">
        <input required type="password" class="form-control" id="konfirm3" placeholder="Konfirmasi Password">
      </div>
     </div>
 	 <div class="form-group">
     	<label class="control-label col-sm-2">Nama Catering: </label>
        <div class="col-sm-10">
        <input  required type="text" class="form-control" id="nama3" placeholder="Nama Katering">
        </div>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2">Nama Event Organizer:</label> 
      <div class="col-sm-10">
        <input  required type="text" class="form-control" id="namapemilik3" placeholder="Nama Owner">
      </div>
     </div>    
     <div class="form-group">
      <label class="control-label col-sm-2">No Telpon:</label> 
      <div class="col-sm-10">
        <input  required type="text" class="form-control" id="hp3" placeholder="no telpon yang bisa dihubungin ">
      </div>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2">Alamat:</label>
      <div class="col-sm-10">
        <textarea required class="form-control" id="alamat3" rows="3" placeholder="Alamat"></textarea>
        
      </div>
     </div>
    
    
    
    </div>
       <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Daftar </button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
     </div>
          </form>
    </div>
 
      </div> 
    </div>
  </div>      
 
      <footer class="section section-warning">
        <div class="container">

              <div class="row">
               <center>
              		<h3> Follow Us And Like Us </h3>
                  <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                  <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                  <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                  <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
     	`	  </center>
              </div>
            
          <div class="row">
          <center>
          <p style="color:#521078" class="container">
          Design by Bagus Hilmawan Copyright by &copy; Kemakananku.com 
          </p>
          </center>
          <center>
          <p style="color:#521078" class="container"> 
          This Web need supported by LAVAREL , JAVASCRIPT ,MARIADB AND PHP
          </p>
          </center>
         </div>      
       </div>        
       </footer>
    </div>
  

</body></html>