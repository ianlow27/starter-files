<?php
/* ====================================================
TO DO:
======
- cystrawennu y rhestr cwblhawyd i alldynnu yr ochr chwith ar gyfer y  changelog___add summarized of change description using the triple underscore
- angen i greu plygell executables, e.e. os fath o wefanapp neu weithredolyn, gyda sgripiau cregyn/plisgyn___create executables folder
- Yn y seirch prawfholiad, angen i newid Prawf1 i'r enw o'r dosbarth___debug test harness
- Yn y README.md, angen i fewnosod hyffordiannau i ychwanegu y llinell ar gyfer sgriptiau, sef "Ianl28\\StarterFiles\\StarterFilers::run" - hefyd mae'n angen cynhwys hyffordiannau ar gyfer y prawfholiadseirch a'r gweithredolyn hefyd.___add extra instructions in the README.md
- amnewid enw i script-starter-files___change name to script-starter-files
-----------------------------------------------------
DONE:
=====
# Changelog
## 1.0.0 - 2022-08-11
### Changed
- details
### Fixed
- details
### Added
- create starter class php file
- create examples folder with examples file
- create README.md
- create LICENSE.md
- create CONTRIBUTING.md
- create CHANGELOG.md
====================================================== */
namespace Ianl28\StarterFiles;
use Composer\Script\Event;
use Composer\Installer\PackageEvent;

class StarterFiles{

  public static function run(Event $event){
    echo "Today is ". date("Ymd Hi:s"). "\n";
    $afile1=json_decode(file_get_contents("./composer.json"));
    $bbreak=0; $lnamespace=""; $lvendor=""; $lpackagename=""; $lauthor=""; $lemail="";
//-------------------------------------
$llTflnCyf= preg_replace("/ /", "",
              ucwords(
                preg_replace("/\-/", " ",
                  basename(getcwd())
                )
              )
            );

//echo $llTflnCyf."\n";
if(!file_exists("./src")) mkdir("./src", 0755);





//-------------------------------------

    foreach($afile1 as $key => $value){
      //echo $key." -> ";
      if(($key != "name") && ($key != "name") && ($key != "authors") ) continue;
      if(gettype($value) != "string") 
      foreach($value as $key1=>$value1){
        //echo $key1." -> ";
        if( ($key1 != "psr-4") && ($key1 != 0 ) ) continue;
        if(gettype($value1) != "string") 
        foreach($value1 as $key2=>$value2){
          //echo $key2." -> ";
          if(gettype($value2) != "string")
          foreach($value2 as $key3=>$value3){
            //echo $key3."->";
          }//endforeach
          else {
            //echo "[".$value2. "]";
            if($value2 == "src/"){
              //$bbreak=1;
              $lnamespace=preg_replace("/^([^\\\]*)\\\([^\\\]+)\\\([^\\\]*)$/", "$2", $key2);
              $lvendor=preg_replace("/^([^\\\]*)\\\([^\\\]+)\\\([^\\\]*)$/", "$1", $key2);
            }
            if($key2 == "name"){  $lauthor = $value2; $xbbreak=1; }
            if($key2 == "email"){ $lemail = $value2;  $xbbreak=1; }
          }
        }//endforeach
        //else echo "[".$value1. "]";
        if($bbreak) break;
      }//endforeach
      else {
        $lpackagename = $value; 
      } 
      //else echo "[".$value. "]";
      //echo "\n";
      if($bbreak) break;
    }//endforeach

    if($lpackagename == ""){
       echo "Error: Unable to discover packagename of project. Please ensure that composer.json contains an entry for name in the format '<vendor>\<package-name>'.";
       die(); 
    }else {
       $d1a = explode("/", $lpackagename);
       $lvendor= preg_replace("/ /", "",
                    ucwords(
                      preg_replace("/\-/", " ", $d1a[0] )
                    )
                  );
       $lnamespace = preg_replace("/ /", "",
                    ucwords(
                      preg_replace("/\-/", " ", $d1a[1] )
                    )
                  );

       
       echo "Note: Discovered namespace '". $lvendor.'\\'. $lnamespace. "' with package name '". $lpackagename. "'\n";

       if(!file_exists("./src/". $lnamespace.".php")){
         file_put_contents("./src/". $lnamespace. ".php", 
'<?php
/* ==============================================
TO DO:
======
- details
-------------------------------------------------
DONE:
=====
# Changelog
## 1.0.0 - yyyy-mm-dd
### Changed
- details
### Fixed
- details
### Added
- details
================================================= */
namespace '. $lvendor. '\\'. $lnamespace. ';
class '. $lnamespace . '{

//-------------------------------
public function __construct(){
  echo "This is called from '. $lnamespace. '->__construct()\n";
}//endfunc
//-------------------------------
public function testfunc($pstr){
  echo "[parameter passed into testfunc(): ". $pstr ." ]";
}//endfunc
//-------------------------------
public function main(){
echo \'<!DOCTYPE html><html><head><meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
__a {text-decoration:none;}
</style>
</head>
<body style="margin:0px;font-family:Times New Roman;">
<table width="100%" border=0 borderwidth=0 bordercolor=blue cellspacing=0 cellpadding=0>
<tr><td style="background-color:darkslategrey;color:white;xxtext-align:right;">
<table width="100%">
<tr>
<td width="99%" style="text-align:center;" >
  php-slideshow
</td>
<td width="1%" >
<input type="text" onkeydown="txcmd_onkeypress();" id="txcmd" style="width:10px;"/>
</td>
</tr>
</table>

<script>
let txcmd = document.getElementById("txcmd");
txcmd.focus();
function txcmd_onkeypress(){
  let e=event;
  const keycode = Number(e.keyCode);
  if      ((keycode == 39) || (keycode == 40)){
    alert("forward");
  }else if((keycode == 37) || (keycode == 38)){
    alert("backward");
  }
txcmd.value="";
txcmd.focus();
}//endfunc

</script>


</td></tr>
<tr><td>\';

  echo "This is called from '. $lnamespace. '->main()\n";
  echo self::testfunc(date("Ymd-Hi:s"));

echo \'
</td></tr>
</table>
</body></html>\';
}//endfunc
//-------------------------------

}//endclass 
?>
');
echo "created ./src/". $lnamespace. ".php!\n";
       }//endif
       //-----------------------------------------
       if(!file_exists("./examples")){
         //mkdir("./examples");
       }
       //-----------------------------------------
       if(!file_exists("./examples/testharness.php")){
         file_put_contents("./src/test.php",
'<?php

require_once("../vendor/autoload.php");

$oprawf1 = new '. $lvendor .'\\'. $lnamespace .'\\'.  $lnamespace.'();

$oprawf1->main();

?>
');
echo "created ./src/test.php!\n";
       }//endif
       //-----------------------------------------
       if(!file_exists("./.gitignore")){
         file_put_contents("./.gitignore", 'vendor');
echo "created ./.gitignore!\n";
       }//endif
       //-----------------------------------------
       if(!file_exists("./src/servephp.sh")){
         file_put_contents("./src/servephp.sh",
'#!/bin/sh
php -S localhost:3000 -t ../
');
chmod("./src/servephp.sh", 0755);;
echo "created ./src/servephp.sh!\n";
       }//endif
       //-----------------------------------------
       if(!file_exists("./index.php")){
         file_put_contents("./index.php",
'<?php

require_once("./vendor/autoload.php");

$oprawf1 = new '. $lvendor .'\\'. $lnamespace .'\\'.  $lnamespace.'();

$oprawf1->main();

?>
');
echo "created ./index.php!\n";
       }//endif
       //-----------------------------------------
       if(!file_exists("./README.md")){
         file_put_contents("./README.md",
'README
======

{- Please enter a short description of your project here. -}

## Compatibility

{- Tested up to PHP 7, should be compatible with PHP 5.3 or above -}

## Installation

### Composer
Add these lines to your composer.json:
```json
    {
        "require": {
            "'. $lpackagename. '": "*"
        }
    }
```
or run the following command:

    php composer.phar require '. $lpackagename .'

## Usage Example

```php

$obj1 = new '.$lvendor.'\\'.$lnamespace.'\\'.$lnamespace.'();

$obj1->main();

```

## Change Log

Please see [CHANGELOG](CHANGELOG.md) for more information on the recent changes.

## Contribute

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- '. $lauthor .' ('. $lemail. ')

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
');
echo "created ./README.md!\n";
       }//endif 
       //-----------------------------------------
       if(!file_exists("./LICENSE.md")){
         file_put_contents("./LICENSE.md",
'MIT License

Copyright (c) '.date("Y"). ' ' .$lauthor . ' and contributors

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
');
echo "created ./LICENSE.md!\n";
       }//endif 
       //-----------------------------------------
       if(!file_exists("./CONTRIBUTING.md")){
         file_put_contents("./CONTRIBUTING.md",
'
Contributing
-------------

'. $lnamespace.' is an open source, community-driven project. If you\'d like to contribute,
feel free to do this, but remember to follow this few simple rules:

## Branching strategy

- __Always__ base your changes on the `master` branch (all new development happens here),
- When you create Pull Request, always select `master` branch as target, otherwise it
will be closed (this is selected by default).

## Coverage

- All classes that interact solely with the core logic should be covered by Specs
- Any infrastructure adaptors should be covered by integration tests using PHPUnit
- All features should be covered with .feature descriptions automated with Behat

## Code style / Formatting

- All new classes must carry the standard copyright notice docblock
- All code in the `src` folder must follow the PSR-2 standard
');
echo "created ./CONTRIBUTING.md!\n";
       }//endif 
       //-----------------------------------------
       if(!file_exists("./src/". $lnamespace. ".php")){
         echo "ERROR: Unable to find main class file './src/". $lnamespace. "'. Please create this file and insert a commented-out section starting with the line '# Changelog' and ending with the line containing a minimum of 10 equal signs '=========='.";
       }else {
          $bchangelog = 0; $lchangelogstr="";
          foreach(explode("\n", file_get_contents("./src/". $lnamespace. ".php")) as $linestr){
            $linestr = trim($linestr);
            if($linestr == "# Changelog"){
               $bchangelog = 1;
            }else if( (preg_match("/==========/", $linestr))
               && ($bchangelog) ){
               break;
            }
            if($bchangelog){
              $lchangelogstr .= $linestr. "\n"; 
            }
          }//endforeach 
       }
       file_put_contents("./CHANGELOG.md", $lchangelogstr);
echo "created ./CHANGELOG.md!\n";
       //-----------------------------------------
    }//endif
    echo "Files created!\n";
    echo 'Please ensure that the following autoload entry is added to composer.json, and then run "composer update":
    "autoload": {
      "psr-4": {
         "'. $lvendor. '\\\\'. $lnamespace. '\\\\": "src/"
      }
    },

';
  }//endfunc
  //------------------------



}//endclass
?>
