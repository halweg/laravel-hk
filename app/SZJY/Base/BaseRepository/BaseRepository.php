<?php
namespace App\SZJY\Base\BaseRepository;

use Illuminate\Pagination\LengthAwarePaginator;
use Jenssegers\Mongodb\Eloquent\Model as Model;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;


class BaseRepository implements BaseRepositoryInterface
{
    protected $model;


    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(array $data) : bool
    {
        return $this->model->update($data);
    }

    public function all($columns = ['*'], string $orderBy = 'id', string $sortBy = 'asc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findOneOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function findBy(array $data)
    {
        return $this->model->where($data)->get();
    }

    public function findOneBy(array $data)
    {
        return $this->model->where($data)->first();
    }

    public function findOneByOrFail(array $data)
    {
        return $this->model->where($data)->firstOrFail();
    }

    public function delete() : bool
    {
        return $this->model->delete();
    }

    public function paginateArrayResults(array $data, int $perPage = 20)
    {
        $page = Input::get('page', 1);
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(
            array_values(array_slice($data, $offset, $perPage, true)),
            count($data),
            $perPage,
            $page,
            [
                'path' => app('request')->url(),
                'query' => app('request')->query()
            ]
        );
    }

}
