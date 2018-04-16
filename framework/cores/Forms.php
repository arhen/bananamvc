<?php 
/**
* 
*/
class Forms
{
	/**
	 * [$_currentItem array posted data]
	 * @var null
	 */
	private $_currentItem = null;
	/**
	 * [$_postData Stores the posted data]
	 * @var array
	 */
	private $_postData = array();

	/**
	 * [$_val description]
	 * @var The validator object
	 */
	private $_val = null;

	/**
	 * [$_error description]
	 * @var hold the current from errors
	 */
	private $_error = array();

	function __construct()
	{
		require  APPPATH.'libraries/Form_Validation.php';
		$this->_val = new Form_Validation();
	}

	/**
	 * Val function for validating
	 * @return [object] 
	 */
	public function val($typeOfValidator, $arg = null)
	{
		if ($arg == null )
			$error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);
		else
			$error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg);
		
		if ($error) {
			$this->_error[$this->_currentItem] = $error;
		}
		return $this;
	}

	/**
	 * post - this to run $_POST
	 * @param  [strimg] $field [the HTML Fieldname to post]
	 * @param  [array] $typeOfValidate [Array of ("Type Validating", "Params if needed")]
	 */
	
	public function post($field, $typeOfValidate = array())
	{
		$this->_postData[$field] = $_POST[$field];
		$this->_currentItem = $field;
		if ($typeOfValidate != NULL) {
			foreach ($typeOfValidate as $key => $value) {
				if ($key != NULL) {
					$this->val($key,$value);
				}else{
					$this->val($value);
				}
			}
		}
		return $this;
	}

	/**
	 * Fetch - Return the Posted data
	 * @param  mixed $fieldName [description]
	 * @return [mixed string or array]
	 */
	public function fetch($fieldName = false)
	{
		if ($fieldName) {
			if (isset($this->_postData[$fieldName])) {
				return $this->_postData[$fieldName];	
			}else{
				return false;
			}
			
		}else{
			return $this->_postData;	
		}
		
	}

	public function submit()
	{
		if (empty($this->_error)) 
        {
            return true;
        } 
        else 
        {
            $str = '';
            foreach ($this->_error as $key => $value)
            {
                $str .= $key . ' => ' . $value . "<br>";
            }
            throw new Exception($str);
        }
	}

}
 ?>