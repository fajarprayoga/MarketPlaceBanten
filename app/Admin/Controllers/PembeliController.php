<?php

namespace App\Admin\Controllers;

use App\Pembeli;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Hash;

class PembeliController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Pembeli';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Pembeli());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('phone_no', __('Phone no'));
        $grid->column('address', __('Address'));
        // $grid->column('password', __('Password'));
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
        $show = new Show(Pembeli::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('phone_no', __('Phone no'));
        $show->field('address', __('Address'));
        $show->field('password', __('Password'));
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
        $form = new Form(new Pembeli());

        $form->text('name', __('Name'))->rules('required');
        $form->email('email', __('Email'))->rules('required');
        $form->mobile('phone_no', __('Phone no'))->rules('required');
        $form->textarea('address', __('Address'));
        $form->password('password', __('Password'))->rules('required');
        $form->image('origin_image',__('Image'))->rules('nullable');

        $form->saving(function(Form $form){
            $form->password = Hash::make($form->password);
        });


        return $form;
    }
}
