<?php
/**
 * Joomla! link-plugin for SimpleLists - Image Links
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
 * SimpleLists Link Plugin - Image Links
 */ 
class plgSimpleListsLinkImage extends plgSimpleListsLinkDefault
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
            $plugin = JPluginHelper::getPlugin('simplelistslink', 'image');
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
        return 'Internal image';
    }    

    /*
     * Method to build the item URL 
     *
     * @access public
     * @param object $item
     * @return string
     */
    public function getUrl($item = null) {
        return JURI::base().$item->link;
    }

    /*
     * Method to build the HTML when editing a item-link with this plugin
     *
     * @access public
     * @param mixed $current
     * @return string
     */
    public function getInput($current = null) {
        $modal_link = 'index.php?option=com_simplelists&amp;view=files&amp;tmpl=component&amp;type=link_image';
        if($current!=null) {
            $modal_link .= '&amp;folder=/'.dirname( $current ).'&amp;current='.$current;
        } else {
            $modal_link .= '&amp;current=';
        }

        return $this->getModal('image', $modal_link, $current);
    }
}