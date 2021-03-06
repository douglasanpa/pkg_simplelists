<?php
/**
 * Joomla! component SimpleLists
 *
 * @author Yireo
 * @package SimpleLists
 * @copyright Copyright (C) 2012
 * @license GNU Public License
 * @link http://www.yireo.com/
 * @deprecated Replaced with Joomla! core functionality since SimpleLists 1.6
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

// Import the libraries
require_once JPATH_ADMINISTRATOR.'/components/com_simplelists/helpers/html.php';
require_once JPATH_ADMINISTRATOR.'/components/com_simplelists/helpers/helper.php';

// Import required libraries
jimport('joomla.html.html');
jimport('joomla.access.access');
jimport('joomla.form.formfield');

class JFormFieldCategory extends JFormField
{
    /*
     * Form field type
     */
    public $type = 'SimpleLists Category';

    /*
     * Method to get the HTML of this element
     *
     * @param null
     * @return string
     */
	protected function getInput()
	{
        $categories_params = array( 'current' => $this->value, 'nullvalue' => 1 );
		return SimplelistsHTML::selectCategories( $this->name, $categories_params );
    }
}
