
<!DOCTYPE html>
<html oncontextmenu="return false">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - Sugacci</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/favicon.png'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"href="<?= base_url('assets/admin/admin-theme/css/vendors.css') ?>" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css"href="<?= base_url('assets/admin/admin-theme/css/app-lite.css') ?>" rel="stylesheet"> 
      <link rel="stylesheet" type="text/css"href="<?= base_url('assets/admin/admin-theme/css/core/colors/palette-gradient.css') ?>" rel="stylesheet"> 
</head>
<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page " data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before">
                <?php
                if ($this->session->flashdata('err_login')) {
                    ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('err_login') ?></div>
                    <?php
                }
                ?>
            </div>
        <div class="content-header row">
    </div>
    <div class="content-body"><section class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-3 col-md-6 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                    <div class="card-header border-0">
                        <div class="text-center mb-1">
                                <img src="<?= base_url('assets/admin/admin-theme/images/logo/logo.png');?>" height="70" alt="branding logo">
                        </div>
                        <div class="font-large-1  text-center">                        
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <?php $attributes = array('class' => 'form-horizontal');
                                echo form_open(uri_string(), $attributes); ?>
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control round" id="user-name" name="username" placeholder="Your Username" required>
                                    <div class="form-control-position">
                                        <i class="ft-user"></i>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="password" class="form-control round" id="user-password" name="password" placeholder="Enter Password" required>
                                    <div class="form-control-position">
                                        <i class="ft-lock"></i>
                                    </div>
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-md-6 col-12 text-center text-sm-left">
                                    </div>
                                    <!-- <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div> -->
                                </div>                           
                                <div class="form-group text-center">
                                    <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">Login</button>    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script> 
document.addEventListener("keydown", function (event) {
    if (event.ctrlKey) {
        event.preventDefault();
    } 
    if (event.shiftKey) {
        event.preventDefault();
    }  
});
document.onkeydown = function(e) {
  if(event.keyCode == 123) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
    console.log('hit')
     return false;
  }
}
document.onkeypress = function (event) {
    event = (event || window.event);
    if (event.keyCode == 123) {
        return false;
    }
}
document.onmousedown = function (event) {
    event = (event || window.event);
    if (event.keyCode == 123) {
        return false;
    }
    if(event.button == 2)
    {
      return false; 
    }
}
</script>
</html>