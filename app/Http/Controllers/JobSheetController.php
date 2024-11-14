<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\JobSheet;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Color;
use App\Models\Spv;
use App\Models\Wd;
use App\Models\Twb;
use App\Models\Engine;
use App\Models\Denting;
use App\Models\Painting;
use App\Models\Warring;



class JobSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.job-sheets.index',[
            'jobSheets'  =>JobSheet::orderBy('id', 'desc')->get(),
            'customers'  =>Customer::all(),
            'vehicles'   =>Vehicle::all(),
            'colors'     =>Color::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.job-sheets.create',[
            'customers'  =>Customer::all(),
            'vehicles'   =>Vehicle::all(),
            'colors'     =>Color::all(),



        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $lastRecord = JobSheet::latest()->first();

            if($lastRecord){
                $nextNumber = $lastRecord->job_no + 1;
                $request['job_no'] = $nextNumber;
            }


            $jobSheet = JobSheet::updateOrCreateJobSheet($request);
            $clientMobile   = $jobSheet->customer->mobile;
            $parameters = [
                'message'       => 'Your job is created',
                'mobile_number' => $clientMobile ,
                'device'        => 'ec0ef6f3015e37ad',
            ];

            $header = [
                'apikey:TILC3BFVQLCCYRMGS2S4TPZF9AYKL2SDSO2B9NJJ'
            ];


            $url ="https://smsserver.xyz/api/v1/sms/send";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_POSTFIELDS,  $parameters);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);

                return redirect()->route('job-sheets.index')->with('success', 'Job Sheet added successfully');

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return JobSheet::where('id',$id)->with(['wds','spvs','adps','tps','paperhistories','twbs','engines','dentings','paintings','warrings'])->first();
        return view('backend.job-sheets.view',[
            'jobSheet'   =>JobSheet::where('id',$id)->with(['wds','spvs','adps','tps','paperhistories','twbs','engines','dentings','paintings','warrings'])->first(),



        ]);
    }


    public function tjs()
    {
        $todaysJobSheets = JobSheet::whereDate('created_at', Carbon::today())->get();

        return view('backend.job-sheets.tjs',compact('todaysJobSheets'));
    }

    public function searchJobSheets(Request $request){
        $search = $request->input('search');

        // Query the Jobsheet model and filter by job_no, owner_name, or mobile
        $jobsheets = Jobsheet::when($search, function ($query, $search) {
            return $query->where('job_no', 'like', '%' . $search . '%')
                         ->orWhere('owner_name', 'like', '%' . $search . '%')
                         ->orWhere('mobile', 'like', '%' . $search . '%');
        })->get();

    }


    public function wd(string $id)
    {
        return view('backend.job-sheets.wd',[
            'jobSheet'   =>JobSheet::where('id',$id)->first(),

        ]);
    }


    public function spv(string $id)
    {
        return view('backend.job-sheets.spv',[
            'jobSheet'   =>JobSheet::where('id',$id)->first(),

        ]);
    }

    public function tp(string $id)
    {
        return view('backend.job-sheets.tp',[
            'jobSheet'   =>JobSheet::where('id',$id)->first(),

        ]);
    }

    public function adp(string $id)
    {
        return view('backend.job-sheets.adp',[
            'jobSheet'   =>JobSheet::where('id',$id)->first(),

        ]);
    }

    public function ph(string $id)
    {
        return view('backend.job-sheets.ph',[
            'jobSheet'   =>JobSheet::where('id',$id)->first(),

        ]);
    }


    public function twb(string $id)
    {
        return view('backend.job-sheets.twb',[
            'jobSheet'   =>JobSheet::where('id',$id)->first(),

        ]);
    }

    public function engine(string $id)
    {
        return view('backend.job-sheets.engine',[
            'jobSheet'   =>JobSheet::where('id',$id)->first(),

        ]);
    }

    public function denting(string $id)
    {
        return view('backend.job-sheets.denting',[
            'jobSheet'   =>JobSheet::where('id',$id)->first(),

        ]);
    }

    public function painting(string $id)
    {
        return view('backend.job-sheets.painting',[
            'jobSheet'   =>JobSheet::where('id',$id)->first(),

        ]);
    }


    public function warring(string $id)
    {
        return view('backend.job-sheets.warring',[
            'jobSheet'   =>JobSheet::where('id',$id)->first(),

        ]);
    }



     //Job sheet Ajax
    public function wonerNameSelect($id){
        echo json_encode(DB::table('customers')->where('id', $id)->get());
    }
    public function vehicleNoSelect($id){
        echo json_encode(DB::table('vehicles')->where('id', $id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.job-sheets.create',[
            'customers'  =>Customer::all(),
            'vehicles'   =>Vehicle::all(),
            'colors'     =>Color::all(),
            'jobSheet'   =>JobSheet::where('id',$id)->first(),



        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        JobSheet::updateOrCreateJobSheet($request,$id);
        return redirect()->route('job-sheets.index')->with('success','Job Sheet Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jobSheet = JobSheet::where('id',$id)->first();
        if ($jobSheet)
        {
            $jobSheet->delete();
        }
        return redirect()->route('job-sheets.index')->with('success','Job Sheet Delete Successfully');
    }
}
