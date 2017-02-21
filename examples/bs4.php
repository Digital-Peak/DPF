<?php
/**
 * Simple script to show how to load CCL and to create a HTML string out of an element tree.
 */
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$alert = new \CCL\Content\Element\Component\Alert('alert', \CCL\Content\Element\Component\Alert::DANGER);
$alert->setContent('I am an alert box!');

// Decorate with Bootstrap 4 classes
$alert->accept(new \CCL\Content\Visitor\Framework\BS4());

// Traverse the tree
$domBuilder = new \CCL\Content\Visitor\Html\DomBuilder();
$alert->accept($domBuilder);

echo $domBuilder->render();
