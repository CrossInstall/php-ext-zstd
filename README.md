# Zstd Extension for PHP

[![Build Status](https://secure.travis-ci.org/kjdev/php-ext-zstd.png?branch=master)](https://travis-ci.org/kjdev/php-ext-zstd)

This extension allows Zstandard.

Documentation for Zstandard can be found at [» https://github.com/facebook/zstd](https://github.com/facebook/zstd).


## Build from sources

``` bash
% git clone --recursive --depth=1 https://github.com/CrossInstall/php-ext-zstd.git
% phpize
% ./configure
% make
% make install
```

To use the system library

``` bash
% ./configure --with-libzstd
```

## Distribution binary packages

### Fedora

Fedora users can install the [» php-zstd](https://apps.fedoraproject.org/packages/php-zstd) package from official repository.

``` bash
dnf install php-zstd
```

### CentOS / RHEL

CentOS / RHEL (and other clones) users can install the [» php-zstd](https://apps.fedoraproject.org/packages/php-zstd) package from [» EPEL](https://fedoraproject.org/wiki/EPEL) repository.

``` bash
yum install php-zstd
```

Other RPM packages of this extension, for other PHP versions, are available in [» Remi's RPM repository](https://rpms.remirepo.net/).


## Configration

zstd.ini:

```
extension=zstd.so
```

## Constant

Name                           | Description
-------------------------------| -----------
ZSTD\_COMPRESS\_LEVEL\_MIN     | Minimal compress level value
ZSTD\_COMPRESS\_LEVEL\_MAX     | Maximal compress level value
ZSTD\_COMPRESS\_LEVEL\_DEFAULT | Default compress level value
LIBZSTD\_VERSION\_NUMBER       | libzstd version number
LIBZSTD\_VERSION\_STRING       | libzstd version string

## Function

* zstd\_compress — Zstandard compression
* zstd\_uncompress — Zstandard decompression
* zstd\_compress\_dict — Zstandard compression using a digested dictionary
* zstd\_uncompress\_dict — Zstandard decompression using a digested dictionary

### zstd\_compress — Zstandard compression

#### Description

string **zstd\_compress** ( string _$data_ [, int _$level_ = 3 ] )

Zstandard compression.

#### Pameters

* _data_

  The string to compress.

* _level_

  The level of compression (1-22).
  (Defaults to 3, 0 for no compression)

  A value smaller than 0 means a faster compression level.
  (Zstandard library 1.3.4 or later)

#### Return Values

Returns the compressed data or FALSE if an error occurred.


### zstd\_uncompress — Zstandard decompression

#### Description

string **zstd\_uncompress** ( string _$data_ )

Zstandard decompression.

> Alias: zstd\_decompress

#### Pameters

* _data_

  The compressed string.

#### Return Values

Returns the decompressed data or FALSE if an error occurred.


### zstd\_compress\_dict — Zstandard compression using a digested dictionary

#### Description

string **zstd\_compress\_dict** ( string _$data_ , string _$dict_ )

Zstandard compression using a digested dictionary.

> Alias: zstd\_compress\_usingcdict

#### Pameters

* _data_

  The string to compress.

* _dict_

  The Dictionary data.

#### Return Values

Returns the compressed data or FALSE if an error occurred.


### zstd\_uncompress\_dict — Zstandard decompression using a digested dictionary

#### Description

string **zstd\_uncompress\_dict** ( string _$data_ , string _$dict_ )

Zstandard decompression using a digested dictionary.

> Alias: zstd\_dempress\_dict,
> zstd\_unmpress\_usingcdict, zstd\_decompress\_usingcdict

#### Pameters

* _data_

  The compressed string.

* _dict_

  The Dictionary data.

#### Return Values

Returns the decompressed data or FALSE if an error occurred.

### zstd\_create\_cctx — Create compression context

#### Description

string **zstd\_create\_cctx** ()

Creates a compression context.

#### Pameters

  None

#### Return Values

Returns a compression context. This must be freed eventually, using zstd_free_cctx.

### zstd\_free\_cctx — Free a compression context

#### Description

string **zstd\_free\_cctx** ( $cctx )

Frees a compression context.

#### Pameters

* _cctx_

  The compression context.

#### Return Values

  None

### zstd\_create\_dctx — Create decompression context

#### Description

string **zstd\_create\_dctx** ()

Creates a decompression context.

#### Pameters

  None

#### Return Values

Returns a decompression context. This must be freed eventually, using zstd_free_dctx.

### zstd\_free\_dctx — Free a decompression context

#### Description

string **zstd\_free\_dctx** ( $dctx )

Frees a decompression context.

#### Pameters

* _dctx_

  The decompression context.

#### Return Values

  None

### zstd\_create\_cdict — Create digested dictionary for compression

#### Description

string **zstd\_create\_cdict** ( $data )

Creates a digested dictionary for compression.

#### Pameters

* _data

  The dictionary data

#### Return Values

Returns a digested dictionary for compression. This must be freed eventually, using zstd_free_cdict.

### zstd\_free\_cdict — Free digested dictionary for compression

#### Description

string **zstd\_free\_cdict** ( $cdict )

Frees a digested dictionary for compression.

#### Pameters

* _cdict

  The digested dictionary.

#### Return Values

  None

### zstd\_create\_ddict — Create digested dictionary for decompression

#### Description

string **zstd\_create\_ddict** ( $data )

Creates a digested dictionary for decompression.

#### Pameters

* _data

  The dictionary data

#### Return Values

Returns a digested dictionary for decompression. This must be freed eventually, using zstd_free_ddict.

### zstd\_free\_ddict — Free digested dictionary for decompression

#### Description

string **zstd\_free\_ddict** ( $ddict )

Frees a digested dictionary for decompression.

#### Pameters

* _ddict

  The digested dictionary.

#### Return Values

  None

### zstd\_compress\_using_cdict — Zstandard compression using a context and digested dictionary

#### Description

string **zstd\_compress\_using_cdict** ( string $cctx, string _$data_ , string _$cdict_ )

Zstandard compression using a context and digested dictionary.

#### Pameters

* _cctx_

  The compression context.

* _data_

  The string to compress.

* _cdict_

  The Digested Dictionary.

#### Return Values

Returns the compressed data or FALSE if an error occurred.

### zstd\_uncompress\_using_ddict — Zstandard decompression using a context and digested dictionary

#### Description

string **zstd\_uncompress\_using_ddict** ( string $dcxt, string _$data_ , string _$ddict_ )

Zstandard decompression using a context and a digested dictionary.

#### Pameters

* _dctx

  The decompression context.

* _data_

  The compressed string.

* _ddict_

  The digested dictionary.

#### Return Values

Returns the decompressed data or FALSE if an error occurred.


## Namespace

```
Namespace Zstd;

function compress( $data [, $level = 3 ] )
function uncompress( $data )
function compress_dict ( $data, $dict )
function uncompress_dict ( $data, $dict )
```

`zstd_compress`, `zstd_uncompress`, `zstd_compress_dict` and
`zstd_uncompress_dict` function alias.

## Streams

Zstd compression and uncompression are available using the
`compress.zstd://` stream prefix.

## Examples

```php
// Using functions
$data = zstd_compress('test');
zstd_uncompress($data);

// Using namespaced functions
$data = \Zstd\compress('test');
\Zstd\uncompress($data);

// Using streams
file_put_contents("compress.zstd:///patch/to/data.zstd", $data);
readfile("compress.zstd:///patch/to/data.zstd");
```
