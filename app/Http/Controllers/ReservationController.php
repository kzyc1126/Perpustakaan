<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Carbon;
use App\Models\reservation_detail;
use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Reserve.list',[
            'reservations'=> Reservation::with(['user'])->latest()->search()->paginate(20)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_pinjam = IdGenerator::generate(['table'=>'reservations','field'=>'id_pinjam','length'=>13,'prefix'=>'RSV'.date('dmy')]);
        $date = Carbon::now()->format('d M Y');
        $return_date = Carbon::now()->addDays(7)->format('d M Y');
        $users = User::all();
        $books = Book::all()->where('is_borrowed',false);
        return view('Reserve.index',[
            'id_pinjam'=>$id_pinjam,
            'users'=>$users,
            'date'=>$date,
            'return_date'=>$return_date,
            'books'=>$books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request)
    {
        $reservation = new Reservation();
        $reservation->id_pinjam = $request->id_pinjam;
        $reservation->user_id = $request->borrower_id;
        $reservation->total_books = count($request->book_id);
        $reservation->borrow_date = Carbon::now();
        $reservation->must_return_date = Carbon::now()->addDay(7);
        $reservation->save();
        foreach($request->book_id as $book){
            $details = new reservation_detail();
            $details->reservation_id = $reservation->id;
            $details->book_id = $book;
            $details->save();
            
            $book= Book::findorfail($book);
            $update = [$book->is_borrowed = true]; 
            $book->update($update);
        };
        return redirect('/pinjambuku')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationRequest  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
    
        $reservation= Reservation::findorfail($id);
        $reservation->return_date = Carbon::now();
        $reservation->save(); 

        $details = reservation_detail::all()->where('reservation_id',$id);
        foreach($details as $detail){
            $book = Book::findorfail($detail->book_id);
            $book->is_borrowed = false;
            $book->save();
        }
        return redirect('/listpinjambuku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
