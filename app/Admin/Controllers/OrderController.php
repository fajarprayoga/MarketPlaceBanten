<?php

namespace App\Admin\Controllers;

use App\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Banten;
use App\Pembeli;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('tgl_order', __('Tgl order'));
        $grid->column('tgl_upakara', __('Tgl upakara'));
        // $grid->column('status', __('Status Order'));
        $grid->column('status', __('Status Order'))->label([
            1 => 'default',
            'draft' => 'warning',
            'finish' => 'success',
            'process'  => 'info',
        ]);
        // $grid->column('banten_id', __('Banten id')->banten()->name);
        // $grid->column('banten_id', __('Banten'))->display(function () {
        //     return $this->banten->name;
        // });
        $grid->column('banten.name', __('Banten'));
        $grid->column('pembeli.name', __('Pembeli'));

        // $grid->column('pembeli_id', __('Pembeli id'));
        // $grid->column('pembeli_id', __('Pembeli'))->display(function () {
        //     return $this->pembeli->name;
        // });


        // $grid->column('pengayah', __('Pengayah'));
        $grid->column('notes', __('Notes'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

        $grid->filter(function($filter){

            // Remove the default id filter
            // $filter->disableIdFilter();

            // Add a column filter
            $filter->like('banten.name', 'Banten');
            $filter->like('pembeli.name', 'Pembeli');
            // $filter->like('pembeli.status', 'Status');
           $filter->equal('status')->select(['draft' => 'Draft', 'process' => 'Process', 'finish' => 'Finish']);

            
        });


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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('tgl_order', __('Tgl order'));
        $show->field('tgl_upakara', __('Tgl upakara'));
        $show->field('banten.name', __('Banten'));
        $show->field('pembeli.name', __('Pembeli'));
        $show->field('pengayah', __('Pengayah'));
        $show->field('notes', __('Notes'));
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
        $form = new Form(new Order());

        $form->date('tgl_order', __('Tgl order'))->default(date('Y-m-d'));
        $form->date('tgl_upakara', __('Tgl upakara'))->default(date('Y-m-d'));
    
        $listbanten = Banten::pluck('name','id');
        $form->select('banten_id', __('Banten'))->options($listbanten);

        $listpembeli = Pembeli::pluck('name','id');
        $form->select('pembeli_id', __('Pembeli'))->options($listpembeli);

        $form->currency('harga',__('Harga'))->symbol('Rp')->default(0);

        $form->text('pengayah', __('Pengayah'))->rules('nullable');
        $form->textarea('notes', __('Notes'));
        $form->select('status',__('Status'))->options(['draft' => 'Draft', 'process' => 'Process', 'finish' => 'Finish']);

        return $form;
    }
}
