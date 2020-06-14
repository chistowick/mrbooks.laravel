<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request; // для работы с Request

class Feedback extends Mailable {

    use Queueable, SerializesModels;

    protected $subj;
    protected $textArea;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request) {
        $this->subj = $request->subj;
        $this->textArea = $request->textArea;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('mail_templates.feedback')
                ->with([
                    'subj' => $this->subj ,
                    'textArea' => $this->textArea ,
                ]);
    }

}
