<?php namespace WITR\Http\Controllers;

use WITR\Http\Requests;
use WITR\Http\Requests\DJ\TicketRequest;
use WITR\Http\Controllers\Controller;
use WITR\Services\IcecastReader;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Contracts\Mail\Mailer;

use Illuminate\Http\Request;

class DJController extends Controller {

	public function __construct()
	{
		$this->middleware('dj');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('dj.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function listeners(IcecastReader $icecast, $studio = 'studio-x')
	{
		$listeners = $icecast->get($studio);
		return view('dj.listeners', compact('listeners'));
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

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
