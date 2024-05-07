<?php

namespace App\Admin\Controllers;

use App\Models\Reservation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ReservationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Reservation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Reservation());

        $grid->column('id', __('Id'));
        $grid->column('reservation_date', __('Reservation date'));
        $grid->column('people', __('People'));
        $grid->column('user_id', __('User id'));
        $grid->column('store_id', __('Store id'));
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
        $show = new Show(Reservation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('reservation_date', __('Reservation date'));
        $show->field('people', __('People'));
        $show->field('user_id', __('User id'));
        $show->field('store_id', __('Store id'));
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
        $form = new Form(new Reservation());

        $form->datetime('reservation_date', __('Reservation date'))->default(date('Y-m-d H:i:s'));
        $form->number('people', __('People'));
        $form->number('user_id', __('User id'));
        $form->number('store_id', __('Store id'));

        return $form;
    }
}
