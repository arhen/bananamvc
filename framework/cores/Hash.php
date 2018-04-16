<?php 
	class Hash
	{
		/**
		 * Static function for dinamic hashing password
		 * @param  [string] $algo [the algorithm method (md5, sha1, whirpool, etc)]
		 * @param  [string] $data [the data to encode]
		 * @param  [string] $salt [the key]
		 * @return [string]       [The hashed/salted data]
		 */
		public static function create($algo, $data, $salt)
		{
			$context = hash_init($algo,HASH_HMAC,$salt);
			hash_update($context, $data);

			return hash_final($context);
		}
	}
 ?>