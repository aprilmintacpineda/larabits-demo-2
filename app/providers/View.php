<?php

class View {
  public static function render($view, $data = []) {
    try {
      $file = __dir__ . '/../../views/' . $view . '.php';
      $param_2_data_type = gettype($data);

      if(!file_exists($file)) {
        throw new ViewNotFoundException();
      } else if($param_2_data_type != 'array') {
        throw new MalformedParameterException('View::render expects parameter 2 to be an associative array, '. $param_2_data_type .' was given.');
      }

      foreach($data as $key => $value) {
        if(!preg_match('/^[a-zA-Z_]+$/', $key)) {
          throw new MalformedParameterException('View::render expects parameter 2 to be an associative array, numeric array was given.');
        } else {
          $$key = $value;
        }
      }

      require $file;
    } catch(Exception $e) {
      self::error($e);
    }
  }

  public static function error($e) {
    $data = [
      'exception' => get_class($e),
      'message' => $e->getMessage(),
      'line' => $e->getLine(),
      'code' => $e->getCode(),
      'file' => $e->getFile(),
      'stack_trace' => $e->getTraceAsString()
    ];

    echo '
      <style>
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }
        .exception {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          padding: 30px;
          font-family: verdana;
        }
        .exception .exception-header {
          margin-bottom: 15px;
          background: #eeeeee;
          padding: 10px;
          border-radius: 4px;
          border: 1px solid #eaeaea;
        }
        .exception .exception-body {
          padding: 10px;
          border-bottom: 1px solid #eaeaea;
          margin-bottom: 10px;
        }
        .exception .exception-footer {
          padding: 10px;
        }
      </style>
      <div class="exception">
        <div class="exception-header">
          <h1>'. $data['exception'] .'</h1>
        </div>
        <div class="exception-body">
          <p><strong>'. $data['message'] .'</strong></p>
          <p>This exception was thrown at <strong>'. $data['file'] .'</strong> on <strong>line '. $data['line'] .'</strong>.</p>
          <p>Error code: '. $data['code'] .'</p>
        </div>
        <div class="exception-footer">
          <p>'. $data['stack_trace'] .'</p>
        </div>
      </div>
    ';

    exit;
  }
}