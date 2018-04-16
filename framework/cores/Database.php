<?php 
/**
* Class for Database
*/
class Database extends PDO
{
	
	function __construct($DB)
	{
		parent::__construct(''.$DB['type'].':host='.$DB['host'].';dbname='.$DB['name'].'',''.$DB['user'].'',''.$DB['pass'].'');

		// Set Atrributes mode.. Take a Look of it in the internet
		parent::setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	/**
	 * Insert Function Handler
	 * @param  [string] $sql   [sql query]
	 * @param  [array] $array [parameters to bind].
	 * @param  [constans] $fetchMode [PDO fetch Mode]
	 * @return [string]        [fetch data]
	 */
	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
	{
		$query = $this->prepare($sql);

		foreach ($array as $key => $value) 
		{
			$query->bindValue("$key", $value);
		}

		try 
		{
			$query->execute();
			return  $query->fetchAll($fetchMode);
			
		} catch (PDOException $e) 
		{
			die($e->getMessage());
		}

	}

	/**
	 * Insert Funcion Handler
	 * @param  [string] $table [table name's of Insert to]
	 * @param  [string] $data  [an associative array]s
	 */
	public function insert($table, $data)
	{
		ksort($data);
		
		$fieldNames = implode('`,`',array_keys($data));
		$fieldValues = ':' . implode(', :',array_keys($data));

		$query = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES($fieldValues)");

		foreach ($data as $key => $value) 
		{
			$query->bindValue(":$key", $value);
		}

		try 
		{
			return $query->execute();
		} catch (PDOException $e) 
		{
			die($e->getMessage());
		}
	}

	/**
	 * Update Funcion Handler
	 * @param  [string] $table [table name's of Update from]
	 * @param  [string] $data  [an associative array]
	 * @param  [string] $where [the where query part]
	 */
	
	public function update($table, $data, $where)
	{
		ksort($data);
		$fieldDetails = NULL;

		foreach ($data as $key => $value) 
		{
			$fieldDetails .= "`$key` = :$key,";
		}

		$fieldDetails = rtrim($fieldDetails,',');

		$query = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

		foreach ($data as $key => $value) 
		{
			$query->bindValue(":$key", $value);
		}

		try 
		{
			return $query->execute();
		} catch (PDOException $e) 
		{
			die($e->getMessage());
		}
	}

	/**
	 * delete function handler
	 * @param  [string] $table [table name's of delete from]
	 * @param  [string] $id    [id of the data will be delete]
	 * @param  [int] $limit    [limitation of deleteing data]
	 */
	public function delete($table, $where, $limit = 1)
	{
		$query = $this->prepare("DELETE FROM $table WHERE $where LIMIT $limit");
		try 
		{
			return $query->execute();
		} catch (PDOException $e) 
		{
			die($e->getMessage());
		}

	}

}

 ?>