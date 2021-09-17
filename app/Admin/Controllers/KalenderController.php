<?php

namespace App\Admin\Controllers;

use App\KalenderUpakara;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class KalenderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'KalenderUpakara';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new KalenderUpakara());

        $grid->column('id', __('Id'));
        $grid->column('nama_upakara', __('Name'));
        $grid->column('tgl_mulai', __('Mulai'));
        $grid->column('tgl_selesai', __('Selesai'));
        $grid->column('notes', __('Notes'));
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
        $show = new Show(KalenderUpakara::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nama_upakara', __('Name'));
        $show->field('tgl_mulai', __('Mulai'));
        $show->field('tgl_selesai', __('Selesai'));
        $show->field('notes', __('Notes'));

        // $show->field('created_at', __('Created at'));
        // $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new KalenderUpakara());

        $form->text('nama_upakara', __('Name'))->rules('required');
        $form->date('tgl_mulai', __('Tgl Mulai'))->default(date('Y-m-d'));
        $form->date('tgl_selesai', __('Tgl Selesai'))->default(date('Y-m-d'));
        $form->text('notes');

        return $form;
    }
}
