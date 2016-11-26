<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content;

abstract class Element
{

    private $id = null;

    private $classes = array();

    private $attributes = array();

    private $content = '';

    /**
     *
     * @var Framework
     */
    private $framework = null;

    public function __construct($id, array $classes = array(), $attributes = array())
    {
        $this->id = $id;
        $this->classes = $classes;
        $this->attributes = $attributes;
    }

    protected abstract function prepare();

    public function render()
    {
        if ($this->framework) {
            $override = $this->framework->getElement($this);
            if ($override) {
                return $override->render();
            }
        }

        return $this->prepare();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getClasses()
    {
        return $this->classes;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function appendContent($content)
    {
        $this->content .= $content;
    }

    public function setFramework(Framework $framework)
    {
        $this->framework = $framework;
    }

    protected function createOpeningTag($name)
    {
        $id = '';
        if ($this->id) {
            $id = ' id="' . $this->id . '"';
        }

        $classes = '';
        if ($this->classes) {
            $classes = ' class="' . implode(' ', $this->classes) . '"';
        }

        $attributes = '';
        if ($this->attributes) {
            foreach ($this->attributes as $name => $attr) {
                $attributes .= ' ' . $name . '="' . $attr . '"';
            }
            $attributes = $attributes;
        }

        return '<' . $name . $id . $classes . $attributes . '>';
    }

    protected function createClosingTag($name)
    {
        return '</' . $name . '>';
    }
}
