## Table of contents

- [\CCL\Content\Element\Component\Alert](#class-cclcontentelementcomponentalert)
- [\CCL\Content\Element\Component\Badge](#class-cclcontentelementcomponentbadge)
- [\CCL\Content\Element\Component\Dropdown](#class-cclcontentelementcomponentdropdown)
- [\CCL\Content\Element\Component\Grid](#class-cclcontentelementcomponentgrid)
- [\CCL\Content\Element\Component\Icon](#class-cclcontentelementcomponenticon)
- [\CCL\Content\Element\Component\Panel](#class-cclcontentelementcomponentpanel)
- [\CCL\Content\Element\Component\Tab](#class-cclcontentelementcomponenttab)
- [\CCL\Content\Element\Component\TabContainer](#class-cclcontentelementcomponenttabcontainer)
- [\CCL\Content\Element\Component\Grid\Column](#class-cclcontentelementcomponentgridcolumn)
- [\CCL\Content\Element\Component\Grid\Row](#class-cclcontentelementcomponentgridrow)
- [\CCL\Content\Element\Component\Panel\Body](#class-cclcontentelementcomponentpanelbody)
- [\CCL\Content\Element\Component\Panel\Image](#class-cclcontentelementcomponentpanelimage)
- [\CCL\Content\Element\Component\Panel\Title](#class-cclcontentelementcomponentpaneltitle)

<hr />

### Class: \CCL\Content\Element\Component\Alert

> An alert representation.

| Visibility | Function |
|:-----------|:---------|
| public | <em>Initiates the alert of the given type.</em><br><br>Parameters: <ul><li>mixed <strong>$id</strong> <em></em></li><li>string <strong>$type</strong> <em></em></li><li>array <strong>$classes</strong> <em></em></li><li>array <strong>$attributes</strong> <em></em></li></ul>Returns:<br><em>void</em><br><br>Call:<br><strong>__construct(</strong><em>mixed</em> <strong>$id</strong>, <em>string</em> <strong>$type</strong>, <em>array</em> <strong>$classes = array()</strong>, <em>array</em> <strong>$attributes = array()</strong>)</strong> |
| public | <em>Returns the type of alert.</em><br><br>Returns:<br><em>string</em><br><br>Call:<br><strong>getType()</strong> |

*This class extends \CCL\Content\Element\Basic\Container*

<hr />

### Class: \CCL\Content\Element\Component\Badge

> A badge representation.

| Visibility | Function |
|:-----------|:---------|
| public | <em>Constructor which sets the classes and attributes of the element. The id parameter must be set, otherwise an InvalidArgumentException is thrown.</em><br><br>Parameters: <ul><li>string <strong>$id</strong> <em>The id of the element, must be not empty</em></li><li>array <strong>$classes</strong> <em>The classes of the element</em></li><li>array <strong>$attributes</strong> <em>Additional attributes for the element</em></li></ul>Returns:<br><em>void</em><br><br>Call:<br><strong>__construct(</strong><em>string</em> <strong>$id</strong>, <em>array</em> <strong>$classes = array()</strong>, <em>array</em> <strong>$attributes = array()</strong>)</strong> |

*This class extends \CCL\Content\Element\Basic\Container*

<hr />

### Class: \CCL\Content\Element\Component\Dropdown

> A dropdown representation.

| Visibility | Function |
|:-----------|:---------|
| public | <em>Constructor which sets the classes and attributes of the element. The id parameter must be set, otherwise an InvalidArgumentException is thrown.</em><br><br>Parameters: <ul><li>string <strong>$id</strong> <em>The id of the element, must be not empty</em></li><li>array <strong>$classes</strong> <em>The classes of the element</em></li><li>array <strong>$attributes</strong> <em>Additional attributes for the element</em></li></ul>Returns:<br><em>void</em><br><br>Call:<br><strong>__construct(</strong><em>string</em> <strong>$id</strong>, <em>array</em> <strong>$classes = array()</strong>, <em>array</em> <strong>$attributes = array()</strong>)</strong> |
| public | <em>Adds the given element as entry in the dropdown.</em><br><br>Parameters: <ul><li>\CCL\Content\Element\Basic\Element <strong>$element</strong> <em></em></li></ul>Returns:<br><em>\CCL\Content\Element\Basic\Element</em><br><br>Call:<br><strong>addElement(</strong><em>\CCL\Content\Element\Basic\Element</em> <strong>$element</strong>)</strong> |
| public | Returns:<br><em>void</em><br><br>Call:<br><strong>clearChildren()</strong> |
| public | <em>Returns the trigger element.</em><br><br>Returns:<br><em>\CCL\Content\Element\Basic\Element</em><br><br>Call:<br><strong>getTriggerElement()</strong> |
| public | <em>Adds the given element as trigger in the dropdown.</em><br><br>Parameters: <ul><li>\CCL\Content\Element\Basic\Element <strong>$trigger</strong> <em></em></li></ul>Returns:<br><em>\CCL\Content\Element\Basic\Element</em><br><br>Call:<br><strong>setTriggerElement(</strong><em>\CCL\Content\Element\Basic\Element</em> <strong>$trigger</strong>)</strong> |

*This class extends \CCL\Content\Element\Basic\Container*

<hr />

### Class: \CCL\Content\Element\Component\Grid

> A grid representation.

| Visibility | Function |
|:-----------|:---------|
| public | <em>Constructor which sets the classes and attributes of the element. The id parameter must be set, otherwise an InvalidArgumentException is thrown.</em><br><br>Parameters: <ul><li>string <strong>$id</strong> <em>The id of the element, must be not empty</em></li><li>array <strong>$classes</strong> <em>The classes of the element</em></li><li>array <strong>$attributes</strong> <em>Additional attributes for the element</em></li></ul>Returns:<br><em>void</em><br><br>Call:<br><strong>__construct(</strong><em>string</em> <strong>$id</strong>, <em>array</em> <strong>$classes = array()</strong>, <em>array</em> <strong>$attributes = array()</strong>)</strong> |
| public | <em>Adds the given row to the internal childs and returns it for chaining.</em><br><br>Parameters: <ul><li>\CCL\Content\Element\Component\Grid\Row <strong>$row</strong> <em></em></li></ul>Returns:<br><em>[\CCL\Content\Element\Component\Grid\Row](#class-cclcontentelementcomponentgridrow)</em><br><br>Call:<br><strong>addRow(</strong><em>[\CCL\Content\Element\Component\Grid\Row](#class-cclcontentelementcomponentgridrow)</em> <strong>$row</strong>)</strong> |

*This class extends \CCL\Content\Element\Basic\Container*

<hr />

### Class: \CCL\Content\Element\Component\Icon

> An icon representation.

| Visibility | Function |
|:-----------|:---------|
| public | <em>Prepares the icon with the given strategy if available.</em><br><br>Parameters: <ul><li>string <strong>$id</strong> <em></em></li><li>string <strong>$type</strong> <em></em></li><li>array <strong>$classes</strong> <em></em></li><li>array <strong>$attributes</strong> <em></em></li></ul>Returns:<br><em>void</em><br><br>Call:<br><strong>__construct(</strong><em>string</em> <strong>$id</strong>, <em>string</em> <strong>$type</strong>, <em>array</em> <strong>$classes = array()</strong>, <em>array</em> <strong>$attributes = array()</strong>)</strong> |
| public | <em>Returns the type of the icon.</em><br><br>Returns:<br><em>string</em><br><br>Call:<br><strong>getType()</strong> |

*This class extends \CCL\Content\Element\Basic\Element*

<hr />

### Class: \CCL\Content\Element\Component\Panel

> A Panel representation.

| Visibility | Function |
|:-----------|:---------|
| public | <em>Constructor which sets the classes and attributes of the element. The id parameter must be set, otherwise an InvalidArgumentException is thrown.</em><br><br>Parameters: <ul><li>string <strong>$id</strong> <em>The id of the element, must be not empty</em></li><li>array <strong>$classes</strong> <em>The classes of the element</em></li><li>array <strong>$attributes</strong> <em>Additional attributes for the element</em></li></ul>Returns:<br><em>void</em><br><br>Call:<br><strong>__construct(</strong><em>string</em> <strong>$id</strong>, <em>array</em> <strong>$classes = array()</strong>, <em>array</em> <strong>$attributes = array()</strong>)</strong> |
| public | <em>Adds the given body as child and returns it for chaining.</em><br><br>Parameters: <ul><li>\CCL\Content\Element\Component\Panel\Body <strong>$body</strong> <em></em></li></ul>Returns:<br><em>[\CCL\Content\Element\Component\Panel\Body](#class-cclcontentelementcomponentpanelbody)</em><br><br>Call:<br><strong>addBody(</strong><em>[\CCL\Content\Element\Component\Panel\Body](#class-cclcontentelementcomponentpanelbody)</em> <strong>$body</strong>)</strong> |
| public | <em>Adds the given image as child and returns it for chaining.</em><br><br>Parameters: <ul><li>\CCL\Content\Element\Component\Panel\Image <strong>$image</strong> <em></em></li></ul>Returns:<br><em>[\CCL\Content\Element\Component\Panel\Image](#class-cclcontentelementcomponentpanelimage)</em><br><br>Call:<br><strong>addImage(</strong><em>[\CCL\Content\Element\Component\Panel\Image](#class-cclcontentelementcomponentpanelimage)</em> <strong>$image</strong>)</strong> |
| public | <em>Adds the given title as child and returns it for chaining.</em><br><br>Parameters: <ul><li>\CCL\Content\Element\Component\Panel\Title <strong>$title</strong> <em></em></li></ul>Returns:<br><em>[\CCL\Content\Element\Component\Panel\Title](#class-cclcontentelementcomponentpaneltitle)</em><br><br>Call:<br><strong>addTitle(</strong><em>[\CCL\Content\Element\Component\Panel\Title](#class-cclcontentelementcomponentpaneltitle)</em> <strong>$title</strong>)</strong> |

*This class extends \CCL\Content\Element\Basic\Container*

<hr />

### Class: \CCL\Content\Element\Component\Tab

> A tab representation.

| Visibility | Function |
|:-----------|:---------|
| public | Parameters: <ul><li>mixed <strong>$id</strong> <em></em></li><li>mixed <strong>$name</strong> <em></em></li><li>mixed <strong>$title</strong> <em></em></li><li>array <strong>$classes</strong> <em></em></li><li>array <strong>$attributes</strong> <em></em></li></ul>Returns:<br><em>void</em><br><br>Call:<br><strong>__construct(</strong><em>mixed</em> <strong>$id</strong>, <em>mixed</em> <strong>$name</strong>, <em>mixed</em> <strong>$title</strong>, <em>array</em> <strong>$classes = array()</strong>, <em>array</em> <strong>$attributes = array()</strong>)</strong> |
| public | <em>Returns the name of the tab.</em><br><br>Returns:<br><em>string</em><br><br>Call:<br><strong>getName()</strong> |
| public | <em>Returns the title of the tab.</em><br><br>Returns:<br><em>string</em><br><br>Call:<br><strong>getTitle()</strong> |

*This class extends \CCL\Content\Element\Basic\Container*

<hr />

### Class: \CCL\Content\Element\Component\TabContainer

> A TabContainer representation.

| Visibility | Function |
|:-----------|:---------|
| public | <em>Constructor which sets the classes and attributes of the element. The id parameter must be set, otherwise an InvalidArgumentException is thrown.</em><br><br>Parameters: <ul><li>string <strong>$id</strong> <em>The id of the element, must be not empty</em></li><li>array <strong>$classes</strong> <em>The classes of the element</em></li><li>array <strong>$attributes</strong> <em>Additional attributes for the element</em></li></ul>Returns:<br><em>void</em><br><br>Call:<br><strong>__construct(</strong><em>string</em> <strong>$id</strong>, <em>array</em> <strong>$classes = array()</strong>, <em>array</em> <strong>$attributes = array()</strong>)</strong> |
| public | <em>Adds the given tabs to the internal tabs container and returns it for chaining.</em><br><br>Parameters: <ul><li>\CCL\Content\Element\Component\Tab <strong>$tab</strong> <em></em></li></ul>Returns:<br><em>[\CCL\Content\Element\Component\Tab](#class-cclcontentelementcomponenttab)</em><br><br>Call:<br><strong>addTab(</strong><em>[\CCL\Content\Element\Component\Tab](#class-cclcontentelementcomponenttab)</em> <strong>$tab</strong>)</strong> |
| public | <em>Returns the container for the tab links.</em><br><br>Returns:<br><em>\CCL\Content\Element\Basic\ListContainer</em><br><br>Call:<br><strong>getTabLinks()</strong> |
| public | <em>Returns the container for the tabs.</em><br><br>Returns:<br><em>\CCL\Content\Element\Basic\Container</em><br><br>Call:<br><strong>getTabs()</strong> |

*This class extends \CCL\Content\Element\Basic\Container*

<hr />

### Class: \CCL\Content\Element\Component\Grid\Column

> A column representation.

| Visibility | Function |
|:-----------|:---------|
| public | Parameters: <ul><li>mixed <strong>$id</strong> <em></em></li><li>mixed <strong>$width</strong> <em></em></li><li>array <strong>$classes</strong> <em></em></li><li>array <strong>$attributes</strong> <em></em></li></ul>Returns:<br><em>void</em><br><br>Call:<br><strong>__construct(</strong><em>mixed</em> <strong>$id</strong>, <em>mixed</em> <strong>$width</strong>, <em>array</em> <strong>$classes = array()</strong>, <em>array</em> <strong>$attributes = array()</strong>)</strong> |
| public | <em>Returns the width of a column in percentage.</em><br><br>Returns:<br><em>number</em><br><br>Call:<br><strong>getWidth()</strong> |

*This class extends \CCL\Content\Element\Basic\Container*

<hr />

### Class: \CCL\Content\Element\Component\Grid\Row

> A row representation.

| Visibility | Function |
|:-----------|:---------|
| public | <em>Constructor which sets the classes and attributes of the element. The id parameter must be set, otherwise an InvalidArgumentException is thrown.</em><br><br>Parameters: <ul><li>string <strong>$id</strong> <em>The id of the element, must be not empty</em></li><li>array <strong>$classes</strong> <em>The classes of the element</em></li><li>array <strong>$attributes</strong> <em>Additional attributes for the element</em></li></ul>Returns:<br><em>void</em><br><br>Call:<br><strong>__construct(</strong><em>string</em> <strong>$id</strong>, <em>array</em> <strong>$classes = array()</strong>, <em>array</em> <strong>$attributes = array()</strong>)</strong> |
| public | <em>Adds the given column to the internal childs and returns it for chaining.</em><br><br>Parameters: <ul><li>\CCL\Content\Element\Component\Grid\Column <strong>$column</strong> <em></em></li></ul>Returns:<br><em>[\CCL\Content\Element\Component\Grid\Column](#class-cclcontentelementcomponentgridcolumn)</em><br><br>Call:<br><strong>addColumn(</strong><em>[\CCL\Content\Element\Component\Grid\Column](#class-cclcontentelementcomponentgridcolumn)</em> <strong>$column</strong>)</strong> |

*This class extends \CCL\Content\Element\Basic\Container*

<hr />

### Class: \CCL\Content\Element\Component\Panel\Body

> A panel body representation.

| Visibility | Function |
|:-----------|:---------|
| public | <em>Constructor which sets the classes and attributes of the element. The id parameter must be set, otherwise an InvalidArgumentException is thrown.</em><br><br>Parameters: <ul><li>string <strong>$id</strong> <em>The id of the element, must be not empty</em></li><li>array <strong>$classes</strong> <em>The classes of the element</em></li><li>array <strong>$attributes</strong> <em>Additional attributes for the element</em></li></ul>Returns:<br><em>void</em><br><br>Call:<br><strong>__construct(</strong><em>string</em> <strong>$id</strong>, <em>array</em> <strong>$classes = array()</strong>, <em>array</em> <strong>$attributes = array()</strong>)</strong> |

*This class extends \CCL\Content\Element\Basic\Container*

<hr />

### Class: \CCL\Content\Element\Component\Panel\Image

> A panel image representation.

| Visibility | Function |
|:-----------|:---------|
| public | <em>Constructor which sets the classes and attributes of the element. The id parameter must be set, otherwise an InvalidArgumentException is thrown.</em><br><br>Parameters: <ul><li>string <strong>$id</strong> <em>The id of the element, must be not empty</em></li><li>array <strong>$classes</strong> <em>The classes of the element</em></li><li>array <strong>$attributes</strong> <em>Additional attributes for the element</em></li></ul>Returns:<br><em>void</em><br><br>Call:<br><strong>__construct(</strong><em>string</em> <strong>$id</strong>, <em>array</em> <strong>$classes = array()</strong>, <em>array</em> <strong>$attributes = array()</strong>)</strong> |

*This class extends \CCL\Content\Element\Basic\Image*

<hr />

### Class: \CCL\Content\Element\Component\Panel\Title

> A panel title representation.

| Visibility | Function |
|:-----------|:---------|
| public | <em>Constructor which sets the classes and attributes of the element. The id parameter must be set, otherwise an InvalidArgumentException is thrown.</em><br><br>Parameters: <ul><li>string <strong>$id</strong> <em>The id of the element, must be not empty</em></li><li>array <strong>$classes</strong> <em>The classes of the element</em></li><li>array <strong>$attributes</strong> <em>Additional attributes for the element</em></li></ul>Returns:<br><em>void</em><br><br>Call:<br><strong>__construct(</strong><em>string</em> <strong>$id</strong>, <em>array</em> <strong>$classes = array()</strong>, <em>array</em> <strong>$attributes = array()</strong>)</strong> |

*This class extends \CCL\Content\Element\Basic\Container*

