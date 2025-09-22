<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Pengajuan Cuti Karyawan</title>  
  <link rel="icon" type="image/png" href="favicon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">  
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">  
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">  
  <link rel="stylesheet" href="dist/css/adminlte.min.css">  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    body {
      position: relative;
      z-index: 0;
      overflow: hidden;
      font-family: 'Source Sans Pro', sans-serif;
      color: #333;
    }
    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url("dist/img/background_desktop.jpg") no-repeat center center fixed;
      background-size: cover;
      filter: blur(6px) brightness(55%);
      z-index: -2;
    }
    body::after {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4);
      z-index: -1;
    }
    .login-box {
      width: 380px;
    }
    .login-logo a {
      font-weight: bold;
      color: #fff;
      font-size: 24px;
      text-decoration: none;
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }
    .login-card-body {
      border-radius: 15px;
      padding: 30px;
    }
    .login-box-msg {
      font-size: 16px;
      font-weight: 500;
      color: #444;
    }
    .form-control {
      border-radius: 10px;
      font-size: 15px;
      padding: 12px 15px;
      color: #333;
    }
    .form-control::placeholder {
      color: #999;
    }
    .input-group-text {
      border-radius: 0 10px 10px 0;
    }
    .btn-primary {
      background: linear-gradient(135deg, #1e88e5, #1565c0);
      border: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: bold;
      transition: all 0.3s ease;
    }
    .btn-primary:hover {
      background: linear-gradient(135deg, #1565c0, #0d47a1);
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.25);
    }
    .icheck-primary label {
      font-size: 14px;
      color: #333;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php">
      <div><b>Aplikasi Pengajuan Cuti</b></div>
      <div><b>PT. Delta Tekno Perkasa</b></div>
    </a>
  </div>
  
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login untuk mengelola pengajuan cuti</p>

      <form action="index_act.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" name="level" required style="height:45px; font-size:15px; padding:10px 12px; line-height:25px;">
            <option value="">--Pilih--</option>
            <option value="Admin">Admin</option>
            <option value="Manajer">Manajer</option>
            <option value="Supervisor">Supervisor</option>
            <option value="Karyawan">Karyawan</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>    
  </div>
</div>


<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>