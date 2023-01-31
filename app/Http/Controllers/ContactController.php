<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

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
    
        $contacts = $this->getContacts();
        return view('contacts.index', compact('contacts','companies'));
    }
    
    private function getContacts() {

        return [
            1 => ['name' => 'Name 1', 'phone' => '1234567890'],
            2 => ['name' => 'Name 2', 'phone' => '2345678901'],
            3 => ['name' => 'Name 3', 'phone' => '3456789012'],
        ];
    }

    public function create(){
        return view('contacts.create');
    }

    public function show(int $id){
        $contacts = $this->getContacts();
        $contact = $contacts[$id];
        abort_if(!isset($contacts[$id]), 404);
        return view('contacts.show')->with('contact', $contact);
    }


   







}
