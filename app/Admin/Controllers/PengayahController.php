<?php

namespace App\Admin\Controllers;

use App\Pengayah;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class PengayahController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Pengayah';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Pengayah());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('address', __('Address'));
        // $grid->column('password', __('Password'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Pengayah::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('address', __('Address'));
        // $show->field('password', __('Password'));
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
        $form = new Form(new Pengayah());

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'));
        $form->textarea('address', __('Address'));
        $form->password('password', __('Password'));
        $form->saving(function(Form $form){
            $form->password = Hash::make($form->password);
        });

        $form->saved(function (Form $form) {
            //insert data pengayah ke user
            $existuser = DB::table('admin_users')->where('username',$form->email)->first();
            $pengayah_id = $form->model()->id;
            if(!$existuser){
                $newuser = DB::table('admin_users')->insertGetId([
                    'username' => $form->email,
                    'password' => $form->password,
                    'name'  => $form->name,
                    'pengayah_id' => $pengayah_id
                ]);

               
            }else{
                DB::table('admin_users')->where('username',$form->email)->update([
                    'username' => $form->email,
                    'password' => $form->password,
                    'name'  => $form->name,
                    'pengayah_id' => $pengayah_id
                ]);
            }

            $user_id = $existuser ? $existuser->id : $newuser;

            $roleuser = DB::table('admin_role_users')->where('user_id',$user_id)->where('role_id', 2)->first();

            //insert ke admin user role
            if(!$roleuser){
               DB::table('admin_role_users')->insert([
                    'role_id' => 2,
                    'user_id' => $newuser
                ]); 
            }
            

        });

        return $form;
    }
}
