<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use Response;
use Throwable;
use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

use App\Models\stateMaster;
use App\Models\countryMaster;
use App\Models\districtMaster;
use App\Models\functionDetail;
use App\Models\giftDescriptionDetails;
use App\Models\giftDescriptionImageDetails;




/**********
 * 
 * Function Controller is define for Bussiness logic Of Internship Candidates
 * Started Date :-30-09-2023
 * Created By :- Ravikant Kumar
 * End Date :-
 * 
***********/ 

class functionDetailsController extends Controller
{
    //
    public function __construct(){
        //
    }

    public function index(){
        // $countryDetails=[
            
        //     [ 'value' => '1', 'name' => 'Andaman and Nicobar Islands' ],
        //     [ 'value' => '2', 'name' => 'Andhra Pradesh' ],
        //     [ 'value' => '3', 'name' => 'Algeria' ],
        //     [ 'value' => '4', 'name' => 'Andorra' ],
        //     [ 'value' => '5', 'name' => 'Angola' ],
        //     [ 'value' => '6', 'name' => 'Antigua and Barbuda' ],
        //     [ 'value' => '7', 'name' => 'Argentina' ],
        //     [ 'value' => '8', 'name' => 'Armenia' ],
        //     [ 'value' => '9', 'name' => 'Australia' ],
        //     [ 'value' => '10', 'name' => 'Austria' ],
        //     [ 'value' => '11', 'name' => 'Azerbaijan' ],
        //     [ 'value' => '12', 'name' => 'Bahamas' ],
        //     [ 'value' => '13', 'name' => 'Bahrain' ],
        //     [ 'value' => '14', 'name' => 'Bangladesh' ],
        //     [ 'value' => '15', 'name' => 'Barbados' ],
        //     [ 'value' => '16', 'name' => 'Belarus' ],
        //     [ 'value' => '17', 'name' => 'Belgium' ],
        //     [ 'value' => '18', 'name' => 'Belize' ],
        //     [ 'value' => '19', 'name' => 'Benin' ],
        //     [ 'value' => '20', 'name' => 'Bhutan' ],
        //     [ 'value' => '21', 'name' => 'Bolivia' ],
        //     [ 'value' => '22', 'name' => 'Bosnia and Herzegovina' ],
        //     [ 'value' => '23', 'name' => 'Botswana' ],
        //     [ 'value' => '24', 'name' => 'Brazil' ],
        //     [ 'value' => '25', 'name' => 'Brunei' ],
        //     [ 'value' => '26', 'name' => 'Bulgaria' ],
        //     [ 'value' => '27', 'name' => 'Burkina Faso' ],
        //     [ 'value' => '28', 'name' => 'Burundi' ],
        //     [ 'value' => '29', 'name' => 'Cabo Verde' ],
        //     [ 'value' => '30', 'name' => 'Cambodia' ],
        //     [ 'value' => '31', 'name' => 'Cameroon' ],
        //     [ 'value' => '33', 'name' => 'Canada' ],
        //     [ 'value' => '34', 'name' => 'Central African Republic (CAR)' ],
        //     [ 'value' => '35', 'name' => 'Chad' ],
        //     [ 'value' => '36', 'name' => 'Chile' ],
        //     [ 'value' => '37', 'name' => 'China' ],
        //     [ 'value' => '38', 'name' => 'Colombia' ],
        //     [ 'value' => '39', 'name' => 'Comoros' ],
        //     [ 'value' => '40', 'name' => 'Congo, Democratic Republic of the' ],
        //     [ 'value' => '41', 'name' => 'Congo, Republic of the' ],
        //     [ 'value' => '42', 'name' => 'Costa Rica' ],
        //     [ 'value' => '43', 'name' => 'Cote d’Ivoire' ],
        //     [ 'value' => '44', 'name' => 'Croatia' ],
        //     [ 'value' => '45', 'name' => 'Cuba' ],
        //     [ 'value' => '46', 'name' => 'Cyprus' ],
        //     [ 'value' => '47', 'name' => 'Czechia' ],
        //     [ 'value' => '48', 'name' => 'Denmark' ],
        //     [ 'value' => '49', 'name' => 'Djibouti' ],
        //     [ 'value' => '50', 'name' => 'Dominica' ],
        //     [ 'value' => '51', 'name' => 'Dominican Republic' ],
        //     [ 'value' => '52', 'name' => 'Ecuador' ],
        //     [ 'value' => '53', 'name' => 'Egypt' ],
        //     [ 'value' => '54', 'name' => 'El Salvador' ],
        //     [ 'value' => '55', 'name' => 'Equatorial Guinea' ],
        //     [ 'value' => '56', 'name' => 'Eritrea' ],
        //     [ 'value' => '57', 'name' => 'Estonia' ],
        //     [ 'value' => '58', 'name' => 'Eswatini' ],
        //     [ 'value' => '59', 'name' => 'Ethiopia' ],
        //     [ 'value' => '60', 'name' => 'Fiji' ],
        //     [ 'value' => '61', 'name' => 'Finland' ],
        //     [ 'value' => '62', 'name' => 'France' ],
        //     [ 'value' => '63', 'name' => 'Gabon' ],
        //     [ 'value' => '64', 'name' => 'Gambia' ],
        //     [ 'value' => '65', 'name' => 'Georgia' ],
        //     [ 'value' => '66', 'name' => 'Germany' ],
        //     [ 'value' => '67', 'name' => 'Ghana' ],
        //     [ 'value' => '68', 'name' => 'Greece' ],
        //     [ 'value' => '69', 'name' => 'Grenada' ],
        //     [ 'value' => '70', 'name' => 'Guatemala' ],
        //     [ 'value' => '71', 'name' => 'Guinea' ],
        //     [ 'value' => '72', 'name' => 'Guinea-Bissau' ],
        //     [ 'value' => '73', 'name' => 'Guyana' ],
        //     [ 'value' => '74', 'name' => 'Haiti' ],
        //     [ 'value' => '75', 'name' => 'Honduras' ],
        //     [ 'value' => '76', 'name' => 'Hungary' ],
        //     [ 'value' => '77', 'name' => 'Iceland' ],
        //     [ 'value' => '78', 'name' => 'India' ],
        //     [ 'value' => '79', 'name' => 'Indonesia' ],
        //     [ 'value' => '80', 'name' => 'Iran' ],
        //     [ 'value' => '81', 'name' => 'Iraq' ],
        //     [ 'value' => '82', 'name' => 'Ireland' ],
        //     [ 'value' => '83', 'name' => 'Israel' ],
        //     [ 'value' => '84', 'name' => 'Italy' ],
        //     [ 'value' => '85', 'name' => 'Jamaica' ],
        //     [ 'value' => '86', 'name' => 'Japan' ],
        //     [ 'value' => '87', 'name' => 'Jordan' ],
        //     [ 'value' => '88', 'name' => 'Kazakhstan' ],
        //     [ 'value' => '89', 'name' => 'Kenya' ],
        //     [ 'value' => '90', 'name' => 'Kiribati' ],
        //     [ 'value' => '91', 'name' => 'Kosovo' ],
        //     [ 'value' => '92', 'name' => 'Kuwait' ],
        //     [ 'value' => '93', 'name' => 'Kyrgyzstan' ],
        //     [ 'value' => '94', 'name' => 'Laos' ],
        //     [ 'value' => '95', 'name' => 'Latvia' ],
        //     [ 'value' => '96', 'name' => 'Lebanon' ],
        //     [ 'value' => '97', 'name' => 'Lesotho' ],
        //     [ 'value' => '98', 'name' => 'Liberia' ],
        //     [ 'value' => '99', 'name' => 'Libya' ],
        //     [ 'value' => '100', 'name' => 'Liechtenstein' ],
        //     [ 'value' => '101', 'name' => 'Lithuania' ],
        //     [ 'value' => '102', 'name' => 'Luxembourg' ],
        //     [ 'value' => '103', 'name' => 'Madagascar' ],
        //     [ 'value' => '104', 'name' => 'Malawi' ],
        //     [ 'value' => '105', 'name' => 'Malaysia' ],
        //     [ 'value' => '106', 'name' => 'Maldives' ],
        //     [ 'value' => '107', 'name' => 'Mali' ],
        //     [ 'value' => '108', 'name' => 'Malta' ],
        //     [ 'value' => '109', 'name' => 'Marshall Islands' ],
        //     [ 'value' => '110', 'name' => 'Mauritania' ],
        //     [ 'value' => '111', 'name' => 'Mauritius' ],
        //     [ 'value' => '112', 'name' => 'Mexico' ],
        //     [ 'value' => '113', 'name' => 'Micronesia' ],
        //     [ 'value' => '114', 'name' => 'Moldova' ],
        //     [ 'value' => '115', 'name' => 'Monaco' ],
        //     [ 'value' => '116', 'name' => 'Mongolia' ],
        //     [ 'value' => '117', 'name' => 'Montenegro' ],
        //     [ 'value' => '118', 'name' => 'Morocco' ],
        //     [ 'value' => '119', 'name' => 'Mozambique' ],
        //     [ 'value' => '120', 'name' => 'Myanmar' ],
        //     [ 'value' => '121', 'name' => 'Namibia' ],
        //     [ 'value' => '122', 'name' => 'Nauru' ],
        //     [ 'value' => '123', 'name' => 'Nepal' ],
        //     [ 'value' => '124', 'name' => 'Netherlands' ],
        //     [ 'value' => '125', 'name' => 'New Zealand' ],
        //     [ 'value' => '126', 'name' => 'Nicaragua' ],
        //     [ 'value' => '127', 'name' => 'Niger' ],
        //     [ 'value' => '128', 'name' => 'Nigeria' ],
        //     [ 'value' => '129', 'name' => 'North Korea' ],
        //     [ 'value' => '130', 'name' => 'North Macedonia' ],
        //     [ 'value' => '131', 'name' => 'Norway' ],
        //     [ 'value' => '132', 'name' => 'Oman' ],
        //     [ 'value' => '133', 'name' => 'Pakistan' ],
        //     [ 'value' => '134', 'name' => 'Palau' ],
        //     [ 'value' => '135', 'name' => 'Palestine' ],
        //     [ 'value' => '136', 'name' => 'Panama' ],
        //     [ 'value' => '137', 'name' => 'Papua New Guinea' ],
        //     [ 'value' => '138', 'name' => 'Paraguay' ],
        //     [ 'value' => '139', 'name' => 'Peru' ],
        //     [ 'value' => '140', 'name' => 'Philippines' ],
        //     [ 'value' => '141', 'name' => 'Poland' ],
        //     [ 'value' => '142', 'name' => 'Portugal' ],
        //     [ 'value' => '143', 'name' => 'Qatar' ],
        //     [ 'value' => '144', 'name' => 'Romania' ],
        //     [ 'value' => '145', 'name' => 'Russia' ],
        //     [ 'value' => '146', 'name' => 'Rwanda' ],
        //     [ 'value' => '147', 'name' => 'Saint Kitts and Nevis' ],
        //     [ 'value' => '148', 'name' => 'Saint Lucia' ],
        //     [ 'value' => '149', 'name' => 'Saint Vincent and the Grenadines' ],
        //     [ 'value' => '150', 'name' => 'Samoa' ],
        //     [ 'value' => '151', 'name' => 'San Marino' ],
        //     [ 'value' => '152', 'name' => 'Sao Tome and Principe' ],
        //     [ 'value' => '153', 'name' => 'Saudi Arabia' ],
        //     [ 'value' => '154', 'name' => 'Senegal' ],
        //     [ 'value' => '155', 'name' => 'Serbia' ],
        //     [ 'value' => '156', 'name' => 'Seychelles' ],
        //     [ 'value' => '157', 'name' => 'Sierra Leone' ],
        //     [ 'value' => '158', 'name' => 'Singapore' ],
        //     [ 'value' => '159', 'name' => 'Slovakia' ],
        //     [ 'value' => '160', 'name' => 'Slovenia' ],
        //     [ 'value' => '161', 'name' => 'Solomon Islands' ],
        //     [ 'value' => '162', 'name' => 'Somalia' ],
        //     [ 'value' => '163', 'name' => 'South Africa' ],
        //     [ 'value' => '164', 'name' => 'South Korea' ],
        //     [ 'value' => '165', 'name' => 'South Sudan' ],
        //     [ 'value' => '166', 'name' => 'Spain' ],
        //     [ 'value' => '167', 'name' => 'Sri Lanka' ],
        //     [ 'value' => '168', 'name' => 'Sudan' ],
        //     [ 'value' => '169', 'name' => 'Suriname' ],
        //     [ 'value' => '170', 'name' => 'Sweden' ],
        //     [ 'value' => '171', 'name' => 'Switzerland' ],
        //     [ 'value' => '172', 'name' => 'Syria' ],
        //     [ 'value' => '173', 'name' => 'Taiwan' ],
        //     [ 'value' => '174', 'name' => 'Tajikistan' ],
        //     [ 'value' => '175', 'name' => 'Tanzania' ],
        //     [ 'value' => '176', 'name' => 'Thailand' ],
        //     [ 'value' => '177', 'name' => 'Timor-Leste' ],
        //     [ 'value' => '178', 'name' => 'Togo' ],
        //     [ 'value' => '179', 'name' => 'Tonga' ],
        //     [ 'value' => '180', 'name' => 'Trinidad and Tobago' ],
        //     [ 'value' => '181', 'name' => 'Tunisia' ],
        //     [ 'value' => '182', 'name' => 'Turkey' ],
        //     [ 'value' => '183', 'name' => 'Turkmenistan' ],
        //     [ 'value' => '184', 'name' => 'Tuvalu' ],
        //     [ 'value' => '185', 'name' => 'Uganda' ],
        //     [ 'value' => '186', 'name' => 'Ukraine' ],
        //     [ 'value' => '187', 'name' => 'United Arab Emirates (UAE)' ],
        //     [ 'value' => '188', 'name' => 'United Kingdom (UK)' ],
        //     [ 'value' => '189', 'name' => 'United States of America (USA)' ],
        //     [ 'value' => '190', 'name' => 'Uruguay' ],
        //     [ 'value' => '191', 'name' => 'Uzbekistan' ],
        //     [ 'value' => '192', 'name' => 'Vanuatu' ],
        //     [ 'value' => '193', 'name' => 'Vatican City (Holy See)' ],
        //     [ 'value' => '194', 'name' => 'Venezuela' ],
        //     [ 'value' => '195', 'name' => 'Vietnam' ],
        //     [ 'value' => '196', 'name' => 'Yemen' ],
        //     [ 'value' => '197', 'name' => 'Zambia' ],
        //     [ 'value' => '198', 'name' => 'Zimbabwe' ],
        // ];

        // $stateDetails = [
        //     ['value' => 1, 'name' => 'Andaman and Nicobar Islands', 'abb' => 'AN'],
        //     ['value' => 2, 'name' => 'Andhra Pradesh', 'abb' => 'AP'],
        //     ['value' => 3, 'name' => 'Arunachal Pradesh', 'abb' => 'AR'],
        //     ['value' => 4, 'name' => 'Assam', 'abb' => 'AS'],
        //     ['value' => 5, 'name' => 'Bihar', 'abb' => 'BR'],
        //     ['value' => 6, 'name' => 'Chandigarh', 'abb' => 'CH'],
        //     ['value' => 7, 'name' => 'Chhattisgarh', 'abb' => 'CG'],
        //     ['value' => 8, 'name' => 'Dadra and Nagar Haveli', 'abb' => 'DH'],
        //     ['value' => 9, 'name' => 'Daman and Diu', 'abb' => 'DD'],
        //     ['value' => 10, 'name' => 'Delhi', 'abb' => 'DL'],
        //     ['value' => 11, 'name' => 'Goa', 'abb' => 'GA'],
        //     ['value' => 12, 'name' => 'Gujarat', 'abb' => 'GJ'],
        //     ['value' => 13, 'name' => 'Haryana', 'abb' => 'HR'],
        //     ['value' => 14, 'name' => 'Himachal Pradesh', 'abb' => 'HP'],
        //     ['value' => 15, 'name' => 'Jammu and Kashmir', 'abb' => 'JK'],
        //     ['value' => 16, 'name' => 'Jharkhand', 'abb' => 'JH'],
        //     ['value' => 17, 'name' => 'Karnataka', 'abb' => 'KA'],
        //     ['value' => 18, 'name' => 'Kerala', 'abb' => 'KL'],
        //     ['value' => 19, 'name' => 'Lakshadweep', 'abb' => 'LD'],
        //     ['value' => 20, 'name' => 'Madhya Pradesh', 'abb' => 'MP'],
        //     ['value' => 21, 'name' => 'Maharashtra', 'abb' => 'MH'],
        //     ['value' => 22, 'name' => 'Manipur', 'abb' => 'MN'],
        //     ['value' => 23, 'name' => 'Meghalaya', 'abb' => 'ML'],
        //     ['value' => 24, 'name' => 'Mizoram', 'abb' => 'MZ'],
        //     ['value' => 25, 'name' => 'Nagaland', 'abb' => 'NL'],
        //     ['value' => 26, 'name' => 'Orissa', 'abb' => 'OR'],
        //     ['value' => 27, 'name' => 'Pondicherry', 'abb' => 'PY'],
        //     ['value' => 28, 'name' => 'Punjab', 'abb' => 'PB'],
        //     ['value' => 29, 'name' => 'Rajasthan', 'abb' => 'RJ'],
        //     ['value' => 30, 'name' => 'Sikkim', 'abb' => 'SK'],
        //     ['value' => 31, 'name' => 'Tamil Nadu', 'abb' => 'TN'],
        //     ['value' => 32, 'name' => 'Tripura', 'abb' => 'TR'],
        //     ['value' => 33, 'name' => 'Uttar Pradesh', 'abb' => 'UP'],
        //     ['value' => 34, 'name' => 'Uttarakhand', 'abb' => 'UK'],
        //     ['value' => 35, 'name' => 'West Bengal', 'abb' => 'WB'],
        // ];

        // if($stateDetails){
        //     // print_r($stateDetails);

        //     foreach ($stateDetails as $country) {
        //         // echo "<pre>";
        //         // print_r($country['name']);
        //         // echo $country['name'];

        //         $countryDtls = new stateMaster;
        //         $countryDtls->state_name = $country['name'];
        //         $countryDtls->state_abbreviation = $country['abb'];
        //         // print_r($countryDtls);
        //         $countryDtls->save();
              
        //     }
        // }

    }


    /************* Get Country Details Function Start ********************/

    public function countryDetails(){
        $countryDtls = countryMaster::where('status', '=', 1)
        ->get();

        return $countryDtls;
    }

    /************* Get Country Details Function End *********************/


    /************* Get State Details Function Start ********************/

    public function stateDetails(){
        $stateDtls = stateMaster::where('status', '=', 1)
        ->get();


        return $stateDtls;
    }
    /************* Get State Details Function End **********************/


    /************* Get District Details Function Start ******************/

    public function districtDetails($id){
        
        if($id){
            $decodedId = base64_decode($id);
            // Convert the decoded string to an integer (assuming the ID is numeric)
            $id = intval($decodedId);
            // return $id;

            $disrictDtls = districtMaster::where('status', '=', 1)
            ->where('state_id', '=', $id)
            ->get();
    
            return $disrictDtls;

        }else{

            return response()->json(["code" => 404, "msg" => "id not provided"], 404);

        }


    }

    /************* Get District Details Function End ******************/




    /******** Create Function/Appoinment Function Start ********/

    public function createFunctionAppointment(Request $request){   

        $validatedraftData = $request->validate([
            'function_type' => 'required|string|regex:/^[a-zA-Z_ ]+$/u',
            'location_name' => 'required|min:5|max:2000|regex:/^[a-zA-Z_ ]+$/u',
            'name_of_function' => 'required|min:5|max:2000|regex:/^[a-zA-Z_ ]+$/u',
            'date_of_function' => 'required|date',
            'state_id' => 'nullable|numeric',
            'country_id' => 'required|numeric',
            'district_id' => 'nullable|numeric',
        ]);

        if($validatedraftData){
            // return $request->all();

            $funAppDetails = new functionDetail;
            $funAppDetails->function_type = $request->function_type;
            $funAppDetails->function_name = $request->name_of_function;
            $funAppDetails->date_of_function = $request->date_of_function;
            $funAppDetails->country_id = $request->country_id;
            $funAppDetails->state_id = $request->state_id;
            $funAppDetails->district_id = $request->district_id;
            $funAppDetails->function_location_name = $request->location_name;
            $funAppDetails->status = 1;
            $funAppDetails->save();

            $lastinsertedId = $funAppDetails->id;

            if($lastinsertedId){
                return response(array("code" => 200, "msg" => "Function/Appointment created Successfully !!!"), 200);
            }

        }else{
            return response()->json(["code" => 404, "msg" => $validatedraftData], 404); 
        }
        
    }

    /******** Create Function/Appoinment Function End *********/


    /******** Get Function/Appoinment Details Function Start **********/
    public function getFunctionAppointmentDetails(){   

        $funAppDetails = functionDetail::where('status', '=', 1)
        ->get();

        return $funAppDetails;
    }
    /******** Get Function/Appoinment Details Function End ***********/


    /******** Get Specific Function/Appoinment Details Function Start **********/
    public function getSpecificFunctionAppointmentDetails($id){   
        if($id){
            $decodedId = base64_decode($id);
            // Convert the decoded string to an integer (assuming the ID is numeric)
            $id = intval($decodedId);

            $funAppDetails=DB::table('function_details as fd')
            ->Join('country_masters as cmd', 'cmd.id', '=', 'fd.country_id')
            ->leftjoin('state_masters as smd', 'smd.id', '=', 'fd.state_id')
            ->leftjoin('district_masters as dmd', 'dmd.id', '=', 'fd.district_id')
            ->select('fd.*', 'cmd.*','smd.*','dmd.*')
            ->where('fd.status', '=', 1)
            ->where('fd.id', '=', $id)
            ->first();

            return response()->json($funAppDetails);
        }else{
            return response()->json(["code" => 404, "msg" => "id not provided"], 404);
        }
        
    }
    /******** Get Specific  Function/Appoinment Details Function End **********/


    /******** Create addGiftDesciptions Function Start ********/

    public function addGiftDesciptions(Request $request){   

        $validatedraftData = $request->validate([

            'function_id' => 'required|numeric',
            'gift_presented_by' => 'required|min:4|max:2000|regex:/^[a-zA-Z_ ]+$/u',
            'no_of_members' => 'required|numeric',
            'gift_sender_type' => 'required|string',
            'country_id' => 'nullable|numeric',

            'gift_artist_name' => 'required|min:4|max:2000|regex:/^[a-zA-Z_ ]+$/u',
            'type_of_gift' => 'required|string',
            'quantity' => 'required|numeric',
            'gift_handover_by' => 'required|min:3|max:2000|regex:/^[a-zA-Z_ ]+$/u',
            'gift_sent_to' => 'required|string',
            'description' => 'required|min:5|max:2000|regex:/^[a-zA-Z_ ]+$/u',
            'remarks' => 'required|min:5|max:2000|regex:/^[a-zA-Z_ ]+$/u',
            'uploaded_image_path.*' => 'required'
            // 'state_id' => 'nullable|numeric',
            // 'district_id' => 'nullable|numeric',
        ]);

        if($validatedraftData){
            // return count($request->uploaded_image_path);
            // return $request->all();

            $giftDetails = new giftDescriptionDetails;
            $giftDetails->regsitration_no = $request->function_type;
            $giftDetails->function_id = $request->function_id;
            $giftDetails->gift_presented_by = $request->gift_presented_by;
            $giftDetails->no_of_members = $request->no_of_members;
            $giftDetails->sender_type = $request->gift_sender_type;
            $giftDetails->artist_name = $request->gift_artist_name;
            $giftDetails->type_of_gift = $request->type_of_gift;
            $giftDetails->quantity = $request->quantity;
            $giftDetails->gift_handover_by = $request->gift_handover_by;
            $giftDetails->gift_sent_to = $request->gift_sent_to;
            $giftDetails->descriptions = $request->description;
            $giftDetails->remarks = $request->remarks;
            $giftDetails->country_id = $request->country_id;
            $giftDetails->state_id = $request->state_id;
            $giftDetails->district_id = $request->district_id;
            $giftDetails->status = 1;
            $giftDetails->save();

            $lastinsertedId = $giftDetails->id;

            if($lastinsertedId){

                foreach ($request->uploaded_image_path as $file) {

                    $giftImageDetails = new giftDescriptionImageDetails;
                    $giftImageDetails->gift_description_id = $lastinsertedId;
                    $giftImageDetails->gift_image_path = $file;
                    $giftImageDetails->save();
                   
                    $lastinsertedImgId = $giftImageDetails->id;

                }

                if($lastinsertedImgId){

                    $giftDetails = DB::select('SELECT regsitration_no, function_id, gift_presented_by,no_of_members,
                    sender_type,artist_name,type_of_gift,quantity, gift_handover_by,gift_sent_to,descriptions,
                    remarks,gift_image_path FROM gift_description_details as gFD
                    join(select gift_description_id, 
                    GROUP_CONCAT(gift_image_path ORDER BY gift_description_image_details.id ASC) as gift_image_path
                    from gift_description_image_details GROUP BY gift_description_id ) as gDIMD on gDIMD.gift_description_id=gfD.id
                    where status=1 and id='.$lastinsertedId);
            
            
                    // return response(array("code" => 200, "msg" => "Gift Description Added Successfully !!!"), 200);
                    return response()->json($giftDetails);
                }
            }
        }else{
            return response()->json(["code" => 404, "msg" => $validatedraftData], 404); 
        }
        
    }

    /******** Create Function/Appoinment Function End *********/



    /******** Create addGiftDesciptions Function Start ********/

    public function getGiftDesciptionsDetails($id){   

        if($id){

            $decodedId = base64_decode($id);
            // Convert the decoded string to an integer (assuming the ID is numeric)
            $id = intval($decodedId);

            $giftDetails = DB::select('SELECT regsitration_no, function_id, gift_presented_by,no_of_members,
            sender_type,artist_name,type_of_gift,quantity, gift_handover_by,gift_sent_to,descriptions,
            remarks,gift_image_path FROM gift_description_details as gFD
            join(select gift_description_id, 
            GROUP_CONCAT(gift_image_path ORDER BY gift_description_image_details.id ASC) as gift_image_path
            from gift_description_image_details GROUP BY gift_description_id ) as gDIMD on gDIMD.gift_description_id=gfD.id
            where status=1 and function_id='.$id);
    
    
            // return response(array("code" => 200, "msg" => "Gift Description Added Successfully !!!"), 200);
            return response()->json($giftDetails);
 
        }else{
            return response()->json(["code" => 404, "msg" => $validatedraftData], 404); 
        }
        
    }

    /******** Create Function/Appoinment Function End *********/



}
