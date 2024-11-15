<?php

namespace App\Livewire\Admin\Programme\Events;

use Livewire\Component;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;

class ChartComponent extends Component
{


    public function paymentTypeReportPieChart()
    {
        // Create a simple Pie chart with some data
        $pieChartModel = (new PieChartModel());
        $pieChartModel->setTitle('Payment Gateway');
        $pieChartModel->addSlice('Paynow', 40, '#f6ad55');
        $pieChartModel->addSlice('Credit Card', 25, '#fc8181');
        return $pieChartModel;
    }

    public function registrantLineChartReport()
    {
        $lineChart = (new LineChartModel());
        $lineChart->setAnimated(true);
        $lineChart->setTitle('Monthly Registration');
        $lineChart->setColors(['#90cdf4']);
        $lineChart->setXAxisVisible(true);
        $lineChart->setYAxisVisible(true);
        $lineChart->addPoint('Jan', 15);
        $lineChart->addPoint('Feb', 17);
        $lineChart->addPoint('March', 19);
        $lineChart->addPoint('April', 20);
        $lineChart->addPoint('May', 22);
        $lineChart->addPoint('June', 23);
        $lineChart->addPoint('July', 25);
        $lineChart->addPoint('Aug', 28);
        $lineChart->addPoint('June', 30);
        $lineChart->addPoint('Sept', 34);
        $lineChart->addPoint('Oct', 59);
        $lineChart->addPoint('Nov', 60);
        $lineChart->addPoint('Nov', 70);
        $lineChart->addPoint('Dec', 75);
        return $lineChart;
    }


    public function render()
    {
        return view('livewire.admin.programme.events.chart-component', [
            'registrantLineChart' => $this->registrantLineChartReport(),
            'paymentTypeReportPieChart' => $this->paymentTypeReportPieChart()
        ]);
    }
}
