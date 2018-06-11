<?php
#!/usr/bin/php
# http://www.ua3w.com/pya.php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST))
    $_POST = json_decode(file_get_contents('php://input'), true);
    
$parsingF=Array();
$parsingF["ok"]=$s[rand(0, 5)];
ParseForms ();
// array_key_exists('stu', $parsingF) &&
// array_key_exists('atu', $parsingF) &&
if (array_key_exists('name', $parsingF) && 
    array_key_exists('age', $parsingF))
{
 echo 'name='.$parsingF["name"].' age='.$parsingF["age"];
} else {
 echo "no post and get: ".count ($_POST).'|'.count ($_GET);
}

function ParseForms ()
{
 global $parsingF;
 if (count ($_POST)>0) {
  foreach($_POST as $index => $val) {
   $parsingF[$index]=$val;
  }
 } else if (count ($_GET)>0) {
  foreach($_GET as $index => $val) {
   $parsingF[$index]=$val;
  }
 }
}


function SqlSel ($line)
{
 global $parsingF;
 $sa=Array();
 $dbcnx=mysql_connect ($parsingF["datab_host"],$parsingF["datab_logi"],$parsingF["datab_pass"]);
 if (!$dbcnx) {
  exit ('no db_connect');
 } else {
  if (!@mysql_select_db ($parsingF["datab_name"])) {
   exit ('no db_connect');
  }
 }
 $gdb=mysql_query ($line);
 if (!$gdb) exit(@mysql_erorr());
 while($se=mysql_fetch_row($gdb)) {
  $sa=array_merge ($sa,$se);
 }
 $sa[]=count ($sa);
 return $sa;
}

function SqlUpd ($line)
{
 global $parsingF;
 $sa=Array();
 $dbcnx=mysql_connect ($parsingF["datab_host"],$parsingF["datab_logi"],$parsingF["datab_pass"]);
 if (!$dbcnx) {
  exit ('no db_connect');
 } else {
  if (!@mysql_select_db ($parsingF["datab_name"])) {
   exit ('no db_connect');
  }
 }
 $gdb=mysql_query ($line);
 if (!$gdb) exit(@mysql_erorr());
 $sa[]=mysql_affected_rows();
 return $sa;
}


unset ($sreturn_connect);
     $hashref = 'SELECT uniqu,
(SELECT id FROM ' . $parsingF["msqlsites"]
 . " WHERE for_site_dir='" . $sess_host["m3"]
 . "' AND for_site_name='" . $mt[4] . "')";
     if ($parsingF["the_shopc"] == '1')
      $hashref .= ',(SELECT id FROM ' . $parsingF["msqlshoops"] . " WHERE for_site_dir='" . $sess_host["m3"] . "' AND for_site_name='" . $mt[4] . "')";
     $hashref .= ' FROM ' . $parsingF["msqlsites"] . " WHERE id=1";
     $sreturn_connect=SqlSel($hashref);
     array_pop ($sreturn_connect);
     
SqlUpd('UPDATE ' . $parsingF["msqllogusers"] . ' SET amount_commen=amount_commen+1,
add_commen_time=' . $sreturn_connect[1]
 . ',add_commen_very_fast=' . $sreturn_connect[2]
 . ',add_commen_date=' . $sreturn_connect[3]
 . ',add_commen_date_numb=' . $sreturn_connect[4]
 . " WHERE uniqu='" . $parsingF["user_dgh23yj583s2"] . "'");     
 
function delete_all_databases ()
{
 global $parsingF,$parsingL,$sess_host,$rootwww,$rootmain,$rootcgi;
 $sreturn_connect=Array();
 $sreturn_connect=SqlSels ('SHOW tables FROM ' . $parsingF["datab_name"]);
 array_pop ($sreturn_connect);
 foreach ($sreturn_connect as $tmp) {
  SqlUpds('DROP TABLE IF EXISTS ' . $tmp);
 }
 unset ($sreturn_connect);
}
 
 $key = $parsingF["msqllanguag"] . "
  (id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(16) default '',
	name_short VARCHAR(3) default '',
	name_long VARCHAR(35) default '',
	name_chous VARCHAR(200) default '',
	meta_lang VARCHAR(50) default '',
	sql_chset VARCHAR(50) default '',
	sql_chcollate VARCHAR(150) default '',
  allow_show VARCHAR(1) default 'N',
	date_create INT default 0,
  date_backup INT default 0,
    index (date_backup),
	index (name_short,name_long))
  DEFAULT CHARACTER SET " . $parsingF["mysqltblwi1"]
 . " COLLATE " . $parsingF["mysqltblwi2"];
  SqlUpds ('CREATE TABLE '.$key);

function SqlUpds ($line)
{
 global $parsingF;
 $sa=Array();
 $dbcnx=mysql_connect ($parsingF["datab_host"],$parsingF["datab_logi"],$parsingF["datab_pass"]);
 if (!$dbcnx) {
  exit ('no db_connect');
 } else {
  if (!@mysql_select_db ($parsingF["datab_name"])) {
   exit ('no db_connect');
  }
 }
 $gdb=mysql_query ($line);
 if (!$gdb) exit(@mysql_erorr());
 $sa[]=mysql_affected_rows();
 return $sa;
}

function SqlSels ($line)
{
 global $sess_host;
 $sa=Array();
 $dbcnx=mysql_connect ($sess_host["datab_host"],$sess_host["datab_logi"],$sess_host["datab_pass"]);
 if (!$dbcnx) {
  exit ('no db_connect');
 } else {
  if (!@mysql_select_db ($sess_host["datab_name"])) {
   exit ('no db_connect');
  }
 }
 $gdb=mysql_query ($line);
 if (!$gdb) exit(@mysql_erorr());
 while($se=mysql_fetch_row($gdb)) {
  $sa=array_merge ($sa,$se);
 }
 $sa[]=count ($sa);
 return $sa;
}

function delete_plphp_files ()
{
 global $parsingF,$parsingL,$sess_host,$rootwww,$rootmain,$rootcgi;
 $sreturn_connect=array ('2update.pl','backupnew.pl','create_s.pl','desistore.pl','formuse.php','formuse.pl','forsend.php','forsend.pl','frmempty.php','frmempty.pl','frmlink.pl','frmsend.php','frmsend.pl','gen_menu.pl','gen_meta.pl','gen_shop.pl','globbackup.pl','globsed.php','globsed.pl','globtest.pl','gopl.pl','imagnewdez.php','imagnewdez.pl','imagproje.pl','imagstore.php','imagstore.pl','mainlib.lib','mainlib.php','mastsav.php','mastsav.pl','mastsho.pl','menu_bottom.tmpl','menu_center.tmpl','menu_left.tmpl','menu_right.tmpl','menu_top.tmpl','numnews.txt','setscript.php','setscript.pl','showdownloads.pl','showinfo.php','showinfo.pl','sstart.php','update.pl','update_lwp.pl','updatedb.pl','updatepl.pl','lib/DBJob.php','lib/DBJob.pm','lib/GSJob.pm','lib/MPJob.php','lib/MPJob.pm','lib/PGJob.php','lib/PGJob.pm','lib/SHJob.php','lib/SHJob.pm','lib/STJob.php','lib/STJob.pm','lib/TRJob.pm','lib/WMJob.php','lib/WMJob.pm');
 for ($temp=0; $temp < count ($sreturn_connect); $temp++) {
  if (is_file ($parsingF["path_to_cgi"].'/'.$sreturn_connect[$temp])!==FALSE)
   unlink ($parsingF["path_to_cgi"].'/'.$sreturn_connect[$temp]);
 } 
}



function delete_plphp_files ()
{
 global $parsingF,$parsingL,$sess_host,$rootwww,$rootmain,$rootcgi;
 $sreturn_connect=array ('2update.pl','backupnew.pl','create_s.pl','desistore.pl','formuse.php','formuse.pl','forsend.php','forsend.pl','frmempty.php','frmempty.pl','frmlink.pl','frmsend.php','frmsend.pl','gen_menu.pl','gen_meta.pl','gen_shop.pl','globbackup.pl','globsed.php','globsed.pl','globtest.pl','gopl.pl','imagnewdez.php','imagnewdez.pl','imagproje.pl','imagstore.php','imagstore.pl','mainlib.lib','mainlib.php','mastsav.php','mastsav.pl','mastsho.pl','menu_bottom.tmpl','menu_center.tmpl','menu_left.tmpl','menu_right.tmpl','menu_top.tmpl','numnews.txt','setscript.php','setscript.pl','showdownloads.pl','showinfo.php','showinfo.pl','sstart.php','update.pl','update_lwp.pl','updatedb.pl','updatepl.pl','lib/DBJob.php','lib/DBJob.pm','lib/GSJob.pm','lib/MPJob.php','lib/MPJob.pm','lib/PGJob.php','lib/PGJob.pm','lib/SHJob.php','lib/SHJob.pm','lib/STJob.php','lib/STJob.pm','lib/TRJob.pm','lib/WMJob.php','lib/WMJob.pm');
 for ($temp=0; $temp < count ($sreturn_connect); $temp++) {
  if (is_file ($parsingF["path_to_cgi"].'/'.$sreturn_connect[$temp])!==FALSE)
   unlink ($parsingF["path_to_cgi"].'/'.$sreturn_connect[$temp]);
 } 
}

 SqlUpds ('INSERT INTO ' . $parsingF["msqllogusers"]
 . " (password,username,uniqu,second_uniqu,email,
time_zone,who_are_u,date_first_reg,date_reg,register_ok,
designn,date_backup)
 VALUES ('adm','admin','" . $sess1 . "','" . $sess1
 . "','admin\@" . $parsingF["email_mname"] . "','120',6,'"
 . datetime2str ($thetime) . "','" . datetime2str ($thetime) . "','Y',1," . $thetime . ')');


# dd3w__database: sitealli_ua3ww  Username:sitealli_ua3uaww  Password:uaslaw
 