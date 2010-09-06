<?php
$tmpdir = ini_get('upload_tmp_dir');
$file = tempnam($tmpdir,'php');
$data = $_POST['data'];
if (!stristr($data, '<?php')) {
	$data = "<?php\n" . $data;
}
file_put_contents($file, $data);
system  ('php -l ' . $file);
echo '<hr/><br/>';
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 'on');
ini_set('open_basedir', implode(PATH_SEPARATOR, array(__DIR__,dirname($file))) . PATH_SEPARATOR . get_include_path());
ob_start();
include $file;
$content = ob_get_clean();
echo nl2br(htmlentities($content));
unlink($file);