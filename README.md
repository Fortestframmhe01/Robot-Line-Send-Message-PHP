# Robot-Line-Send-Message-PHP
# # Robot Line API - Send Message To User

# Usage :

```
<?php 
  use LineNotify\LineNotify;
  
  require_once './lib/LineNotify.php';
  
  $line = new LineNotify();
  $line->setToken(YOUR_TOKEN);
  $line->setMessage(YOUR_MESSAGE);
  
  $send = $line->lineSend(); // Return true, false (1, 0)
?>
```
