

<!doctype html>
<html lang="vn">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link type='image/x-icon' href='../images/logo.png' rel='shortcut icon'/>
	  <!-- favicon -->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
      <!-- Custom styles for this template -->
      <link href="index.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <main class="form-signin">
      <form action="#"  method="post">
        <img class="mb-4" src="../images/logo.png" alt="" width="100" height="100">
        <h1 class="h3 mb-3 fw-normal">Đăng nhập</h1>

        <div class="form-floating">
          <input type="email" class="form-control" id="email" name="tai_khoan" placeholder="name@example.com" required>
          <label for="floatingInput">Địa chỉ email</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="Mật khẩu" required>
          <label for="floatingPassword">Mật khẩu</label>
        </div>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me" id="remember_me"> Nhớ
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="dang_nhap">Đăng nhập</button>
        <p class="text-muted mt-2" id="loi_dang_nhap" style="color:red">&nbsp</p>
        <p class="mt-5 mb-3 text-muted">&copy; 2021–2022</p>
      </form>
    </main>
  </body>
</html>

<?php
  session_start();
 include('../db/connect.php'); 
?>
<?php
	if(isset($_POST['dang_nhap'])) {
		$tai_khoan = $_POST['tai_khoan'];
		$mat_khau = md5($_POST['mat_khau']);
    $sql_select_admin = mysqli_query($con,"SELECT * FROM admin WHERE tai_khoan='$tai_khoan' AND mat_khau='$mat_khau' LIMIT 1");
    $count = mysqli_num_rows($sql_select_admin);
    $row_dang_nhap = mysqli_fetch_array($sql_select_admin);
    if($count>0){
      $_SESSION['dang_nhap'] = $row_dang_nhap['ten_admin'];
      $_SESSION['id_admin'] = $row_dang_nhap['admin_id'];
      header('Location: dashboard.php');
    }else{
      echo '<script>
					document.getElementById("loi_dang_nhap").innerHTML = "Tài khoản hoặc mật khẩu sai";
					</script>';
    }
	}
?>

<script>
  $(function() {
      if (localStorage.chkbx && localStorage.chkbx != '') {
          $('#remember_me').attr('checked', 'checked');
          $('#email').val(localStorage.usrname);
          $('#mat_khau').val(localStorage.pass);
      } else {
          $('#remember_me').removeAttr('checked');
          $('#email').val('');
          $('#mat_khau').val('');
      }

      $('#remember_me').click(function() {

          if ($('#remember_me').is(':checked')) {
              // save username and password
              localStorage.usrname = $('#email').val();
              localStorage.pass = $('#mat_khau').val();
              localStorage.chkbx = $('#remember_me').val();
          } else {
              localStorage.usrname = '';
              localStorage.pass = '';
              localStorage.chkbx = '';
          }
      });
  });
</script>
