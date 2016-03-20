<?php 

namespace app\interfaces;

interface Imodel{


	public function create($attributes);
	public function read();
	public function update($id, $attributes);
	public function delete($field, $value);


	public function findBy($field, $value);
}