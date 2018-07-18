<?php  
/* 
 * CSS menu helper.   
 * Author: John Reeves. 
 */ 
class MenuFixedHelper extends Helper{ 

    var $helpers = array('Html'); 
     
    /* 
     * display a menu list. 
     * @arg $data: a nested associative array.  The keys are the text that 
     *     is displayed for that menu item.  If the value is an array, it is 
     *    treated as a sub menu, with the same format.  Otherwise it is  
     *    interpreted as a URL to be used for a link. 
     * @arg $type: the type of array.  Can be right, left, or down. 
     */

    function menu($fields = null, $blacklist = null){
     $model = $this->model();
     if (is_array($fields)) {
	if (array_key_exists('ul', $fields)) {
	 $legend = $fields['ul'];
         $out .= "<ul>\n";  
	 //unset($fields['ul']);
	}

     }
     }
     

    }

    public function inputs($fields = null, $blacklist = null) {
		$fieldset = $legend = true;
		$model = $this->model();
		if (is_array($fields)) {
			if (array_key_exists('legend', $fields)) {
				$legend = $fields['legend'];
				unset($fields['legend']);
			}

			if (isset($fields['fieldset'])) {
				$fieldset = $fields['fieldset'];
				unset($fields['fieldset']);
			}
		} elseif ($fields !== null) {
			$fieldset = $legend = $fields;
			if (!is_bool($fieldset)) {
				$fieldset = true;
			}
			$fields = array();
		}

		if (empty($fields)) {
			$fields = array_keys($this->_introspectModel($model, 'fields'));
		}

		if ($legend === true) {
			$actionName = __d('cake', 'New %s');
			$isEdit = (
				strpos($this->request->params['action'], 'update') !== false ||
				strpos($this->request->params['action'], 'edit') !== false
			);
			if ($isEdit) {
				$actionName = __d('cake', 'Edit %s');
			}
			$modelName = Inflector::humanize(Inflector::underscore($model));
			$legend = sprintf($actionName, __($modelName));
		}

		$out = null;
		foreach ($fields as $name => $options) {
			if (is_numeric($name) && !is_array($options)) {
				$name = $options;
				$options = array();
			}
			$entity = explode('.', $name);
			$blacklisted = (
				is_array($blacklist) &&
				(in_array($name, $blacklist) || in_array(end($entity), $blacklist))
			);
			if ($blacklisted) {
				continue;
			}
			$out .= $this->input($name, $options);
		}

		if (is_string($fieldset)) {
			$fieldsetClass = sprintf(' class="%s"', $fieldset);
		} else {
			$fieldsetClass = '';
		}

		if ($fieldset && $legend) {
			return $this->Html->useTag('fieldset', $fieldsetClass, $this->Html->useTag('legend', $legend) . $out);
		} elseif ($fieldset) {
			return $this->Html->useTag('fieldset', $fieldsetClass, $out);
		} else {
			return $out;
		}
	} 


    function menu($data=array(), $type='right'){ 
        global $cm_css_inc; 
        $out =''; 
        if($cm_css_inc != true){ 
            $cm_css_inc = true; 
            $out .= $this->Html->css('css_menu'); 
        } 
        return $this->output($out . $this->_cm_render($data, $type)); 
    } 

    /* render a menu.  
     * This is a helper for recursion.  The arguments are the  
     * same as for $this->menu(). 
     */ 
    function _cm_render($data=array(), $type='right'){ 
        $out=''; 
        if($data == array()) return; 
        if(is_array($data)){ 
            //$out .= "<ul class=\"css_menu cm_$type\">\n"; 
            $out .= "<ul>\n";  
            foreach($data as $key => $item){ 
                if(is_array($item)){ 
                    //$out .= '<li class="parent">'. $key. "\n";
                    $out .= '<li>'. $key. "\n";  
                    $out .= $this->_cm_render($item, $type); 
                    $out .= "</li>\n"; 
                }else{ 
                    $out .= '<li><a href="'. $item. '">'. $key. '</a></li>'. "\n"; 
                } 
            } 
            $out .=  "</ul>\n"; 
        } 
        return $out; 
    } 
} 
?>
