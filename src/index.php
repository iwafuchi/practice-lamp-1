<?php
$zip = '113-0022';

echo preg_match('#^[0-9]{3}-[0-9]{4}$#', $zip) ? "正しい郵便番号" : "不正な郵便番号";
