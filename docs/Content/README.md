# Content Package

The content package provides some element tree functionality. You can set up a tree of content element and traverse it with visitors.


Running the following code will produce the output:
> Found element: demo [DPF\Content\Element\Basic\Element]

```
class ExampleVisitor extends \DPF\Content\Visitor\AbstractElementVisitor
{
	public function visitElement(\DPF\Content\Element\Basic\Element $element)
	{
		echo 'Found element: ' . $element;
	}
}

$element = new \DPF\Content\Element\Basic\Element('demo');
$element->accept(new ExampleVisitor());
```
More example can be found in the examples directory.