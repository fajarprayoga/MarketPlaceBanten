<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use App\Order;
use PDF;

class ReportController extends AdminController
{
    public function report(Content $content)
    {
        return $content
        ->title('Report')
        ->view('Report.pageReport');
    }

    public function print(Request $request)
    {
        // dd($request->all());
        $orders = Order::whereBetween('created_at', [$request->from, $request->to])->where('status', 'finish')->with(['pembeli', 'banten'])->get();
        // return view('admin.reports.reportSubHumas', compact('tickets', 'request'));
        // dd($orders);
        // return view('Report.print');
        // $pdf = PDF::loadview('Report.print',['pegawai'=>$pegawai]);
           $pdf = PDF::loadview('Report.print', ['orders' => $orders]);
           return $pdf->stream();
    	// return $pdf->download('Report.print');
    }
}
