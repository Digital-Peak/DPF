<?php
$root = dirname(__DIR__) . "/src/DPF/Content/Element/";

$files = [];
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root)) as $file) {

	if ($file->isDir() || $file->getFileName() == 'AbstractElement.php' || $file->getFileName() == 'ElementInterface.php') {
		continue;
	}

	$files[] = $file->getPathName();
}

sort($files);

$functions = array();
$functionsI = array();

foreach ($files as $file) {
	$content = file_get_contents($file);
	if (! preg_match("#^namespace\s+(.+?);$#sm", $content, $m)) {
		continue;
	}

	$namespace = "\\" . $m[1] . "\\" . basename($file, ".php");

	$name = str_replace([
		".php",
		$root
	], "", $file);
	$name = str_replace("Basic" . DIRECTORY_SEPARATOR, "", $name);
	$name = str_replace("Extension" . DIRECTORY_SEPARATOR, "", $name);
	$name = str_replace(DIRECTORY_SEPARATOR, "", $name);

	$functions[] = "	/**
	 * {@inheritdoc}
	 *
	 * @see \\DPF\\DPF\\Content\\Visitor\\ElementVisitor::visit" . $name . "()
	 */
	public function visit" . $name . "(" . $namespace . " \$" . lcfirst($name) . ")
	{
	}
";

	$functionsI[] = "	/**
	 * Visit the " . $name . "
	 *
	 * @param " . $namespace . " \$" . lcfirst($name) . "
	 */
	public function visit" . $name . "(" . $namespace . " \$" . lcfirst($name) . ");
";
}

$buffer = "<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Visitor;

/**
 * Abstract class which implements ElementVisitor.
 */
abstract class AbstractElementVisitor implements ElementVisitor
{

" . implode(PHP_EOL, $functions) . "}
";

file_put_contents(dirname(__DIR__) . "/src/DPF/Content/Visitor/AbstractElementVisitor.php", $buffer);

$buffer = "<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Visitor;

/**
 * Interface to visit the elements.
 */
interface ElementVisitor
{

" . implode(PHP_EOL, $functionsI) . "}
";
file_put_contents(dirname(__DIR__) . "/src/DPF/Content/Visitor/ElementVisitor.php", $buffer);
