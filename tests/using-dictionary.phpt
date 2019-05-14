--TEST--
zstd_compress_using_cdict(): basic functionality
--SKIPIF--
--FILE--
<?php
include(dirname(__FILE__) . '/data.inc');
$dictionary = file_get_contents(dirname(__FILE__) . '/data.dic');

function check_compress_using_ddict($data, $dictionary)
{
  $cctx = zstd_create_cctx();
  $dctx = zstd_create_dctx();

  $cdict = zstd_create_cdict($dictionary);
  $ddict = zstd_create_ddict($dictionary);

  $output = (string)zstd_compress_using_cdict($cctx, $data, $cdict);
  echo strlen($dictionary), ' -- ', strlen($output), ' -- ',
    var_export(zstd_uncompress_using_ddict($dctx, $output, $ddict) === $data, true), PHP_EOL;

  zstd_free_cdict($cdict);
  zstd_free_ddict($ddict);
  zstd_free_cctx($cctx);
  zstd_free_dctx($dctx);
}

echo "*** Data size ***", PHP_EOL;
echo strlen($data), PHP_EOL;

echo "*** Dictionary Compression ***", PHP_EOL;
check_compress_using_ddict($data, $dictionary);
?>
===Done===
--EXPECTF--
*** Data size ***
3547
*** Dictionary Compression ***
142 -- 1%d -- true
===Done===
