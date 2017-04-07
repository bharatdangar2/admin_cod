<link href="<?php echo base_url().'assets/css/login_css.css'; ?>" rel="stylesheet" />

<div class="login-page">
  <div class="form">
    <!--<form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form> -->
    <!--<form class="login-form">-->
    <?php 
        $attributes = array('class' => 'login-form');
        echo form_open('login/verify');

        if(isset($error_msg))
        {
          echo "<div class='alert alert-danger'>".$error_msg."</div>";
        }
    ?>

      <input type="text" name="username" placeholder="username" required=""/>
      <input type="password" name="password" placeholder="password" required=""/>
      <button type="submit">login</button>
      <!--<input type="submit" value="Login" name="">-->
      <!--<p class="message">Not registered? <a href="#">Create an account</a></p> -->
    </form>
  </div>
</div>