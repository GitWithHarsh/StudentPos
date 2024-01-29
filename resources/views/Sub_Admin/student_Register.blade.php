<style>
    .form-control:disabled,
    .form-control:read-only {
        background-color: #000 !important;
        padding: 10px !important;
    }

    .registerbtn {
        background-color: #006600;
        border-radius: 5px;
        padding: 5px 10px;
        color: #fff;
        margin: 20px 0;
        border: 0;
    }

    .form-floating.mb-3.text-center button {
        background: #cc6601;
        padding: 8px 20px;
    }

    div#student_list_wrapper {
        padding-left: unset !important;
    }

    form#StudentForm input {
        background: #ffffff0d;
    }

    form#StudentForm select {
        background: #ffffff0d !important;
    }

    input.form-control.form-control-sm {
        border: 1px solid #cc6601 !important;
        border-radius: 5px !important;
    }
</style>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('Sub_Admin.layout.header')
        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <form id="StudentForm">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="bg-secondary rounded h-100 p-4">
                                    <h3 class="mb-4 mainHead">Registre des étudiants <?php if (isset($ClassOption)) {
                                                                                            echo $ClassOption->ClassName . ' ' . $ClassOption->OptionName;
                                                                                        } ?></h3>
                                    <div>
                                        <h6 id="success" style="display: none;" class="alert alert-success">Inscription
                                            des étudiants réussie</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="first_name" id="first_name" value="<?php if (isset($studentRegister)) {
                                                                                                                                        echo $studentRegister->first_name;
                                                                                                                                    } ?>" placeholder="Entrez le prénom de l'étudiant">
                                                <label for="floatingInput">Prénom</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" value="<?php if (isset($studentRegister)) {
                                                                                                    echo $studentRegister->last_name;
                                                                                                } ?>" name="last_name" id="last_name" placeholder="Entrez le nom de famille de l'étudiant">
                                                <label for="floatingPassword">Nom de famille</label>
                                            </div>
                                        </div>
                                        <?php if (!$ClassOption || !isset($ClassOption)) { ?>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <select class="form-control" id="selectClassOption" name="className" onchange="selectClass()">
                                                        <option disabled selected>Sélectionnez une classe</option>
                                                        @foreach($all_class as $val)
                                                        <option value="{{$val->id}}">{{$val->add_class}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6" id="listOption">
                                                <div class="form-floating mb-3">
                                                    <select class="form-control" name="option">
                                                        <option disabled selected>Sélectionnez une option</option>
                                                        @foreach($all_option as $val)
                                                        <option value="{{$val->id}}">{{$val->option}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } else if ($ClassOption || isset($ClassOption)) { ?>
                                            <input type="hidden" name="className" value="<?php if (isset($ClassOption)) {
                                                                                                echo $ClassOption->ClassId;
                                                                                            } ?>">
                                            <input type="hidden" name="option" value="<?php if (isset($ClassOption)) {
                                                                                            echo $ClassOption->OptionId;
                                                                                        } ?>">
                                        <?php } ?>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" value="<?php if (isset($studentRegister)) {
                                                                                                    echo $studentRegister->email;
                                                                                                } ?>" name="email" id="email">
                                                <label for="floatingPassword">E-mail</label>
                                                <span style="color: red; display:none" id="exits">L'e-mail existe
                                                    déjà</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" value="<?php if (isset($studentRegister)) {
                                                                                                    echo $studentRegister->post_name;
                                                                                                } ?>" id="post_name" name="post_name" placeholder="
                                                                                                Entrez le nom du message">
                                                <label for="floatingInput">Après le nom</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" value="<?php if (isset($studentRegister)) {
                                                                                                    echo $studentRegister->place;
                                                                                                } ?>" name="place" id="place" placeholder="Entrez dans la place des étudiants">
                                                <label for="floatingInput">Lieu</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="date" class="form-control" value="<?php if (isset($studentRegister)) {
                                                                                                    echo $studentRegister->date_of_birth;
                                                                                                } ?>" id="birth" name="birth" placeholder="Entrer date de naissance">
                                                <label for="floatingInput">Date de naissance</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="father" value="<?php if (isset($studentRegister)) {
                                                                                                                    echo $studentRegister->father;
                                                                                                                } ?>" id="father" placeholder="Entrez le nom du père">
                                                <label for="floatingInput">Nom du père</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" value="<?php if (isset($studentRegister)) {
                                                                                                    echo $studentRegister->mother;
                                                                                                } ?>" name="mother" id="mother" placeholder="Entrez le nom de la mère">
                                                <label for="floatingInput">Nom de la mère</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" value="<?php if (isset($studentRegister)) {
                                                                                                    echo $studentRegister->telephone;
                                                                                                } ?>" name="telephone" id="telephone" placeholder="
                                                                                                Entrez le téléphone">
                                                <label for="floatingInput">Numéro de téléphone</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" value="<?php if (isset($studentRegister)) {
                                                                                                    echo $studentRegister->mobile;
                                                                                                } ?>" id="mobile" name="mobile" placeholder="
                                                                                                Entrez le numéro de portable">
                                                <label for="floatingInput">Numéro de portable</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" value="<?php if (isset($studentRegister)) {
                                                                                                    echo $studentRegister->schoolyear;
                                                                                                } ?>" name="School" id="School" placeholder="
                                                                                                Entrez l'année scolaire">
                                                <input type="hidden" class="form-control" value="<?php if (isset($studentRegister)) {
                                                                                                        echo $studentRegister->id;
                                                                                                    } ?>" name="studentId" id="studentId" placeholder="Enter Post Name">
                                                <label for="floatingInput">Année scolaire</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3 text-center">
                                                <button type="button" class="registerbtn" onclick="studentRegister()">Register Student</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function studentRegister() {
                $.ajax({
                    type: "POST",
                    url: "{{url('save_student_register')}}",
                    data: new FormData($('#StudentForm')[0]),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data)
                        if ($.trim(data) == "done") {
                            document.getElementById('success').style.display = "block";
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                            setInterval(() => {
                                window.location.href = '{{url("manageStudentByClass")}}'
                            }, 1000);
                        } else if ($.trim(data) == "notDone") {
                            document.getElementById('exits').style.display = "block";
                            document.getElementById("first_name").scrollIntoView();

                        }
                    }
                });
            }
        </script>
        <script>
            function selectClass() {
                let selectClassOption = document.getElementById('selectClassOption').value;
                $.ajax({
                    type: "POST",
                    url: "{{url('filterOption')}}",
                    data: {
                        selectClassOption: selectClassOption,
                        _token: '<?php echo csrf_token(); ?>'
                    },
                    success: function(data) {
                        $('#listOption').html(data);
                    }

                });

            }
        </script>
        <!-- Form End -->
        @include('Sub_Admin.layout.footer')