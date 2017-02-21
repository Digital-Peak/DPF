<?php
/**
 * Simple script to show how to load DPF and to create an element and run a visitor.
 */
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

class ExampleVisitor extends \DPF\Content\Visitor\AbstractElementVisitor
{
	public function visitElement(\DPF\Content\Element\Basic\Element $element)
	{
		echo 'Found element: ' . $element;
	}
}

$element = new \DPF\Content\Element\Basic\Element('demo');
$element->accept(new ExampleVisitor());
