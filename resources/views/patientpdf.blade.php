<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pateint{{$patient->name}} {{$patient->last_name}}</title>
  </head>

  <style>
    table, th, td 
    {
      border: 1px solid black;
        border-collapse: collapse;
    }

    th
    {
      font-size: 10px;
    }

    body
    {
      background-color: aquamarine;
    }
  </style>

  <body>
       <h3>{{$patient->name}} {{$patient->last_name}} Report</h3>
      <table class="table table-bordered" style="">
          <thead>
            <tr>
              <th scope="col">S/N</th>
              <th scope="col">Name</th>
              <th scope="col">LastName</th>
              <th scope="col">Previous Med Record</th>
              <th scope="col">Doctor in Charge</th>
              <th scope="col">Address</th>
              <th scope="col">OverAllPhysical Status</th>
              <th scope="col">X-Ray Result</th>
              <th scope="col">Phone No</th>
              <th scope="col">Room</th>
              <th scope="col">Next Of Kin</th>
              <th scope="col">Patient Condition</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">{{$patient->id}}</th>
              <td class="text-primary">{{$patient->name}}</td>
              <td>{{$patient->last_name}}</td>
              <td>{{$patient->previous_med_record}}</td>
              <td>{{$patient->doctor->user->name}}</td>
              <td>{{$patient->address}}</td>
              <td>{{$patient->overall_physical_status}}</td>
              <td>{{$patient->x_ray}}</td>
              <td>{{$patient->phone}}</td>
              <td>{{$patient->ward}}</td>
              <td>{{$patient->next_of_kin}}</td>
              <td>{{$patient->condition}}</td>
            </tr>
          </tbody>
      </table>
  </body>
</html>