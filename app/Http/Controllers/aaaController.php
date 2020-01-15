<?php
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
 
use Kreait\Firebase\Database;
namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;

class aaaController extends Controller
{
     public function index() {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://test-b8288.firebaseio.com/')
        ->create();
 
        $database   =   $firebase->getDatabase();
        $createPost    =   $database
        ->getReference('blog/posts')
        ->push([
            'title' =>  'Laravel 6',
            'body'  =>  'This is really a cool database that is managed in real time.'
 
        ]);
             
        echo '<pre>';
        print_r($createPost->getvalue());
        echo '</pre>';
    }
    public function getData() {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://test-b8288.firebaseio.com/')
        ->create();
 
        $database   =   $firebase->getDatabase();
        $createPost    =   $database->getReference('blog/posts')->getvalue();      
        return response()->json($createPost);
    }
}
