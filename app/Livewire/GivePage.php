<?php

namespace App\Livewire;
// namespace App\Traits;

use App\Models\Link;
use App\Models\Transaction;
use App\Models\User;
use App\Traits\PayStackRequest;
use Livewire\Component;
use Livewire\Attributes\Validate;
// use App\Traits;
// use Unicodeveloper\Paystack\Paystack;

class GivePage extends Component
{

    use PayStackRequest;

    protected $focusId;
    protected $authorizer;
    protected $paymentVerified;

    public $focus;
    public $creator;

    #[Validate('required', message: "The name field is required")]
    public $payerName;

    #[Validate('required', message: "The amount field is required")]
    public $payerAmount;

     #[Validate('required', message: "The contact field is required")]
    public $payerContact;

    #[Validate("required|email", message: "The email field is required")]
    public $payerEmail;
    public $min;


    public function mount() 
    {
        $this->focusId = request()->segment(2);
        $this->focus = Link::where('link', $this->focusId)->first()->focus;
        $this->creator = User::findOrFail($this->focus->user_id);
        $this->min = $this->focus->cost;
    }

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }

     public function redirectToGateway()
    {
        $this->validate();

        $this->authorizer = $this->PayPOST('transaction/initialize',  (string) $this->payerAmount * 100,  $this->payerEmail);
        // dd($this->authorizer);

        // Create a transaction (unverified transaction)
        $newTransaction = Transaction::create([
                //     'id' => $this->paymentVerified->data->id,
                //     'focus_id' => $this->focusId, 
                //     'payer_name' => ,
                //     'payer_contact',
                //     'email',
                //     'amount_paid',
                //     'payment_type',
                //     'reference',
                //     'currency',
                //     'ip_address',
                // ]);
        ]);
        return redirect()->away($this->authorizer->data->authorization_url);
        // $this->verifyPayment();
    }

    public function verifyPayment()
    {
        $this->paymentVerified = $this->PayGET("transaction/verify/{$this->authorizer->data->reference}");
        // dd($this->paymentVerified);
        if ($this->paymentVerified->data->status && $this->payerAmount * 100 == $this->paymentVerified->data->amount) {
            // 
        } else {
            // Trhow an error or exception
        }

    }

    public function render()
    {
        return view('livewire.give-page')->title("RepCollect | " .$this->focus->title)->layout('components.layouts.pay-layout');
    }
} 
