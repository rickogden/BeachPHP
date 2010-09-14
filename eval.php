<?php
include 'images.php';
$tmpdir = ini_get('upload_tmp_dir');
$file = tempnam($tmpdir,'php');
$data = $_POST['data'];
if (!stristr($data, '<?php')) {
	$data = "<?php\n" . $data;
}
file_put_contents($file, $data);
$output = array();
$return = null;
exec  ('php -d error_reporting=32767 -d display_errors=1 -d log_errors=0 -l ' . $file, $output, $return);
$message = 'OK!';
$image = 'ok';
$errLine;$match;$error;
if (0 !== $return) {
	$matches = array();
	$error = $output[1];
	$match = preg_match('#([\w\d\s]+), (.*) (?:in [\w\d/]+ on line) ([\d]+)#i', $error, $matches);
	if ($match) {
		$error = "[{$matches[1]}:{$matches[2]}][LINE:{$matches[3]}]";
		$errLine = $matches[3];
	}
	$message = 'ERROR PARSING INPUT: ';
	$image = 'warning';
}

echo "<img src=\"data:image/jpeg;base64,{$$image}\"/>&nbsp;{$message}<hr/><p>{$error}</p>";
if (0 != $return && $match) {
	echo '<div style="width:100%;height:100%;overflow:auto;white-space:nowrap;border-bottom:1px dotted #2b2b2b;">';
	$data = explode("\n",$data);
	foreach ($data as $line => &$value) {
        $color = ($line == $errLine-1) ? 'red' : 'lime';
    	$value = '<div style="background:'.$color.';margin:0px;">' . ($line +1) .': &nbsp;' . htmlentities($value) . "</div>\n";
echo $value;
    }
echo '</div>';
	return;
}
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 'on');
ini_set('open_basedir', implode(PATH_SEPARATOR, array(__DIR__,dirname($file))) . PATH_SEPARATOR . get_include_path());
ob_start();
include $file;
$content = ob_get_clean();
echo nl2br(htmlentities($content));
unlink($file);