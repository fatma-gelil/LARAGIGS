<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    public function index(){
        return view('listings.index', [
            'heading'=>'Latest Listing',
            'listings'=>Listing::latest()->filter(request(['tag','search']))->simplepaginate(6)
        ]);
    }
    //show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    //show create form
    public function create(){
        return view('listings.create');
    }
    //store listing  data
    public function store(request $request){
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required',Rule::unique('listings','company')],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tag'=>'required',
            'description'=>'required'
        ]);
        Listing::create($formFields);
        return redirect('/')->with('message','listing created successfully :)');
    }
}
