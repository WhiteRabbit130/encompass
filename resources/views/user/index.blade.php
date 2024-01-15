<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fa fa-users mr-1"></i>
            {{ __('Users') }}
        </h2>
    </x-slot>



    {{--Users Table--}}
    <div class="my-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="spinner-border d-none" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>

                                <div class="table-responsive all-users-table">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                User Info
                                            </th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                User
                                            </th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Email
                                            </th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Address
                                            </th>
                                            <th class="text-left p-0 text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $n)

                                            <tr>
                                                <td>
                                                    <div>
                                                        <img src="{{URL::to('/')}}/assets/images/upload.png" width="60"
                                                             height="60" alt=""
                                                             srcset="">
                                                    </div>
                                                </td>
                                                <td>
                                                    {{$n->first_name}} {{$n->last_name}}
                                                </td>
                                                <td>
                                                    {{$n->email}}
                                                </td>
                                                <td>Bio</td>
                                                <td>Address</td>
                                                <td valign="middle">
                                                    <div class="d-flex gap-2 p-0 align-items-center my-auto">
                                                        <button class="btn btn-sm bg-warning text-white my-auto"><i
                                                                class="fa fa-pencil text-white"></i></button>
                                                        <button class="btn btn-sm bg-danger text-white my-auto"><i
                                                                class="fa fa-trash text-white"></i></button>
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="py-4" id="user">
        <div class="card shadow-lg mx-4 p-4">
            <div class="d-flex p-2 justify-content-between">
                <div class="text-secondary">
                    Showing
                    <div class="d-inline-block">
                        4
                    </div>
                    rows
                </div>
                <div class="d-flex flex-column gap-2">
                    <div class="ms-auto text-secondary">
                        Search:
                        <div class="ms-2 d-inline-block text-muted">
                            <input type="text" name="search" v-model="search" id="search_user"  class="form-control form-control-sm rounded-2" placeholder="Search by name, designation etc">
                        </div>
                    </div>
                    <div class="ms-auto text-secondary">

                        <div class="d-flex">
                            <button type="button" id="createUser"  @click.prevent="createUserModal()" class="btn bg-primary ms-auto text-white"><i class="fa-solid fa-plus"></i> Create User</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="table-responsive all-users-table" >
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">User Info</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">User</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Bio</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Address</th>
                        <th class="text-left p-0 text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <img src="{{URL::to('/')}}/assets/images/upload.png" width="60" height="60" alt="" srcset="">
                                </div>
                            </td>
                            <td>Name</td>
                            <td>Bio</td>
                            <td>Address</td>
                            <td valign="middle">
                                <div class="d-flex gap-2 p-0 align-items-center my-auto">
                                    <button class="btn btn-sm bg-warning text-white my-auto"><i class="fa fa-pencil text-white"></i></button>
                                    <button class="btn btn-sm bg-danger text-white my-auto"><i class="fa fa-trash text-white"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="create-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title mt-1 select-modal-label" id="modal-title-notification">
                                Create User
                            </h6>

                            <button type="button" class="btn-close text-dark me-1" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fa fa-close" style="font-size:20px"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="POST" class="" id="create_user_form" @submit.prevent="createUser()">
                                <!-- Image Preview Before Upload(Begin) -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-center my-2">
                                        <img :src="previewImage" alt="profile_image" @click="selectImage"
                                             class="rounded-full cursor-pointer" style="object-fit: cover; width: 100px;height: 100px;">
                                    </div>
                                    <input ref="fileInput" name="photo" type="file" @input="pickFile" style="display:none;"
                                           accept="image/*">
                                </div>

                                <!-- Image Preview Before Upload(End) -->

                                <div class="row">

                                    <div class="col-6 p-2">
                                        <label for="first_name" class="form-label">First name*</label>
                                        <input type="text" class="form-control rounded-2" id="first_name" name="first_name" v-model="first_name" aria-describedby="first_nameHelp" placeholder="Enter first name" >
                                    </div>
                                    <div class="col-6 p-2">
                                        <label for="last_name" class="form-label">Last name*</label>
                                        <input type="text" class="form-control rounded-2" id="last_name" name="last_name" v-model="last_name" aria-describedby="lnameHelp" placeholder="Enter last name" >
                                    </div>
                                    <div class="col-12 p-2">
                                        <label for="email" class="form-label">Email*</label>
                                        <input type="email" class="form-control rounded-2" id="email" name="email" v-model="email" aria-describedby="emailHelp" placeholder="abc@gmail.com" >
                                    </div>
                                    <div class="col-6 p-2">
                                        <label for="phone" class="form-label">Phone*</label><br />
                                        <input type="tel" class="form-control rounded-2 tel-input" name="phone"  id="phone" pattern="^[0-9]+$" aria-describedby="phoneHelp"  placeholder="000 0000000">

                                    </div>
                                    <div class="col-6 p-2">
                                        <label for="type" class="form-label">User Type*</label>
                                        <select class="form-select" name="type" id="type" v-model="type" aria-label="Default select example">
                                            <option value="" selected>User type</option>
                                            <option value="parent">Parent</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="student">Student</option>
                                        </select>
                                    </div>
                                    <div class="col-6 p-2">
                                        <div class="form-group">
                                            <label for="password" class="form-control-label">Password *</label>
                                            <input class="form-control rounded-2" v-model="password" name="password"
                                                   id="password" type="password" placeholder="Enter Password">
                                        </div>
                                    </div>
                                    <div class="col-6 p-2">
                                        <div class="form-group">
                                            <label for="confirmPassword" class="form-control-label">Confirm
                                                Password</label>
                                            <input class="form-control rounded-2" v-model="confirm_password"
                                                   name="confirm_password" id="confirm_password" type="password"
                                                   placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="col-6 p-2">
                                        <label class="form-check-label" for="address">Address</label>
                                        <textarea class="form-control" v-model="address" id="address" rows="3"></textarea>
                                    </div>
                                    <div class="col-6 p-2">
                                        <label class="form-check-label" for="short_bio">Short bio</label>
                                        <textarea class="form-control" v-model="bio" id="short_bio" rows="3"></textarea>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    @push('js')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
        <script>
            $().ready(function () {
                $("#create_user_form").validate({
                    rules: {
                        first_name: "required",
                        last_name: "required",
                        type:"required",
                        email: {
                            required: true,
                            email: true
                        },
                        // phone: "required",
                        password: {
                            required: true,
                            minlength: 6
                        },
                        confirm_password: {
                            required: true,
                            equalTo: "#password",
                            minlength: 6
                        },
                    },
                    messages: {
                        first_name: "First name is required",
                        last_name: "Last name is required",
                        email: "Email is required",
                        type: "Type is Required",
                        password: {
                            required: "Password is required",
                            minlength: "At least {0} characters required!"
                        },
                        confirm_password: {
                            required: "Confirm password is required",
                            minlength: "At least {0} characters required!"
                        },

                    },
                });
            });


            var phoneMask = [{ "mask": "(###) ###-####"}];
            $('#phone').inputmask({
                mask: phoneMask,
                greedy: false,
                definitions: { '#': { validator: "[0-9]", cardinality: 1}}
            });
            // var input = document.querySelector("#phone");
            //
            // var iti = window.intlTelInput(input, {
            //     utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.3/build/js/utils.js",
            // });
            //
            // window.iti = iti;
            // jquery plugin for phone number
            // $("#phone").intlTelInput({
            //     utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
            // });

        </script>
        <script>

            {{--const user = Vue.createApp({--}}
            {{--    data(){--}}

            {{--        return{--}}
            {{--            /* Create teacher */--}}
            {{--            first_name:'',--}}
            {{--            last_name:'',--}}
            {{--            email:'',--}}
            {{--            type:'',--}}
            {{--            address:'',--}}
            {{--            bio:'',--}}
            {{--            search:'',--}}
            {{--            password:'',--}}
            {{--            confirm_password:'',--}}

            {{--            /* Image preview */--}}
            {{--            previewImage: '{{URL::to('/')}}/assets/images/upload.png',--}}
            {{--            /* Preview Instrument image */--}}
            {{--            preview_instr_image: '{{URL::to('/')}}/assets/images/upload.png'--}}
            {{--        }--}}
            {{--    },--}}


            {{--    methods:{--}}

            {{--        /*--}}
            {{--        |----------------------------------------------------------------------------}}
            {{--        | For Select And Preview Image--}}
            {{--        |----------------------------------------------------------------------------}}
            {{--        */--}}
            {{--        selectImage() {--}}
            {{--            this.$refs.fileInput.click();--}}
            {{--        },--}}
            {{--        pickFile() {--}}
            {{--            let input = this.$refs.fileInput;--}}
            {{--            let file = input.files;--}}
            {{--            if (file && file[0]) {--}}
            {{--                let reader = new FileReader();--}}
            {{--                reader.onload = (e) => {--}}
            {{--                    this.previewImage = e.target.result;--}}
            {{--                };--}}
            {{--                reader.readAsDataURL(file[0]);--}}
            {{--                this.$emit("input", file[0]);--}}
            {{--            }--}}
            {{--        },--}}


            {{--        /* Create user popup */--}}
            {{--        createUserModal(){--}}
            {{--            $("#create-user-modal").modal("show");--}}
            {{--        },--}}
            {{--        /* Create user */--}}
            {{--        createUser() {--}}
            {{--            if ($("#create_user_form").valid()) {--}}
            {{--                let that = this;--}}
            {{--                $(".spinner").removeClass('d-none');--}}


            {{--                let form_data = new FormData();--}}
            {{--                form_data.append('first_name', that.first_name);--}}
            {{--                form_data.append('last_name', that.last_name);--}}
            {{--                form_data.append('type', that.type);--}}
            {{--                form_data.append('email', that.email);--}}
            {{--                form_data.append('address', that.address);--}}
            {{--                form_data.append('bio', that.bio);--}}

            {{--                axios.post('/create-user', form_data, {--}}
            {{--                    headers: {--}}
            {{--                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')--}}
            {{--                    }--}}
            {{--                }).then(response => {--}}

            {{--                    /* Stop spiner */--}}
            {{--                    $(".spinner").addClass('d-none');--}}

            {{--                    console.log(response)--}}

            {{--                    if (response.data.status_code >= 200 && response.data.status_code <= 299) {--}}
            {{--                        Swal.fire({--}}
            {{--                            icon: "success",--}}
            {{--                            title: "Success",--}}
            {{--                            text: "Operation performed successfully!",--}}
            {{--                        });--}}
            {{--                    }else{--}}
            {{--                        Swal.fire({--}}
            {{--                            icon: "error",--}}
            {{--                            title: "Oops...",--}}
            {{--                            text: response.data.message,--}}
            {{--                        });--}}
            {{--                    }--}}

            {{--                }).catch((e) => {--}}
            {{--                    $(".spinner").addClass('d-none');--}}
            {{--                    Swal.fire({--}}
            {{--                        icon: "error",--}}
            {{--                        title: "Oops...",--}}
            {{--                        text: "Something went wrong!",--}}
            {{--                    });--}}
            {{--                })--}}
            {{--            }--}}


            {{--        },--}}

            {{--        /* All users */--}}
            {{--        allUsers(){--}}

            {{--            console.log("yes coming")--}}
            {{--            let that=this;--}}
            {{--          axios.post('/all-users', {--}}
            {{--              search: that.search,--}}
            {{--          }).then(response => {--}}
            {{--              console.log("yes");--}}
            {{--          }).catch(function(er){--}}
            {{--              console.log(er);--}}
            {{--          })--}}
            {{--        },--}}



            {{--    },--}}


            {{--    mounted() {--}}
            {{--        this.allUsers();--}}
            {{--    },--}}
            {{--})--}}
            {{--user.mount("#user")--}}

        </script>
    @endpush


</x-app-layout>
