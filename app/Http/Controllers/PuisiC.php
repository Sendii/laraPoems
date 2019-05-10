<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow as F;
use App\Puisi as P;
use App\Like as L;
use App\Comment as C;
use Auth;

class PuisiC extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

	public function savepost(Request $r) {
		$new = new P;
		$new->user_id = Auth::user()->id;
		$new->isi = $r->input('puisi');

		$new->save();
		return redirect()->route('puisi_index');
	}

	public function index() {
		$followers = F::where('user_id', Auth::user()->id)->get();
		foreach ($followers as $key => $value) {
			$data['puisis'][] = P::where('user_id', $value->target_id)
								->orderBy('id', 'ASC')
								->first();
		}
		if (isset($data['puisis'])) {
			return view('puisi.index', $data);
		}else {
			echo "ada salaahh";
		}
		$data['likes'] = L::with('Puisi')->get();
	}

	public function likepuisi($id) {
		$new = new L;
		$data = P::find($id);

		$new->puisi_id = $id;
		$new->user_id = Auth::user()->id;
		$new->save();
		return back();
	}

	public function resComment($id)
	{
		$data['comment'] = C::where('puisi_id', $id)->with('User')->get();
		//dd($data['comment']);
		return response($data['comment']);
	}

	public function unlikepuisi($id) {
		$data = L::where('puisi_id', $id)->value('id');
		$unlike = L::find($data)->delete();

		return back();
	}

	public function commentpostpuisi(Request $r) {
		$new = new C;
		$new->puisi_id = $r->input('id');
		$new->user_id = Auth::user()->id;
		$new->comment = $r->input('comment');
		$new->save();

		return redirect()->route('puisi_index');
	}

	public function editpost(Request $r) {
		$edit = P::find($r->input('id'));
		$edit->isi = $r->input('puisi');
		$edit->save();

		return back();
	}

	public function delete($id) {
		$del = P::find($id)->delete();

		return back();
	}
}