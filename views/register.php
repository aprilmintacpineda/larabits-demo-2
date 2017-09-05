<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="./public/styles.css">
</head>
<body>
  <div class="navigation-bar clear-float">
    <ul class="clear-float">
      <li><a href="/">Home</a></li>
      <li><a href="/about">About</a></li>
      <li><a href="/register">Register</a></li>
    </ul>
  </div>

  <div class="form-wrapper">
    <h1>My Awesome Website</h1>

    <form method="post" action="">
    <ul>
      <li>
        <p>Your email</p>
        <?= isset($errors, $errors['user_email']) && !empty($errors['user_email'])? '<p class="error">' . implode('</p><p class="error">', $errors['user_email']) . '</p>' : '' ?>
        <input type="email" name="user_email" placeholder="example@domain.com" value="<?= !empty($_POST) && !isset($errors['critical_error'])? $_POST['user_email'] : '' ?>">
      </li>
      <li>
        <p>Desired password</p>
        <?= isset($errors, $errors['user_password']) && !empty($errors['user_password'])? '<p class="error">' . implode('</p><p class="error">', $errors['user_password']) . '</p>' : '' ?>
        <input type="password" name="user_password" placeholder="my secret and strong password!">
      </li>
      <li>
        <p>Confirm password</p>
        <?= isset($errors, $errors['confirm_password']) && !empty($errors['confirm_password'])? '<p class="error">' . implode('</p><p class="error">', $errors['confirm_password']) . '</p>' : '' ?>
        <input type="password" name="confirm_password" placeholder="my secret and strong password!">
      </li>
      <li>
        <p>Full name</p>
        <?= isset($errors, $errors['full_name']) && !empty($errors['full_name'])? '<p class="error">' . implode('</p><p class="error">', $errors['full_name']) . '</p>' : '' ?>
        <input type="text" name="full_name" placeholder="April Mintac Pineda" maxlength="100" value="<?= !empty($_POST) && !isset($errors['critical_error'])? $_POST['full_name'] : '' ?>">
      </li>
      <li>
        <?=
          isset($errors, $errors['critical_error']) && !empty($errors['critical_error'])?
            '<p class="error">'. $errors['critical_error'] .'</p>'
          : isset($registered) && $registered?
            '<p class="success">Hooray! You have been registered.</p>'
          : ''
        ?>
        <input type="submit" value="Create account">
      </li>
    </ul>
    <input type="hidden" name="token" value="<?= $token ?>">
  </form>
  </div>
</body>
</html>