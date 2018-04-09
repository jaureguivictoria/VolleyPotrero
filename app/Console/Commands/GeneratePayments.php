<?php

namespace VolleyPotrero\Console\Commands;

use Illuminate\Console\Command;
use VolleyPotrero\Models\Payment;
use VolleyPotrero\Models\Member;
use Carbon\Carbon;

class GeneratePayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate all the unpayed invoices for the members';

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
        $from = Carbon::now()->startOfMonth();
        $to = Carbon::now()->endOfMonth();
        
        $members = Member::all();
        
        $peopleWhoAlreadyHaveAPayment = Payment::whereBetween('created_at',[$from,$to])
                            ->pluck('member_id');
        
        $newPayments = $members->whereNotIn('id',$peopleWhoAlreadyHaveAPayment);
        
        if(count($newPayments) == 0){
            $this->info('No new payments needed for current month');
        } else {
            if ($this->confirm('You are about to create '.count($newPayments).' new payments. Do you wish to continue?')) {
                
                $bar = $this->output->createProgressBar(count($newPayments));
                
                foreach ($newPayments as $newPaymentMember) {
                    Payment::create([
                        'member_id' => $newPaymentMember->id,
                        'amount' => config('volley_settings.membership'),
                        'status' => Payment::STATUS_UNPAYED
                    ]);
                    $bar->advance();
                }
                $bar->finish();
                
                $this->line('Payments created successfully');
            }
        }
    }
}
