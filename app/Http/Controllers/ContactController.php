<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Repositories\CompanyRepository;

class ContactController extends Controller
{

  
    public function __construct(
        protected CompanyRepository $company
    )
    {
      
    }


    public function index()
    {
        // $companies = [
        //     1 => ['name' => 'Company One', 'contacts' => 3],
        //     2 => ['name' => 'Company Two', 'contacts' => 5],
        // ];


        $companies = $this->company->pluck();

        $contacts = Contact::latest()->paginate(10);
        return view('contacts.index', compact('contacts','companies'));
    }
    


    public function create(){
        return view('contacts.create');
    }

    public function show(int $id){

        $contact = Contact::findOrFail($id);
    
        return view('contacts.show')->with('contact', $contact);
    }


   







}
