<?php 
require('boot.php');

  $data = random_bytes(16);
$data2 = bin2hex($data);

function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 7; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$generatedPassword = randomPassword();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo Resources::Url('/bootstrap-5.2.0/css/bootstrap.min.css') ?>">
  <script src="<?php echo Resources::Url('/bootstrap-5.2.0/js/bootstrap.bundle.js') ?>"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo Resources::Url('/fontawesome/css/all.min.css') ?>">
  <script src="<?php echo Resources::Url('/jquery-3.6.0.min.js') ?>"></script>
  <title>INVENTORY</title>
  <style>
    body {
      background-color: #f8f9fa;
    }

    .login-container {
      max-width: 600px;
      margin: auto;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
    }

    .login-form {
      margin-right: 20px;
    }

    .login-image {
      max-width: 100%;
    }


    .colored-toast.swal2-icon-success {
      background-color: #a5dc86 !important;
    }
    .colored-toast .swal2-title {
      color: white;
    }
    .colored-toast.swal2-icon-error {
      background: #f27474 !important;
    }
    .colored-toast .swal2-title {
      color: white;
    }

  </style>

  <script type="text/javascript">

    $(document).ready(function(){
      var productCode = "<?php echo $data2 ?>";
      $('#displayProductCode').val(productCode);

      var newPassword = "<?php echo $generatedPassword ?>";
      $('#generatePassword').val(newPassword);

      $('#loginForm').submit(function(e){
        e.preventDefault();
        var row = $(this).closest('div');
        var username = row.find('#username').val();
        var password = row.find('#password').val();

        $.ajax({
          url: "loginprocess.php",
          type: "POST",
          data:{"user" : username, "pass":password}
        }).done(function(data) {
          var result = data.result;

          if(result == 'success'){
           if(data.access =='administrator'){
            window.location.href='admin';
          }else{
            window.location.href='dashboard.php';
          }
        }else if(result == "notverified"){
          alert("account is not verified");
        }else{
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
              popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
          })

          Toast.fire({
            icon: 'error',
            title: 'Account Not Found'
          });
        }

      });
      });


      $('.stockBtn').click(function(){
        var row = $(this).closest('form');
        var trnType = $(this).val();
        var quantity = row.find('#productQuantity').val();
        var product_qrKey = row.find('#outputData').val();
         $.ajax({
          url: "stockprocess.php",
          type: "POST",
          data:{"product_qr_key" : product_qrKey, "type" : trnType, "quantity" : quantity}
        }).done(function(data) {
            if(data.result == "success"){
              const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
              popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true
          })

          Toast.fire({
            icon: 'success',
            title: 'Product Stock Updated'
          }).then((result) => {
              location.reload();
            });
            }else{

            }
        });
      });



    });
  </script>
</head>
<body style="background-color: #f5f5f5">