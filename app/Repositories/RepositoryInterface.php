<?php
namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @return mixed
     */
    public function getAllItem();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, $attributes = []);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function getByAttributes($attributes);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function getByAttributesAll($attributes);

    /**
     * @param string $attributes
     * @return mixed
     */
    public function getItemsBySlug($slug);

    /**
     * @param $attributes
     * @return mixed
     */
    public function findByAttributes($attributes);

    /**
     * @param $id
     * @return mixed
     */
    public function getItemCheckUnique($id);
}
