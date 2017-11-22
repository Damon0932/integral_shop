<?php

namespace App\Admin\Controllers;

use App\Models\Project;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ProjectController extends Controller
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
            $content->header('项目列表');
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

            $content->header('修改项目');
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
            $content->header('新建项目');
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
        return Admin::grid(Project::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->project_name_en('英文名称')->editable();
            $grid->project_name_cn('中文名称')->editable();
            $grid->exchange_rate('汇率')->editable()->sortable();
            $grid->status('开通')->switch([
                1 => ['text' => 'YES'],
                0 => ['text' => 'NO'],
            ])->sortable();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('project_name_en', '中文名称');
                $filter->between('project_name_cn', '英文名称');
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Project::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('project_name_en', '英文名称')->rules('required');
            $form->text('project_name_cn', '中文名称')->rules('required');
            $form->decimal('exchange_rate', '汇率')->rules('required');
            $form->switch('status', '开通');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '最后修改');
        });
    }
}
