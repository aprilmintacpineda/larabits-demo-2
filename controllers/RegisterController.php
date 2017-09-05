<?php

class RegisterController {
  public function index() {
    View::render('register', [
      'token' => generate_csrf_token()
    ]);
  }

  public function register() {
    /*
     * error checking first
     * must have a token
     * must be the same as stored on the session
     * must pass user input validations
     * must pass credential validations
     */
    
    // list of wanted fields
    $fields = [
      'user_email',
      'user_password',
      'confirm_password',
      'full_name',
      'token'
    ];

    $errors = [];

    if(!isset($_POST['token']) || $_POST['token'] != $_SESSION['csrf_token'] || array_keys($_POST) != $fields) {
      // token is invalid or a field is missing or was injected.
      $errors['critical_error'] = 'Sorry, we could not validate the form you just submitted.';
    } else {
      // validate user inputs
      
      /*
       * email validations
       * Email must be a valid email
       * Email must not be empty
       * Email must not be already taken
       */
      if(empty($_POST['user_email'])) {
        $errors['user_email'][] = 'Email is required.';
      } else {
        if(!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
          $errors['user_email'][] = 'Invalid email.';
        }

        // check if email is already taken as well.
      }

      /*
       * password validations
       * password must not be empty
       * confirm password must not be empty
       * password must equal confirm password
       */
      if(empty($_POST['user_password'])) {
        $errors['user_password'][] = 'Password is required';
      }

      if(empty($_POST['confirm_password'])) {
        $errors['confirm_password'][] = 'Retype your password.';
      } else if(!empty($_POST['user_password']) && $_POST['user_password'] != $_POST['confirm_password']) {
        $errors['confirm_password'][] = 'Passwords did not matched.';
      }

      /*
       * full name validations
       * full name must not be empty
       * full name must be alphabet only
       * full name must be less than or equal to 100 chars
       */
      if(empty($_POST['full_name'])) {
        $errors['full_name'][] = 'Full name is required.';
      } else {
        if(strlen($_POST['full_name']) > 100) {
          $errors['full_name'][] = 'Full name must not exceed 100 characters.';
        }

        if(!preg_match('/^[a-zA-Z\'?\-?\.? ]+$/', 'April Mintac Pineda')) {
          $errors['full_name'][] = 'Invalid full name.';
        }
      }
    }

    if(empty($errors)) {
      // hash password
      // sanitize full name
      // connect to database
      // insert data
      $data = [
        'registered' => true
      ];
    } else {
      $data = [
        'errors' => $errors
      ];
    }

    View::render('register', array_merge($data, [
      'token' => generate_csrf_token()
    ]));
  }
}