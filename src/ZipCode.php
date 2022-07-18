<?php

declare(strict_types=1);

$zipCode = '123-4567';

echo preg_match('#^[0-9]{3}-[0-9]{4}$#', $zipCode) ? "正しい郵便番号" : "不正な郵便番号";
