<?php

namespace App\Admin\Controllers;

use App\Benner;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BennerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Benner';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Benner());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->column('image', __('Image'))->display(function($image){
            $gambar = asset('uploads/'.$image);
            return "<img src='{$gambar}' width='100' height='100'>";
        });
        // $grid->column('mobile_image', __('Mobile image'));
        $grid->column('sequence', __('Sequence'));
        $grid->column('active', __('Active'))->display(function($active){
            $status = boolval($active) ? 'Live' : 'Draft';
            return $status;
        });
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Benner::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('image', __('Image'));
        $show->field('mobile_image', __('Mobile image'));
        $show->field('sequence', __('Sequence'));
        $show->field('active', __('Active'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Benner());

        $form->text('title', __('Title'));
        $form->textarea('description', __('Description'));
        $form->image('image', __('Image'));
        $form->image('mobile_image', __('Mobile image'));
        $form->number('sequence', __('Sequence'));
        $form->select('active',__('Active'))->options(['0' => 'Draft', '1' => 'Live']);

        return $form;
    }
}
