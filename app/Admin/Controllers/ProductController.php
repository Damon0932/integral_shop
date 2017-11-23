<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ProductController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('商品列表');
            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('修改商品');
            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('新建商品');
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Product::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->name('名称')->editable();
            $grid->price('市场价')->editable()->sortable();
            $grid->integral('M豆')->editable()->sortable();
            $grid->logo_url('Logo')->image();
            $grid->spec('规格')->editable();
            $grid->on_sale('上架')->switch([
                1 => ['text' => 'YES'],
                0 => ['text' => 'NO'],
            ])->sortable();
            $grid->order('权重')->editable()->sortable();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Product::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('name', '名称')->rules('required');
            $form->text('spec', '规格')->rules('required');
            $form->image('logo_url', 'Logo')->rules('required');
            $form->decimal('price', '市场价')->rules('required');
            $form->decimal('integral', 'M豆')->rules('required');
            $form->switch('on_sale', '上架');
            $form->number('order', '权重');
            $form->editor('detail', '详情')->rules('required');
            $form->hasMany('banners', function (Form\NestedForm $form) {
                $form->image('banner_url');
            });
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '最后修改');
        });
    }
}
