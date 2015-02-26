<?php

class acf_field_year extends acf_field
{
    const YEAR_RANGE = 50;
    const AGE_LIMIT = 0;

    function __construct()
    {
        $this->name = 'year';
        $this->label = __('Year');
        $this->category = __('Basic', 'acf');

        parent::__construct();
    }

    function create_options( $field )
    {

        $key = $field['name'];

        // defaults
        $field['startYear'] = isset($field['startYear']) ? $field['startYear'] : date('Y');
        $field['yearRange'] = isset($field['yearRange']) ? $field['yearRange'] : self::YEAR_RANGE;

        ?>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e("Start Year",'acf'); ?></label>
            </td>
            <td>
                <?php
                do_action('acf/create_field', array(
                    'type'	=>	'text',
                    'name'	=>	'fields[' .$key.'][startYear]',
                    'value'	=>	$field['startYear'],
                ));
                ?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e("Year Range",'acf'); ?></label>
            </td>
            <td>
                <?php
                do_action('acf/create_field', array(
                    'type'	=>	'text',
                    'name'	=>	'fields[' .$key.'][yearRange]',
                    'value'	=>	$field['yearRange'],
                ));
                ?>
            </td>
        </tr>
    <?php
    }

    function create_field($field)
    {
        $field['startYear'] = isset($field['startYear']) ? $field['startYear'] : date('Y');
        $field['yearRange'] = isset($field['yearRange']) ? $field['yearRange'] : self::YEAR_RANGE;

        // Generate Options
        $startYear = $field['startYear'];
        $endYear = ( $startYear - $field['yearRange'] );
        //$selectYear = ( $startYear - $field['ageLimit'] );
        $years = range( $startYear, $endYear );

        echo '<select id="' . $field['name'] . '" class="' . $field['class'] . '" name="' . $field['name'] . '">' . PHP_EOL;
        foreach ( $years as $year ) {
            $selected = "";
            if( $year == $field['value'] ) {
                $selected = " selected";
            }
            echo '<option value="' . $year . '"' . $selected . '>' . $year . '</option>' . PHP_EOL;
        }
        echo '</select>' . PHP_EOL;
    }
}

new acf_field_year();
