<?php
/**
 * Joomla! Yireo Lib
 *
 * @author Yireo
 * @package YireoLib
 * @copyright Copyright 2012
 * @license GNU Public License
 * @link http://www.yireo.com/
 * @version 0.5.1
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
?>
<fieldset class="adminform">
<legend><?php echo JText::_($fieldset); ?></legend>
    <table class="admintable" width="100%">
    <?php foreach ($fields as $field): ?>
    <?php if (!isset($field['title'])) $field['title'] = 'LIB_YIREO_TABLE_FIELDNAME_'.strtoupper($field['name']); ?>
    <?php if (!isset($field['value'])) $field['value'] = null; ?>
    <?php if (!isset($field['custom'])) $field['custom'] = null; ?>
    <?php if (!isset($field['type'])) $field['type'] = 'custom'; ?>
    <tr>
        <td width="100" align="right" class="key">
            <label for="<?php echo $field['name']; ?>">
                <?php echo JText::_($field['title']); ?>:
            </label>
        </td>
        <td class="value">
        <?php if ($field['type'] == 'text'): ?>
            <?php $size = (isset($field['size'])) ? $field['size'] : 35; ?>
            <input type="text" name="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" value="<?php echo $field['value'];?>" size="<?php echo $size; ?>" />

        <?php elseif ($field['type'] == 'email'): ?>
            <?php $size = (isset($field['size'])) ? $field['size'] : 35; ?>
            <input type="email" name="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" value="<?php echo $field['value'];?>" size="<?php echo $size; ?>" />

        <?php elseif ($field['type'] == 'textarea'): ?>
            <?php $rows = (isset($field['rows'])) ? $field['rows'] : 10; ?>
            <?php $cols = (isset($field['cols'])) ? $field['cols'] : 60; ?>
            <?php if (isset($field['editor']) && $field['editor'] == 0) : ?>
            <textarea name="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" 
                rows="<?php echo $rows; ?>" cols="<?php echo $cols; ?>"><?php echo $field['value'];?></textarea>
            <?php else: ?>
            <?php $editor = JFactory::getEditor(); ?>
            <?php echo $editor->display($field['name'], $field['value'], '100%', '100%', $cols, $rows, false); ?>
            <?php endif;?>

        <?php else: ?>
            <?php echo $field['custom']; ?>
        <?php endif; ?>

        <?php if (!empty($field['comment'])) : ?>
            <br/><span class="field-comment"><?php echo $field['comment']; ?></span>
        <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </table>
</fieldset>
