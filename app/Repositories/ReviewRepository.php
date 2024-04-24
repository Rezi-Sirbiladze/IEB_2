<?php

namespace App\Repositories;

use App\Interfaces\ReviewInterface;
use App\Models\Review;
use Illuminate\Support\Collection;

class ReviewRepository implements ReviewInterface
{
    protected Review $model;

    public function __construct(Review $model)
    {
        $this->model = $model;
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function findOne(int $id): Review
    {
        return $this->model->findOrFail($id);
    }

    public function findOneByBookingId(int $id): ?Review
    {
        $review = $this->model->where('booking_id', $id)->first();
        return $review ?? null;
    }

    public function updateOrCreate(array $data): Review
    {
        return  $this->model->updateOrCreate(['booking_id' => $data['booking_id']], $data);
    }

    public function create(array $request): Review
    {
        return $this->model->create($request);
    }

    public function update(array $data, int $id): Review
    {
        $register = $this->model->findOrFail($id);
        $register->update($data);
        return $register;
    }

    public function save(Review $review): bool
    {
        return $review->save();
    }

    public function delete(int $id): void
    {
        $register = $this->model->findOrFail($id);
        $register->delete($id);
    }
}
