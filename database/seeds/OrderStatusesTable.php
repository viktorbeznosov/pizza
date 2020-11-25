<?php

use Illuminate\Database\Seeder;

class OrderStatusesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            'Name' => 'Новый',
            'Color' => '#1E90FF',
            'created_at' => date('Y-m-d H:i:s', time())
        ]);

        DB::table('order_statuses')->insert([
            'Name' => 'Принят в обработку',
            'Color' => '#F4A460',
            'created_at' => date('Y-m-d H:i:s', time())
        ]);

        DB::table('order_statuses')->insert([
            'Name' => 'Отправлен',
            'Color' => '#FF4500',
            'created_at' => date('Y-m-d H:i:s', time())
        ]);

        DB::table('order_statuses')->insert([
            'Name' => 'Доставлен',
            'Color' => '#14E04E',
            'created_at' => date('Y-m-d H:i:s', time())
        ]);
    }
}
