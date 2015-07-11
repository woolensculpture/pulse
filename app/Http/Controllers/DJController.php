<?php namespace WITR\Http\Controllers;

use WITR\Http\Requests;
use WITR\Http\Requests\DJ\TicketRequest;
use WITR\Http\Controllers\Controller;
use WITR\Services\IcecastReader;
use WITR\TopTwenty\Reader as WeeklyChart;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Contracts\Mail\Mailer;
use WITR\SystemSetting;

use Illuminate\Http\Request;

class DJController extends Controller {

	public function __construct()
	{
		$this->middleware('dj');
	}

	public function index()
	{
		$workHoursForm = SystemSetting::djHoursFormLocation()->value;
		$cdSignoutForm = SystemSetting::cdSignoutFormLocation()->value;
		return view('dj.index', compact('workHoursForm', 'cdSignoutForm'));
	}

	public function listeners(IcecastReader $icecast, $studio = 'studio-x')
	{
		$listeners = $icecast->get($studio);
		return view('dj.listeners', compact('listeners', 'studio'));
	}

	public function fetchFile(Storage $storage, $file)
	{
		if (!$storage->exists($file))
		{
			return abort(404);
		}
		$locationRoot = $storage->getDriver()->getAdapter()->getPathPrefix();
		return response()->download($locationRoot . $file);
	}

	public function ticketForm()
	{
		return view('dj.ticket');
	}

	public function submitTicket(Mailer $mailer, TicketRequest $request)
	{
		$ticketRecipient = app('config')['witr.ticket_recipient'];
		$mailer->send('emails.support_ticket', $request->all(), function($message) use ($ticketRecipient)
		{
			$message->to($ticketRecipient['email'], $ticketRecipient['name'])
					->subject('WITR Support Ticket');
		});

		return redirect()->route('dj.index')
			->with('success', 'Support Ticket Submitted!');
	}

	public function topWeek(WeeklyChart $chart)
	{
		$tracks = $chart->getWeek();
		return view('dj.chart', compact('tracks'));
	}
}
