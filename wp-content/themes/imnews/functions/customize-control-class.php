<?php 
class Imnews_Customize_Control_Multiple_Select extends WP_Customize_Control {

    /**
     * The type of customize control being rendered.
     */
    public $type = 'multiple-select';

    /**
     * Displays the multiple select on the customize screen.
     */
    public function render_content() {

    if ( empty( $this->choices ) )
        return;
    ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <select <?php $this->link(); ?> multiple="multiple" >
                <?php
                    foreach ( $this->choices as $value => $label ) {
                        $selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
                        echo '<option value="' . esc_attr( $value ) . '"' . esc_attr($selected) . '>' . esc_html($label) . '</option>';
                    }
                ?>
            </select>
        </label>
    <?php }
}

function imnews_get_category_list_options(){
    $imnews_cat = get_terms( array(
        'taxonomy' => 'category',
    ) );
    
    foreach($imnews_cat as $imnews_category){
        $imnews_category_list[$imnews_category->term_id] = $imnews_category->name;
    }
    return $imnews_category_list;
}