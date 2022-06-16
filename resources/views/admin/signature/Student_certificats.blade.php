<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Absence List') }}
        </h2>
    </x-slot>


    @if($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif

<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/Sec_reports" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="student_id" id="stu_id">
                        Trimester:
                        <select name="trimester" id="">
                            <option value="1">Trimester 1</option>
                            <option value="2">Trimester 2</option>
                            <option value="3">Trimester 3</option>
                        </select>
                        <br>
                        <br>
                        Type:
                        <select name="type" id="">
                            <option value="convocation">Parent convocation</option>
                            <option value="reprimand">Reprimand</option>
                            <option value="notice">Absence notice</option>
                        </select>
                        <br>
                        <br>
                        Content:
                        <input type="text" name="contents">
                    </div>


                <div class="modal-footer">
                   <button class="btn btn-primary" type="submit">Create report</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <table>
        <thead>
        <tr>
            <th style="width:250px;text-align:center">Parent</th>
            <th style="width:250px;text-align:center">First name</th>
            <th style="width:250px;text-align:center">Last name</th>
            <th style="width:200px;text-align:center">Email</th>
            <th style="width:200px;text-align:center">Level</th>
            <th style="width:200px;text-align:center">Status</th>
            <th style="width:200px;text-align:center">Group</th>


        </tr>
        </thead>
        <tbody>

        @foreach($students as $student )


            <tr>

                <td style="text-align:center">{{$student->parent_id}}</td>
                <td style="text-align:center">{{$student->f_name}}</td>
                <td style="text-align:center">{{$student->l_name}}</td>
                <td style="text-align:center">{{$student->email}}</td>
                <td style="text-align:center">{{\App\Models\Level::where('id',$student->level)->first()->name}}</td>
                <td style="text-align:center">{{$student->status}}</td>
                <td style="text-align:center">{{$student->group}}</td>
                <td>
                    <a href="Sec_Certificates/{{$student->id}}">Create certificate</a>
                </td>
                <td>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="student({{$student->id}})">Report</button>
                </td>





        @endforeach
        </tbody>
    </table>


    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script >
        function student(a){
            console.log(a)
            var b =document.getElementById('stu_id')
            b.value=a;

            //you can print any value like id,class,value,innerHTML etc.

            // document.getElementById("nameofid").value = element;


        }

    </script>

</x-app-layout>
