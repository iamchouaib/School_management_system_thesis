<style>
    .flex{
        display: flex;
    }
    .flex-col{
        flex-direction: column;
    }
    .text-lg{
        font-size: 1.125rem;
        line-height: 1.75rem;
    }
    .text-xl{
        font-size: 1.25rem;
        line-height: 1.75rem;
    }
    .text-3xl{
        font-size: 1.875rem;
        line-height: 2.25rem;
    }
    .font-medium{
        font-weight: 500;
    }
    .font-bold{
        font-weight: 700;
    }
    .text-primary{
        color: #1e40af;
    }
    .mr-auto {
        margin-right: auto;
    }
    .box {
        box-shadow: 0px 3px 20px #0000000b;
        position: relative;
        border-radius: 0.375rem;
        border-color: transparent;
    }
    .items-center{
        align-items: center;
    }
    .mt-20{
        margin-top: 5rem;
    }
    .lg\:flex-row{
        flex-direction: row;
    }.px-5{
         padding-left: 1.25rem;
         padding-right: 1.25rem;
     }.mt-8{
          margin-top: 2rem;
      }.overflow-hidden{
           overflow: hidden;
       }.mt-5{
            margin-top: 1.25rem;
        }.pt-10{
             padding-top: 2.5rem;
         }.sm\:px-20{
              padding-left: 5rem;
              padding-right: 5rem;
          }  .lg\:pb-20{
                 padding-bottom: 5rem;
             } .sm\:text-left{
                   text-align: left;
               }.font-semibold{
                    font-weight: 600;
                }.mt-1{ margin-top: 0.25rem; }    .lg\:ml-auto{margin-left: auto; }
    .block{
        display: block;
    }
</style>
    <div class=" flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto " >Certification <span class="text-primary"> {{$student->name}}</span></h2>
    </div>
    <!-- BEGIN: Invoice -->
    <div class="box overflow-hidden mt-5">
        <div class="flex flex-col lg:flex-row pt-10 px-5 sm:px-20 sm:pt-20 lg:pb-20 text-center sm:text-left">
            <div class="font-semibold text-primary text-xl block">People's Democratic Republic of Algeria Ministry of National Education
           <span class="text-3xl block text-center">Student Certification</span></div>
            <div class="mt-20 lg:mt-0 lg:ml-auto lg:text-right">
                <div class="text-xl text-primary font-medium">SMART SCHOOL</div>
                <div class="mt-1">
                    {{auth()->user()->email}}</div>
                <div class="mt-1">Setif 19000 Algeria</div>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row border-b px-5 sm:px-20 pt-10 pb-10 sm:pb-20 text-center sm:text-left">
            <div>
                <div class="text-base text-slate-500">Student Details</div>
                <div class="text-lg font-medium text-primary mt-2">
                    {{$student->name}}</div>
                <div class="mt-1">{{$student->birthday}}</div>
                <div class="mt-1">{{$student->groupe->name}}</div>
                <div class="mt-1">{{$student->groupe->section->name}}</div>
            </div>
            <div class="mt-10 lg:mt-0 lg:ml-auto lg:text-right">
                <div class="text-base text-slate-500">Receipt</div>
                <div class="text-lg text-primary font-medium mt-2">#1923195</div>
                <div class="mt-1">Jan 02, 2021</div>
            </div>
        </div>
        <div class="px-5 sm:px-16 py-10 sm:py-20  mr-3  w-full">
            <div class=" top-0 overflow-x-auto font-bold text-xl">
                <p class=""> <span class="text-xl text-primary">Full Name : </span> {{$student->guardian->name}}   </p>
                <p><span class="text-xl text-primary"> birth-date : </span> {{$student->birthday}}   </p>
                <p><span class="text-xl text-primary">Education Level :  </span>{{$student->groupe->name}}   </p>
            </div>

            <p><span class="text-xl text-primary">Education Level :  </span>{{$student->groupe->section->name}}   </p>
        </div>


        </div>
        <div class="px-5 sm:px-20 pb-10 sm:pb-20 flex flex-col-reverse sm:flex-row">
            <div class="text-center sm:text-left mt-10 sm:mt-0">
                <div class="text-base text-slate-500">Bank Transfer</div>
                <div class="text-lg text-primary font-medium mt-2">Elon Musk</div>
                <div class="mt-1">Bank Account : 098347234832</div>
                <div class="mt-1">Code : LFT133243</div>
            </div>
            <div class="text-center sm:text-right sm:ml-auto">
                <div class="text-base text-slate-500">Total Amount</div>
                <div class="text-xl text-primary font-medium mt-2">$20.600.00</div>
                <div class="mt-1">Taxes included</div>
            </div>
        </div>


<img style="width: 300px ; height: 100px" src="{{asset('storage/signature/' . auth()->user()->signature->signature )}}" alt="my signature ">
    </div>
    <!-- END: Invoice -->
