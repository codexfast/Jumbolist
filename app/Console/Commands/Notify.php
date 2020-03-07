<?php

namespace App\Console\Commands;

use App\Customers;
use App\Notify as AppNotify;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyCustomer;


class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $all_pendent = AppNotify::where('pendent', true)->get();

        foreach($all_pendent as $pendent)
        {
            $customer = Customers::where('id', $pendent->customer_id)->get()->first();

            Mail::to($customer->email)->send(new NotifyCustomer($customer->city, $customer->state));

            $pendent->pendent = false;
            $pendent->save();
        }
    }
}
