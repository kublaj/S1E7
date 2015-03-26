<?php

namespace WebtudorBlog\Model;
use PDO;

/**
 * Abstract model. This contains the database connection functions
 */
abstract class AbstractModel {
	/**
	 * @var PDO
	 */
	private static $connection;

	/**
	 * @return PDO
	 */
	protected function getConnection() {
		if (!self::$connection) {
			//Create new connection with static settings
			$connection = new PDO('sqlite:' . PROJECT_ROOT . '/db/db.sqlite');
			
			//Store connection in static variable
			self::$connection = $connection;
		}

		//Return stored connection
		return self::$connection;
	}

	/**
	 * Execute SQL query with parameters. The $sql parameters should contain placeholders in the format of
	 * :placeholder, where the placeholder name should be a key passed in $params.
	 *
	 * @param string $sql
	 * @param array  $params
	 *
	 * @return array
	 *
	 * @throws ModelException if an SQL error is encountered
	 */
	protected function query($sql, $params) {
		//Fetch connection
		$connection = $this->getConnection();

		//Prepare and execute SQL statement with parameters to avoid SQL injections
		$preparedStatement = $connection->prepare($sql);
		$preparedStatement->execute($params);

		//In case of an error, throw a ModelException
		if ((int)$connection->errorCode()) {
			$errorInfo = $connection->errorInfo();
			throw new ModelException($errorInfo[2], $connection->errorCode());
		}

		//Return result rows
		return $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
	}
}

