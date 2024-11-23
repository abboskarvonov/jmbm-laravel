<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\JournalIssue;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function main()
    {
        $journals = JournalIssue::latest()->take(4)->get();
        $latest_journal = JournalIssue::latest()->first();
        $about_journal = About::where('type', '1')->first();
        return view('main')->with([
            'journals' => $journals,
            'latest_journal' => $latest_journal,
            'about_journal' => $about_journal
        ]);
    }

    public function members()
    {
        $members = About::where('type', '2')->first();
        if ($members) {
            return view('members')->with([
                'members' => $members
            ]);
        } else {
            return view('update');
        }
    }

    public function requirements()
    {
        $data = About::where('type', '3')->first();
        if ($data) {
            return view('requirements')->with([
                'data' => $data
            ]);
        } else {
            return view('update');
        }
    }

    public function statue()
    {
        $data = About::where('type', '4')->first();
        if ($data) {
            return view('statue')->with([
                'data' => $data
            ]);
        } else {
            return view('update');
        }
    }
}
