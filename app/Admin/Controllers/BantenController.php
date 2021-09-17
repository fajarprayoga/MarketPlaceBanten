<?php

namespace App\Admin\Controllers;

use App\Banten;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BantenController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Banten';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Banten());

        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('sequence', __('Sequence'));
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
        $show = new Show(Banten::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('sequence', __('Sequence'));
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
        $form = new Form(new Banten());

        $form->text('name', __('Name'))->rules('required|min:5');
        $form->textarea('description', __('Description'))->rules('nullable');
        $form->currency('harga',__('Harga'))->symbol('Rp')->default(0);
        $form->number('sequence', __('Sequence'))->rules('nullable');
        $form->image('origin_image',__('origin_image'))->rules('nullable');
        return $form;
    }
}
