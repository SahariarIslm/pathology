<?php

namespace App\Http\Controllers;

use App\Admin\Shop;
use App\Admin\Ticket;
use App\Admin\TicketStatus;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function index()
    {
        if (Gate::allows('superAdmin')) {
            $data = Ticket::orderBy('id', 'DESC')->get();
        } 
        elseif (Gate::allows('employee')) {
            $data = Ticket::orderBy('id', 'DESC')->get();
        }
        elseif (Gate::allows('admin')) { 
            $data = Ticket::orderBy('id', 'DESC')
                        ->where('mobile', Auth::user()->mobile)
                        ->get();
        }
        return view('Admin.Ticket.ticket', compact('data'));
    }

    public function add()
    {
        $shop = Shop::where('user_id', Auth::user()->id)->first();
        $business_name = $shop->business_name;
        $data = Ticket::orderBy('id', 'DESC')->get();
        return view('Admin.Ticket.ticket_add', compact('data','business_name'));
    }

    public function store(Request $request)
    {
        $d = new DateTime("now");
        $date = $d->format('dmy');
        if ($last = Ticket::all()->last()){  
            $sl = $last->id; 
        } else { 
            $sl = 0; 
        }
        $id = $sl + 1;
        $ticket_no = $date.$id;

        if ($request->hasFile('attachment')) 
        {
            $image = $request->file('attachment');
            $imagename = uniqid().$image->getClientOriginalName();
            $uploadPath = 'public/Attachment/';
            $image->move($uploadPath,$imagename);
            $imageUrl = $uploadPath.$imagename; 
        }
        else{
            $imageUrl = null;
        }

        $data               = new Ticket();
        $data->ticket_no    = $ticket_no;
        $data->b_name       = $request->b_name;
        $data->name         = $request->name;
        $data->mobile       = $request->mobile;
        $data->department   = $request->department;
        $data->priority     = $request->priority;
        $data->subject      = $request->subject;
        $data->message      = $request->message;
        $data->status       = 'Pending';
        $data->attachment   = $imageUrl;
        $data->save();

        $new            = new TicketStatus();
        $new->user_id   = Auth::user()->id;
        $new->ticket_no = $ticket_no;
        $new->status    = 'Pending';
        $new->save();

        // for($i = $request->attachment; $i=!null; $i++)
        // foreach($request->attachment as $i)
        // {
            // $data = array(
            //     'ticket_no'     => $ticket_no,
            //     'attachment'    => $imageUrl,
            // );
            // $insert = DB::table('ticket_attachments')->insert($data);
        // }
        return redirect()->back()->with('message','Ticket Submitted Successfully');
    }

    public function edit(Request $request)
    {
        $data = Ticket::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        Ticket::where('id',$request->id)
                ->update([
                    'b_name'        => $request->b_name,
                    'name'          => $request->name,
                    'mobile'        => $request->mobile,
                    'subject'       => $request->subject,
                    'department'    => $request->department,
                    'priority'      => $request->priority,
                    'message'       => $request->message,
                ]);
        return redirect()->back()->with('message','Ticket Updated Successfully');
    }

    public function status(Request $request)
    {
        $data           = Ticket::where('ticket_no', $request->id)->first();
        $data->status   = $request->status;
        $data->save();
        $new            = new TicketStatus();
        $new->user_id   = Auth::user()->id;
        $new->ticket_no = $request->id;
        $new->status    = $request->status;
        $new->save();
        return redirect()->back()->with('message','Ticket Status Changed Successfully');
    }

    public function destroy(Request $request)
    {
        $data = Ticket::find($request->id);
        $data->delete();
        return redirect()->back()->with('message','Ticket Deleted Successfully');
    }

    public function search(Request $request)
    {
        if (Gate::allows('superAdmin')) {
            $ticket = Ticket::orderBy('id', 'DESC')->get();
            $data   = Ticket::where('id', $request->id)->get();
            $info   = TicketStatus::where('id', $request->id)->get();
        } 
        // elseif (Gate::allows('employee')) {
        //     $data = Ticket::orderBy('id', 'DESC')->get();
        // }
        // elseif (Gate::allows('admin')) { 
        //     $data = Ticket::orderBy('id', 'DESC')
        //                 ->where('mobile', Auth::user()->mobile)
        //                 ->get();
        // }
        return view('Admin.Ticket.ticket_search', compact('ticket','data','info'));
    }
    // $attachment = 'http://localhost/DokanPos/'.$data->attachment;

    public function details(Request $request)
    {
        $data = Ticket::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function info(Request $request)
    {
        $ticket = Ticket::orderBy('id', 'DESC')->get();
        $data = Ticket::where('ticket_no', $request->ticket_no)->get();
        $info = TicketStatus::where('ticket_no', $request->ticket_no)
                            ->join('users','ticket_statuses.user_id','users.id')
                            ->select('ticket_statuses.*','users.name')
                            ->get();
        // return redirect()->back();
        return view('Admin.Ticket.ticket_search', compact('ticket','data','info'));
    }

    public function report(Request $request)
    {
        $request->session()->flush();
        $d = new DateTime("now");
        $today = $d->format('Y-m-d');
        $fromdate = $request->fromdate;
        if ($request->status) {  
            $status = $request->status; 
        } else { 
            $status = 'All';
        }
        if ($request->todate) {  
            $todate = $request->todate; 
        } else { 
            $todate = $today; 
        }
        if ($status == 'All') {  
            $data = Ticket::orderBy('id', 'DESC')
                        ->whereBetween('created_at', [$fromdate, $todate])
                        ->get();
        } else { 
            $data = Ticket::orderBy('id', 'DESC')
                        ->whereBetween('created_at', [$fromdate, $todate])
                        ->where('status', $status)
                        ->get();
        }
        Session::put('fromdate', $fromdate);
        Session::put('todate', $todate);
        Session::put('status', $status);
        return view('Admin.Ticket.report', compact('data','fromdate','todate','status'));
    }

    public function print(Request $request)
    {
        $status     = Session::get('status');
        $fromdate   = Session::get('fromdate');
        $todate     = Session::get('todate');
        if ($status == 'All') {  
            $data = Ticket::orderBy('id', 'DESC')
                        ->whereBetween('created_at', [$fromdate, $todate])
                        ->get();
        } else { 
            $data = Ticket::orderBy('id', 'DESC')
                        ->whereBetween('created_at', [$fromdate, $todate])
                        ->where('status', $status)
                        ->get();
        }
        return view('Admin.Ticket.print', compact('data','fromdate','todate','status'));
    }

}
