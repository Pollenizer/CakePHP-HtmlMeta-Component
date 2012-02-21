<?php
/**
 * HTML Meta Component
 *
 * A CakePHP Component for adding and outputting HTML Meta Elements.
 *
 * PHP 5
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the below copyright notice.
 *
 * @author     Robert Love <robert@pollenizer.com>
 * @copyright  Copyright 2012, Pollenizer Pty. Ltd. (http://pollenizer.com)
 * @license    MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @since      CakePHP(tm) v 2.0.4
 */

App::uses('HtmlHelper', 'View/Helper');

class HtmlMetaComponent extends Component
{
    /**
     * Attributes
     *
     * @var array
     */
    protected static $_attributes = array();

    /**
     * Settings
     *
     * @var array
     */
    protected static $_settings = array();

    /**
     * Construct
     *
     * @param ComponentCollection $collection The Component collection used on this request
     * @param array $settings Array of settings
     * @return void
     */
    public function __construct(ComponentCollection $collection, $settings = array())
    {
        self::$_settings = $settings;
    }

    /**
     * Add Element
     *
     * @param array $attributes Array of HTML attributes
     * @return HtmlMetaComponent $this
     */
    public function addElement($attributes)
    {
        if ((is_array($attributes)) && (!empty($attributes))) {
            self::$_attributes[] = $attributes;
        }
        return $this;
    }

    /**
     * Elements
     *
     * @return string HTML Meta Elements
     */
    public static function elements()
    {
        $elements = null;
        self::$_attributes = array_merge(self::$_settings, self::$_attributes);
        if (!empty(self::$_attributes)) {
            $Html = new HtmlHelper(new View(null));
            foreach (self::$_attributes as $attributes) {
                if ((is_array($attributes)) && (!empty($attributes))) {
                    $elements .= $Html->meta($attributes) . "\n";
                }
            }
        }
        return $elements;
    }
}
