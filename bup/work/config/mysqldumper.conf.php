<?php
#Vars - written at 2017-10-12
$dbhost="localhost";
$dbname="u0563804_portal";
$dbuser="u0563804_rhimoni";
$dbpass="G;]y-~5Zv^SK";
$dbport=3306;
$dbsocket="";
$compression=1;
$backup_path="C:/xampp/www.rhimoniacademy.com/portal/bup/work/backup/";
$logdatei="C:/xampp/www.rhimoniacademy.com/portal/bup/work/log/mysqldump_perl.log.gz";
$completelogdatei="C:/xampp/www.rhimoniacademy.com/portal/bup/work/log/mysqldump_perl.complete.log.gz";
$sendmail_call="/usr/lib/sendmail -t -oi -oem";
$nl="\n";
$cron_dbindex=-3;
$cron_printout=1;
$cronmail=1;
$cronmail_dump=1;
$cronmailto="delivingwater2\@gmail.com";
$cronmailto_cc="";
$cronmailfrom="support\@lsbmediatech.com";
$cron_use_sendmail=1;
$cron_smtp="localhost";
$cron_smtp_port="25";
@cron_db_array=("ajaoko","andre","chat","coffedb","hander","jemfc-osgv","media","oes","performance_schema","pm","reportcard","sam","samuel","schdb","school_5","school_db","school_dommy","test","web","wordpress","zionhigh_db");
@cron_dbpraefix_array=("","","","","","","","","","","","","","","","","","","","","");
@cron_command_before_dump=("","","","","","","","","","","","","","","","","","","","","");
@cron_command_after_dump=("","","","","","","","","","","","","","","","","","","","","");
@ftp_server=("","","");
@ftp_port=(21,21,21);
@ftp_mode=(0,0,0);
@ftp_user=("","","");
@ftp_pass=("","","");
@ftp_dir=("","","");
@ftp_timeout=(30,30,30);
@ftp_useSSL=(0,0,0);
@ftp_transfer=(0,0,0);
$mp=0;
$multipart_groesse=1048576;
$email_maxsize=3145728;
$auto_delete=0;
$max_backup_files=3;
$perlspeed=10000;
$optimize_tables_beforedump=1;
$logcompression=1;
$log_maxsize=1048576;
$complete_log=1;
$my_comment="";
?>