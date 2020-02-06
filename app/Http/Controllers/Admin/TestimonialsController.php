<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialsRequest;
use App\Models\Testimonial;
use App\Repository\Criterias\SortByDateCriteria;
use App\Repository\TestimonialsRepository;
use Illuminate\Http\Request;

class TestimonialsController extends AdminController
{
    public function __construct(TestimonialsRepository $testimonialsRepository)
    {
        parent::__construct();
        $this->itemRepository = $testimonialsRepository;
        $this->basePath = 'admin.testimonials';
    }

    public function index()
    {
        try {
            $this->itemRepository->pushCriteria(new SortByDateCriteria());
            $this->setCardTitle('Отзывы');
            $vars['documents'] = $this->itemRepository->getTestimonialsDocument();
            $vars['texts'] = $this->itemRepository->getTestimonialsText();
        } catch (\Exception $exception) {
            return $this->redirectBack('error', $exception->getMessage());
        }
        return view('admin.testimonials.index', $vars);
    }

    public function create(Request $request)
    {
        try {
            $this->setCardTitle('Создание отзыва');
            $request->validate(['type' => 'required']);
            $vars['type'] = $request->get('type');
            $vars['status'] = $this->itemRepository->getStatus();
        } catch (\Exception $exception) {
            return $this->redirectBack('error', $exception->getMessage());
        }
        return view('admin.testimonials.create', $vars);
    }

    public function store(TestimonialsRequest $request)
    {
        try {
            $testimonial = null;
            if ($request->get('type') === Testimonial::TYPE_DOCUMENT) {
                $testimonial = $this->itemRepository->create($request->all());
                $this->itemRepository->saveImage($testimonial->getAttribute('id'), $request);
            } else {
                $testimonial = $this->itemRepository->create($request->all());
            }
        } catch (\Exception $exception) {
            return $this->redirectBack('error', $exception->getMessage());
        }
        return $this->redirect('success', __('admin.row.create'), ['testimonial'=>$testimonial,'type'=>$testimonial->getAttribute('type')]);
    }

    public function edit(Request $request, int $id)
    {
        try {
            $this->setCardTitle('Редактирование отзыва');
            $vars['edit'] = $this->itemRepository->find($id)->load('image');
            $vars['type'] = $request->get('type');
            $vars['status'] = $this->itemRepository->getStatus();
            $vars['check'] = $vars['edit']->getAttribute('type');
        } catch (\Exception $exception) {
            return $this->redirectBack('error', $exception->getMessage());
        }
        return view('admin.testimonials.edit', $vars);
    }

    public function update(TestimonialsRequest $request, int $id)
    {
        try {
            if ($request->get('type') === Testimonial::TYPE_DOCUMENT) {
                

                $this->itemRepository->update($request->all(), $id);
                $this->itemRepository->saveImage($id, $request);
            } else {
                $this->itemRepository->update($request->all(), $id);
            }
        } catch (\Exception $exception) {
            return $this->redirectBack('error', $exception->getMessage());
        }
        return $this->redirect('success', __('admin.row.edit'), ['testimonial'=>$id,'type'=>$request->get('type')]);
    }

    public function destroy(int $id)
    {
        try {
            $this->itemRepository->deleteImage($id);
            $this->itemRepository->delete($id);
        } catch (\Exception $exception) {
            return $this->redirectBack('error', $exception->getMessage());
        }
        return $this->redirectBack('success', __('admin.row.delete'));
    }

}
