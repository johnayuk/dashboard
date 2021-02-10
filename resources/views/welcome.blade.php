<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: rgb(204, 201, 201);
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #name{
                color: rgb(34, 103, 232);
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                margin: 0%;
                padding: 0%;
            }
            
        </style>
    </head>
    <body>

        <div class="container">
            @if ($errors->any())
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                  @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                  @endforeach
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
            @endif
          </div>


        <div class="flex-center position-ref full-height">
          
                <div class="top-right links">
                  
                     
                  
                        <a href="{{ url('login') }}">Login</a>

                        
                 
                </div>
         

            <div class="content">
                <div class="title m-b-md">
                    
                   <h1 id="name">GoodHealth App</h1>
                   <button type="button" class="btn btn-dark btn-lg"><a href="{{ url('login') }}">Login</a></button>
                </div>

              

               
            </div>
        </div>
    </body>
</html>