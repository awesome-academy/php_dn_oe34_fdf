<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Model\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $repository;

    public function __construct()
    {
        $this->repository = app(CategoryRepository::class);
    }

    public function listCategories(Request $request)
    {
        $limits = $request->get('limits', config('custom.paginate.limits'));
        $search = $request->get('search', '');
        $searchKey = $request->get('search_key', '');

        $query = $this->repository->exceptParent(Category::query());

        $categories = $this->repository->listAll($query, $limits, $search, $searchKey);

        return view('admin.categories.list', compact('categories'));
    }

    public function create()
    {
        $categories = $this->repository->exceptChild(Category::query())->get();

        return view('admin.categories.create', compact('categories'));
    }

    public function store(CreateCategoryRequest $request)
    {
        $params = $request->except('_token');

        $status = $this->repository->store(Category::query(), $params);

        if (!$status) {
            return redirect(route('category.list'))->with('failed', trans('messages.create_failed'));
        }

        return redirect(route('category.list'))->with('success', trans('messages.create_success'));
    }

    public function edit($id)
    {
        $categories = Category::all();

        $category = $this->repository->findObject($categories, 'id', $id);

        if (!empty($category)) {
            return view('admin.categories.edit', compact('category', 'categories'));
        }

        return abort(404);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $params = $request->except('_token');

        $category = $this->repository->findObject(Category::all(), 'id', $id);
        $status = $this->repository->update($category, $params);

        if (!$status) {
            return redirect(route('category.list'))->with('success', trans('messages.update_failed'));
        }

        return redirect(route('category.list'))->with('success', trans('messages.update_success'));
    }

    public function destroy($id)
    {
        $category = $this->repository->findObject(Category::all(), 'id', $id);
        $status = $this->repository->destroy($category);

        if (!$status) {
            return response()->json(trans('messages.delete_failed'));
        }

        return response()->json(trans('messages.delete_success'));
    }
}
