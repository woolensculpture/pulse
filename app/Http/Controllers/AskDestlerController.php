<?php namespace WITR\Http\Controllers;

use WITR\Http\Requests\AskDestlerRequest;
use WITR\Http\Controllers\Controller;
use Illuminate\Contracts\Mail\Mailer;
use WITR\SystemSetting;

use Illuminate\Http\Request;

class AskDestlerController extends Controller {

	public function index()
	{
		$destlerText = SystemSetting::askDestlerText();
		return view('askdestler.index', ['destlerText' => $destlerText]);
	}

	public function submit(Mailer $mailer, AskDestlerRequest $request)
	{
		$askdestlerRecipient = app('config')['witr.askdestler_recipient'];
		$mailer->send('emails.askdestler', $request->all(), function($message) use ($askdestlerRecipient)
		{
			$message->to($askdestlerRecipient['email'], $askdestlerRecipient['name'])
					->subject('WITR Ask Destler Submission');
		});

		return redirect()->route('askdestler')
			->with('success', 'Question Submitted!');
	}
}
