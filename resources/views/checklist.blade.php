<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .form-control {
            color: white !important;
        }

        .bg-white.shadow {
            background-color: rgb(24, 26, 27) !important;
        }

        .bg-white {
            background-color: rgb(24, 26, 27) !important;
        }

        .text-light {
            background-color: rgb(30, 32, 34) !important;
        }

        .text-light {
            color: white !important;
        }

    </style>
</head>

<body>
    <x-app-layout>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-300 leading-tight">
                {{ __('CHECKLIST') }}
            </h2>
        </x-slot>
        <div class="container border-black rounded-md">

            <form action="{{ route('checkstore') }}" method="get" class="form-horizontal">


                @csrf

                @method("get")

                {{-- @foreach ($checks as $check) --}}
                <li class="list-group-item bg-gray-100 mt-3">
                    <div class="panel panel-default ">
                        <div class="panel-heading text-gray-300">
                            <label for="check" class="col-sm-8 control-label  mt-3">Add CheckList</label>
                        </div>
                    </div>
                </li>
                <li class="list-group-item text-gray-300">
                    <div class="items-center ">
                        <div class="form-group ">
                            <label for="check" class="col-sm-8 control-label  mt-3 ">CheckList</label>
                            <div class="col-sm-8 mt-2">
                                <div class="text-light">
                                    <input type="text" name="checkName" id="checkName" class="form-control"
                                        style="background-color: rgb(30,32,34) ">
                                </div>
                                <div class="mt-5">
                                    <button type="submit" onclick="location.href='checklist'" class="btn btn-dark">
                                        <i class="fa fa-plus" style="color:red"></i> &nbsp;&nbsp; Add CheckList
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item bg-gray-100 mt-3 border-t text-gray-300">
                    <div class="panel panel-default ">
                        <div class="panel-heading ">
                            <label for="check" class="col-sm-8 control-label  mt-3">Your CheckList</label>
                        </div>
                    </div>
                <li class="list-group-item ">
                    <div class="items-center  ">
                        <div class="form-group ">
                            <div class="panel-body">

                                <table class="table table-striped  table-hover table-dark task-table text-gray-300 ">
                                    <thead>
                                        <th>Task</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($checks as $check)

                                            </tr>
                                            <td class="table-text">
                                                <div> {{ $check->checklistInfo }}
                                                    <br>
                                                    Created at {{ $check->created_at }}
                                                </div>
                                            </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                    {{-- 여기 작성 예정 --}}
                                </table>

                            </div>

                        </div>
                    </div>
                </li>
                </li>
                {{-- @endforeach --}}

                @csrf
            </form>

        </div>

        {{-- 여기 작성 예정 --}}

    </x-app-layout>
</body>

</html>
