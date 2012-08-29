<?php
/**
 * Joomla! link-plugin for SimpleLists - List Link
 *
 * @author Yireo
 * @package SimpleLists
 * @copyright Copyright 2011
 * @license GNU Public License
 * @link http://www.yireo.com/
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

// Include the parent class
if(file_exists(dirname(__FILE__).DS.'default.php')) {
    require_once dirname(__FILE__).DS.'default.php';
} else {
    require_once dirname(dirname(__FILE__)).DS.'default'.DS.'default.php';
}

/**
 * Plugin class
 */
class plgSimpleListsLinkList extends plgSimpleListsLinkDefault
{
    /**
     * Load the parameters
     * 
     * @access private
     * @param null
     * @return JParameter
     */
    private function getParams()
    {
        jimport('joomla.version');
        $version = new JVersion();
        if(version_compare($version->RELEASE, '1.5', 'eq')) {
            $plugin = JPluginHelper::getPlugin('simplelistslink', 'list');
            $params = new JParameter($plugin->params);
            return $params;
        } else {
            return $this->params;
        }
    }

    /*
     * Method to get the title for this plugin 
     *  
     * @access public
     * @param null
     * @return string
     */
    public function getTitle() {
        return 'Another SimpleList';
    }    

    /*
     * Method the friendly name of a specific item
     *
     * @access public
     * @param mixed $link
     * @return string
     */
    public function getName($link) {
        $query = "SELECT `title` FROM #__categories WHERE `id`=".(int)$link;
        $db =& JFactory::getDBO();
        $db->setQuery( $query );
        $row = $db->loadObject() ;
        if(is_object($row)) {
            return $row->title;
        } else {
            return '' ;
        }
    }

    /*
     * Method to build the item URL 
     *
     * @access public
     * @param object $item
     * @return string
     */
    public function getUrl($item = null) {
        return SimplelistsHelper::getUrl($item->link);
    }

    /*
     * Method to build the HTML when editing a item-link with this plugin
     *
     * @access public
     * @param mixed $current
     * @return string
     */
    public function getInput($current = null) {
        return JHTML::_( 'list.category', 'link_simplelist', 'com_simplelists', (int)$current );
    }
}