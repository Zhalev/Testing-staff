<?php

namespace AppBundle\Service;

class MenuGenerate
{

    private $menu = array();
    private $classesRoot = "navbar-nav mr-auto";
    private $classesItem = "nav-item";
    private $classesItemLink = "nav-link";

    /**
     * Add link in menu
     * @param string $name
     * @param string $link
     */
    public function addLink($name, $link) {
        array_push($this->menu, array($name => $link));
    }

    /**
     * For set class for ul tag
     * @param string $classes
     */
    public function setClassesRoot($classes) {
        $this->classesRootNode = $classes;
    }
    public function setClassesItem($classes) {
        $this->classesItemLink = $classes;
    }


    /**
     * @return string
     */
    public function generateView() {
        if (empty($this->menu)) {
            return '';
        }
        $str = "<ul class=\"{$this->classesRoot}\">";
        $index = 0;
        foreach ($this->menu[$index++] as $name => $link) {
            $str .= "<li class=\"{$this->classesItem}\">";
            $str .= sprintf("<a class=\"{$this->classesItemLink}\" href=\"%s\">%s</a>", $link, $name);
            $str .= '</li>';
        }

        $str .= "</ul>";
        return $str;
    }
}